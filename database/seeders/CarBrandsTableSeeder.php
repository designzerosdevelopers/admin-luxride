<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarBrandsTableSeeder extends Seeder
{
    public function run()
    {
        $carBrands = [
            ['brand' => 'Mercedes-Benz'],
            ['brand' => 'Audi'],
            ['brand' => 'Hyundai'],
            ['brand' => 'Honda'],
        ];

        DB::table('car_brands')->insert($carBrands);
    }
}
