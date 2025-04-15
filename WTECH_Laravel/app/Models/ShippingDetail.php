<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingDetail extends Model
{
    protected $table = 'shipping_details';

    protected $fillable = [
        'name', 'surname', 'email', 'phone',
        'address', 'city', 'region', 'country', 'zipcode',
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasOne(OrderDetail::class, 'shipping_details_id');
    }
}
