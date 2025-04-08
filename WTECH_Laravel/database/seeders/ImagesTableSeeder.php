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
            $filename = Str::random(20) . '.' . $image->getExtension();
            $relativePath = 'images/games/' . $filename;
        
            // Copy the image to storage/app/public/images/games/
            Storage::disk('public')->put($relativePath, file_get_contents($image));
        
            Image::create([
                'path' => $relativePath,
            ]);
        }
    }
}
