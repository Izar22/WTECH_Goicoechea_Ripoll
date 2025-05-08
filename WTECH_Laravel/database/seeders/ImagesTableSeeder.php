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
        $imageFolder = public_path('Images/Games');
        
        $images = File::allFiles($imageFolder);

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
