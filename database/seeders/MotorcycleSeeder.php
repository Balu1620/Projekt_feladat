<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorcycleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('motorcycles')->insert([
            [
            'brand' => "banana",
            'type' => "alma",
            'licencePlate' => "alma",
            'year' => 11,
            'gearbox' => "alma",
            'fuel' => "B",
            'power' => "alma",
            'engineSize' => 11,
            'drivingLicence' => "alma",
            'places' => 11,
            'price'=> 11,
            'deposit'=> 11,
            'trafficDate'=> '2025.01.01',
            'location'=> "alma",
            ],
            

        ]);
    }
}
