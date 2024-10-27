<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarTypesTableSeeder extends Seeder
{
    public function run()
    {
        $carTypes = [
            ['type' => 'Any'],
            ['type' => 'Sedan'],
            ['type' => 'SUV'],
            ['type' => 'Small SUV'],
            ['type' => 'Tour Car'],
            ['type' => 'Suburban'],
            ['type' => 'Minivan'],
            ['type' => 'Limousine'],
            ['type' => 'Crossover'],
        ];

        DB::table('car_types')->insert($carTypes);
    }
}
