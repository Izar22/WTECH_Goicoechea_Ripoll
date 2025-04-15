<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'payment_details_id',
        'shipping_details_id',
        'customer_id',
        'total_price',
    ];

    public $timestamps = false;

    public function payment()
    {
        return $this->belongsTo(PaymentDetail::class, 'payment_details_id');
    }

    public function shipping()
    {
        return $this->belongsTo(ShippingDetail::class, 'shipping_details_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function games()
    {
        return $this->hasMany(GameOrder::class, 'order_details_id');
    }
}
