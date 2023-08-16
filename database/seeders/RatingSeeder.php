<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedRatings = [
            ['id' => 01, 'name' => 'Unrated', 'stars' => 0, 'icon' => 'lemon'],
            ['id' => 10, 'name' => 'Terrible', 'stars' => 1, 'icon' => 'lemon'],
            ['id' => 30, 'name' => 'Poor', 'stars' => 1, 'icon' => 'star'],
            ['id' => 40, 'name' => 'Ok', 'stars' => 2, 'icon' => 'star'],
            ['id' => 50, 'name' => 'Average', 'stars' => 3, 'icon' => 'star'],
            ['id' => 70, 'name' => 'Great', 'stars' => 4, 'icon' => 'star'],
            ['id' => 90, 'name' => 'Amazing', 'stars' => 5, 'icon' => 'star'],
        ];

        foreach ($seedRatings as $seedRating) {
            Rating::updateOrCreate($seedRating);
        }
    }
}
