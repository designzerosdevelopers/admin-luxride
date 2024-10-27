<?php

// database/seeders/FeaturesTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarFeaturesTableSeeder extends Seeder
{
    public function run()
    {
        $features = [
            ['feature' => '+100.000 passengers transported'],
            ['feature' => 'Instant confirmation'],
            ['feature' => 'All-inclusive pricing'],
            ['feature' => 'Secure Payment by credit card, debit card or Paypal'],
        ];

        DB::table('car_features')->insert($features);
    }
}
