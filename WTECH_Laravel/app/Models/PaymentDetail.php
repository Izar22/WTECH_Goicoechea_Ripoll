<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $table = 'payment_details';

    protected $fillable = [
        'card_number',
        'exp_month',
        'exp_year',
        'cvv',
    ];

    public $timestamps = false;

    public function order()
    {
        return $this->hasOne(OrderDetail::class, 'payment_details_id');
    }
}
