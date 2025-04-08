<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameShoppingCart extends Model
{
    protected $table = 'game_shopping_cart';

    public $timestamps = false;

    protected $fillable = ['cart_id', 'game_id', 'quantity'];

    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'cart_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class, 'game_id');
    }
}
