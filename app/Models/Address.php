<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'region', 
        'province',
        'city',
        'barangay',
        'postal_code',
        'address_name'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
