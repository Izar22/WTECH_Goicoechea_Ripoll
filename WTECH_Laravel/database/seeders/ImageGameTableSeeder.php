<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageGameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $gameIds = DB::table('games')->pluck('id')->toArray();
        $imageIds = DB::table('images')->pluck('id')->toArray();

        foreach ($gameIds as $gameId) {
            $randomImageIds = collect($imageIds)->random(rand(2, 4));

            foreach ($randomImageIds as $imageId) {
                DB::table('image_game')->insert([
                    'game_id' => $gameId,
                    'image_id' => $imageId,
                ]);
            }
        }
    }
}
