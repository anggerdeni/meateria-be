<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'phone',
        'description'

    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'owner_id', 'id');
    }
}
