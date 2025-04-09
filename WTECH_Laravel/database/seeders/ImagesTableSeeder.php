<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Image; 
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ruta de la carpeta donde están las imágenes
        $imageFolder = public_path('Images/Games');
        
        // Obtener todos los archivos de la carpeta
        $images = File::allFiles($imageFolder);

        // Iterar sobre cada imagen en la carpeta
        foreach ($images as $image) {
            $filename = $image->getFilename();
            $relativePath = 'images/games/' . $filename;

            $this->command->info("Guardando imagen: {$relativePath}");
        
            Image::create([
                'path' => $relativePath,
            ]);
        }
    }
}
