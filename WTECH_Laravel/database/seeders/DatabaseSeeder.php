<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GameSeeder;
use Database\Seeders\ImagesTableSeeder;
use Database\Seeders\ImageGameTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GameSeeder::class);
        $this->call(ImagesTableSeeder::class);
        $this->call(ImageGameTableSeeder::class);
    }
}
