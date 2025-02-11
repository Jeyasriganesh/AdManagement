<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ad;
use App\Models\User;
use Faker\Factory as Faker;

class AdSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $user = User::first(); // Get an existing user

        if (!$user) {
            $user = User::factory()->create(); // Create a user if none exists
        }

        foreach (range(1, 50) as $index) { // Create 50 dummy ads
            Ad::create([
                'user_id' => $user->id,
                'title' => $faker->sentence(3),
                'description' => $faker->paragraph(),
                'price' => $faker->randomFloat(2, 10, 1000),
                'category' => $faker->randomElement(['Electronics', 'Furniture', 'Cars']),
                'location' => $faker->city,
                'image' => 'ads/no-picture.jpg' // Use a placeholder image
            ]);
        }
    }
}

