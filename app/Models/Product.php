<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'weight_type',
        'price',
        'quantity',
        'picture',
        'description',
        'seller_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'seller_id', 'id');
    }
}
