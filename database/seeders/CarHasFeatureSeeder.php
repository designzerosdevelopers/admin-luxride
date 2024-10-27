<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarHasFeatureSeeder extends Seeder
{
    public function run()
    {
        DB::table('car_has_features')->insert([
            ['car_id' => 1, 'feature_id' => 1],
            ['car_id' => 1, 'feature_id' => 2],
            ['car_id' => 2, 'feature_id' => 3],
        ]);
    }
}
