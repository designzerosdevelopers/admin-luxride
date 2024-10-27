<?php

// database/seeders/CarsTableSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsTableSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle.png',
                'title' => 'Business Class',
                'description' => 'Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS or similar',
                'passenger' => 3,
                'luggage' => 2,
                'price' => 1150,
                'carType' => 1,
                'brand' => 1,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle-2.png',
                'title' => 'First Class',
                'description' => 'Mercedes-Benz EQS, BMW 7 Series, Audi A8 or similar',
                'passenger' => 5,
                'luggage' => 3,
                'price' => 750,
                'carType' => 2,
                'brand' => 2,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle-3.png',
                'title' => 'Business Van/SUV',
                'description' => 'Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac',
                'passenger' => 2,
                'luggage' => 1,
                'price' => 1300,
                'carType' => 3,
                'brand' => 3,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle-4.png',
                'title' => 'SUV Class',
                'description' => 'Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac',
                'passenger' => 4,
                'luggage' => 2,
                'price' => 1100,
                'carType' => 4,
                'brand' => 4,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle.png',
                'title' => 'Luxury Class',
                'description' => 'Mercedes-Benz E-Class, BMW 5 Series, Cadillac XTS or similar',
                'passenger' => 1,
                'luggage' => 3,
                'price' => 1400,
                'carType' => 1,
                'brand' => 2,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle-2.png',
                'title' => 'Electric Class',
                'description' => 'Mercedes-Benz EQS, BMW 7 Series, Audi A8 or similar',
                'passenger' => 6,
                'luggage' => 4,
                'price' => 950,
                'carType' => 4,
                'brand' => 2,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle.png',
                'title' => 'Business Class',
                'description' => 'Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac',
                'passenger' => 2,
                'luggage' => 2,
                'price' => 1050,
                'carType' => 2,
                'brand' => 1,
            ],
            [
                'imgSrc' => '/assets/imgs/page/booking/img-vehicle-2.png',
                'title' => 'First Class',
                'description' => 'Mercedes-Benz V-Class, Chevrolet Suburban, Cadillac',
                'passenger' => 4,
                'luggage' => 1,
                'price' => 800,
                'carType' => 3,
                'brand' => 1,
            ],
        ];

        DB::table('cars')->insert($cars);
    }
}
