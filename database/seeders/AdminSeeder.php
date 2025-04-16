<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
            $admins = [
                [
                    'name' => 'Admin Anna',
                    'email' => "admin@gmail.com",
                    'password' => 'admin.1234',
                    'jobStatus' => 0
                ],
                [
                    'name' => 'Szerelő Sergej',
                    'email' => "szerelo@gmail.com",
                    'password' => 'szer.1234',
                    'jobStatus' => 1
                ],
                [
                    'name' => 'Recepciós Renáta',
                    'email' => "recepcio@gmail.com",
                    'password' => 'rec.1234',
                    'jobStatus' => 2
                ]
            ];

            foreach($admins as $admin){
                Admin::create([
                    "name" => $admin['name'],
                    "email" => $admin['email'],
                    "password" => $admin['password'],
                    "jobStatus" => $admin['jobStatus'],
                ]);
            }
        */
    }
}
