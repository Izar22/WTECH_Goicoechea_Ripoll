<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'title',
        'release_date',
        'publisher_name',
        'price',
        'platform',
        'region',
        'genre',
        'description',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_game');
    }
}
