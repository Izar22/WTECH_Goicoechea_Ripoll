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
        // Obtener todos los IDs de juegos e imágenes
        $gameIds = DB::table('games')->pluck('id')->toArray();
        $imageIds = DB::table('images')->pluck('id')->toArray();

        // Para cada juego, asignamos entre 1 y 3 imágenes aleatorias
        foreach ($gameIds as $gameId) {
            // Seleccionar entre 1 y 3 imágenes aleatorias (sin duplicados)
            $randomImageIds = collect($imageIds)->random(rand(1, 3));

            foreach ($randomImageIds as $imageId) {
                DB::table('image_game')->insert([
                    'game_id' => $gameId,
                    'image_id' => $imageId,
                ]);
            }
        }
    }
}
