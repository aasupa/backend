<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $casts = [
        'price' => 'String',
        'discount_on_food' => 'String',
        'total_add_on_price' => 'String',
        //'tax_amount' => 'String',
        'food_id'=> 'String',
        'order_id'=> 'String',
        'quantity'=>'String',
    ];

    protected $primaryKey   = 'id';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class,'food_id');
    }

}