<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $platforms = ['PC', 'PlayStation', 'Xbox', 'Nintendo Switch'];
        $regions = ['NA', 'EU', 'JP', 'Global'];
        $genres = ['Action', 'Adventure', 'RPG', 'Shooter', 'Puzzle', 'Simulation'];

        foreach (range(1, 50) as $index) {
            DB::table('games')->insert([
                'title' => $faker->words(3, true),
                'release_date' => $faker->date('Y-m-d'),
                'publisher_name' => $faker->company,
                'price' => $faker->randomFloat(2, 0.99, 9.99),
                'platform' => $faker->randomElement($platforms),
                'region' => $faker->randomElement($regions),
                'genre' => $faker->randomElement($genres),
                'description' => $faker->sentence(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
