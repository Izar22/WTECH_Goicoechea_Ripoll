<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';

    public $timestamps = false;

    protected $fillable = ['customer_id'];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
}
