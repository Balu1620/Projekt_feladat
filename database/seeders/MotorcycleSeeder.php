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
                'brand' => 'Aprilia',
                'type' => 'Caponord 1200',
                'licencePlate' => 'VPM-327',
                'year' => 2015,
                'gearbox' => 'Manualis (6 fokozatu)',
                'fuel' => 'B',
                'power' => '125.0 LE (91.2 kW)',
                'engineSize' => 1197,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 32767,
                'deposit' => 145800,
                'trafficDate' => '2028-03-15',
                'location' => '1042 Budapest, István út 14.'
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'Mana 850',
                'licencePlate' => 'KYQ-873',
                'year' => 2012,
                'gearbox' => 'Automata',
                'fuel' => 'B',
                'power' => '75.1 LE (54.8 kW)',
                'engineSize' => 839.3,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 20700,
                'deposit' => 62100,
                'trafficDate' => '2025-07-20',
                'location' => '1092 Budapest, Ráday utca 6.'
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'RS 125',
                'licencePlate' => 'GZR-419',
                'year' => 2006,
                'gearbox' => 'Manuális (6 fokozatu)',
                'fuel' => 'D',
                'power' => '28.2 LE (20.6 kW)',
                'engineSize' => 124.8,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 32767,
                'deposit' => 99300,
                'trafficDate' => '2026-11-08',
                'location' => null
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'RSV4 Factory',
                'licencePlate' => 'PNB-672',
                'year' => 2010,
                'gearbox' => 'Manualis (6 fokozatu)',
                'fuel' => 'B',
                'power' => '177.6 LE (129.6 kW)',
                'engineSize' => 999.6,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 32767,
                'deposit' => 133200,
                'trafficDate' => '2027-04-01',
                'location' => null
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'SR 160',
                'licencePlate' => 'ZFB-830',
                'year' => 2021,
                'gearbox' => 'Automata',
                'fuel' => 'B',
                'power' => '10.8 LE (7.9 kW)',
                'engineSize' => 160,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 24800,
                'deposit' => 74400,
                'trafficDate' => '2028-12-18',
                'location' => '1102 Budapest, Kőrösi Csoma Sándor út 1.'
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'Tuono 125',
                'licencePlate' => 'WLS-456',
                'year' => 2017,
                'gearbox' => 'Manualis (6 fokozatu)',
                'fuel' => 'B',
                'power' => '15.0 LE (10.9 kW)',
                'engineSize' => 124.8,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 31100,
                'deposit' => 93300,
                'trafficDate' => '2029-09-30',
                'location' => '1191 Budapest, Kossuth tér 7.'
            ],
            [
                'brand' => 'Aprilia',
                'type' => 'Tuono 660',
                'licencePlate' => 'TXN-258',
                'year' => 2023,
                'gearbox' => 'Manualis (6 fokozatu)',
                'fuel' => 'B',
                'power' => '95.0 LE (69.3 kW)',
                'engineSize' => 660,
                'drivingLicence' => 'A2',
                'places' => 2,
                'price' => 32767,
                'deposit' => 147900,
                'trafficDate' => '2028-05-22',
                'location' => '1163 Budapest, Veres Péter út 49.'
            ]            

        ]);
    }
}
