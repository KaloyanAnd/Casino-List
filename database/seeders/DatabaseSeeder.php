<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Brand;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $brands = [
            ['brand_name' => 'Mafia Casino', 'brand_image' => 'mafia_casino.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Robo Cat', 'brand_image' => 'robo_cat.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Wild Robin', 'brand_image' => 'wild_robin.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Winbay', 'brand_image' => 'winbay.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Mad Casino', 'brand_image' => 'mad_casino.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Wildsino', 'brand_image' => 'wildsino.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Talismania', 'brand_image' => 'talismania.png', 'rating' => 5, 'country_code' => 'FR'],
            ['brand_name' => 'Casombie', 'brand_image' => 'casombie.png', 'rating' => 4.5, 'country_code' => 'FR'],
            ['brand_name' => 'Gransino', 'brand_image' => 'gransino.png', 'rating' => 4.5, 'country_code' => 'FR'],
            ['brand_name' => 'Betano', 'brand_image' => 'betano.png', 'rating' => 4, 'country_code' => 'BG'],
            ['brand_name' => 'Plams Bet', 'brand_image' => 'plams_bet.png', 'rating' => 4.5, 'country_code' => 'BG'],
            ['brand_name' => 'Winbet', 'brand_image' => 'winbet.png', 'rating' => 4, 'country_code' => 'BG']
        ];

        Brand::insert($brands);
       

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
