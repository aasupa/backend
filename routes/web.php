<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/khalti/payment/verify',[PaymentController::class,'verifyPayment'])->name('khalti.verifyPayment');

Route::post('/khalti/payment/store',[PaymentController::class,'storePayment'])->name('khalti.storePayment');


Route::post('/api/send-data-to-flutter', [YourController::class, 'sendDataToFlutter']);
