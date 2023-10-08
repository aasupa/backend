<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;
    // $casts
    protected $table = 'orders';
    protected $fillable = [
        
        //'order_number',
        'user_id',
        'transaction_id',
        'order_amount',
        'payment_status',
        'order_status',
        'delivery_address',

        //'order_amount' => 'float',
       // 'total_tax_amount' => 'float',
        //'delivery_address_id' => 'integer',
       // 'delivery_charge' => 'float',
       // 'user_id' => 'integer',
       // 'scheduled' => 'integer',
       // 'details_count' => 'integer',
       // 'created_at' => 'datetime',
       // 'updated_at' => 'datetime'
    ];

    // public function setDeliveryChargeAttribute($value)
    // {
    //     $this->attributes['delivery_charge'] = round($value, 3);
    // }

    // public function details()
    // {
    //     return $this->hasMany(OrderDetail::class);
    // }
}




