<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'alma.1234',
            'phoneNumber' => '06202222222',
            'drivingLicenceNumber' => 'NE2321',
            'drivingLicenceType' => 'B1',
            'drivingLicenceImage' => 'placeholder.jpg',
            'drivingLicenceImageBack' => 'placeholder.jpg'
        ]);

        

        $this->call([
            MotorcycleSeeder::class,
            ToolSeeder::class,
            AdminSeeder::class
        ]);

    }
}
