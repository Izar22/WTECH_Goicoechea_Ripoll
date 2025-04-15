<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'phone',
        'address',
        'city',
        'region',
        'country',
        'zipcode',
    ];
}
