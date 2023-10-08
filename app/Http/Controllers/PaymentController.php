<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
class PaymentController extends Controller{
    public function verifyPayment(Request $request){
        $token = $request->token;

        $args = http_build_query(array(
            'token' => $token,
            'amount'  => 1000
          ));
          
          $url = "https://khalti.com/api/v2/payment/verify/";
          
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          $secret_key = config('app.khalti_secret_key');
          
          $headers = ["Authorization: Key $secret_key"];
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          
          $response = curl_exec($ch);
          $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
          curl_close($ch);
          return $response;
    }
        public function storePayment(Request $request)
        {

        $paymentResponse = json_decode($request->input('response'));
             if ($paymentResponse && isset($paymentResponse->idx) && isset($paymentResponse->amount) && $paymentResponse->state->name === 'Completed') {
                $order = new Order();
                $order->user_id = 1;
                $order->transaction_id = $paymentResponse->idx;
                $order->order_amount = $paymentResponse->amount; 
                $order->payment_status = 'paid'; 
                $order->order_status = 'pending';
                $order->delivery_address = 'Your delivery address here';
                try {
                    $order->save();
                    return response()->json(['message' => 'Order created successfully'], 201);
                } catch (\Exception $e) {
                    // Log the error for further investigation
                    return response()->json(['error' => $e->getMessage()]);
                }

            } else {
                return response()->json(['error' => 'Invalid payment response'], 400);
            }
        }
    
    }




    



