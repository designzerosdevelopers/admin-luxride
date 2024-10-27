<?php

// database/seeders/ExtrasTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarExtrasTableSeeder extends Seeder
{
    public function run()
    {
        $extras = [
            ['title' => 'Child Seat', 'price' => 12, 'description' => 'Suitable for toddlers weighing 0-18 kg (approx 0 to 4 years).'],
            ['title' => 'Booster seat', 'price' => 12, 'description' => 'Suitable for children weighing 15-36 kg (approx 4 to 10 years).'],
            ['title' => 'Vodka Bottle', 'price' => 12, 'description' => 'Absolut Vodka 0.7l Bottle'],
            ['title' => 'Bouquet of Flowers', 'price' => 12, 'description' => 'A bouquet of seasonal flowers prepared by a local florist'],
            ['title' => 'Alcohol Package', 'price' => 12, 'description' => 'A bouquet of seasonal flowers prepared by a local florist'],
            ['title' => 'Airport Assistance and Hostess Service', 'price' => 12, 'description' => 'A bouquet of seasonal flowers prepared by a local florist'],
            ['title' => 'Bodyguard Service', 'price' => 12, 'description' => 'A bouquet of seasonal flowers prepared by a local florist'],
        ];

        DB::table('car_extras')->insert($extras);
    }
}
