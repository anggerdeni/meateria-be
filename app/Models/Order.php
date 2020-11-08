<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'amount',
        'buyer_id',
        'store_id'
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail', 'order_id', 'id');
    }
}
