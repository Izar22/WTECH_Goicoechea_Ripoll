<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameOrder extends Model
{
    protected $table = 'game_order';

    protected $fillable = [
        'game_id',
        'quantity',
        'order_details_id',
    ];

    public $timestamps = false;

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function order()
    {
        return $this->belongsTo(OrderDetail::class, 'order_details_id');
    }
}
