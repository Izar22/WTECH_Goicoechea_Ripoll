<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'path',
    ];

    public $timestamps = false; 

    public function games()
    {
        return $this->belongsToMany(Game::class, 'image_game', 'image_id', 'game_id');
    }    
}
