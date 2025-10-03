<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = [
        'user_id',
        'status',
        'total',
        'status',
        'payment_method',
    ];

    public function  user()
    {
        return $this->belongsTo(User::class);
    }
}
