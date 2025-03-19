<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tools')->insert([
            ['name' => 'Sisak', 'size' => 'S'],
            ['name' => 'Sisak', 'size' => 'M'],
            ['name' => 'Sisak', 'size' => 'L'],
            ['name' => 'Sisak', 'size' => 'XL'],
            ['name' => 'Sisak', 'size' => '2XL'],


            ['name' => 'Protektoros Ruha', 'size' => 'S'],
            ['name' => 'Protektoros Ruha', 'size' => 'M'],
            ['name' => 'Protektoros Ruha', 'size' => 'L'],
            ['name' => 'Protektoros Ruha', 'size' => 'XL'],
            ['name' => 'Protektoros Ruha', 'size' => '2XL'],


            ['name' => 'Cipő', 'size' => '39'],
            ['name' => 'Cipő', 'size' => '40'],
            ['name' => 'Cipő', 'size' => '41'],
            ['name' => 'Cipő', 'size' => '42'],
            ['name' => 'Cipő', 'size' => '43'],
            ['name' => 'Cipő', 'size' => '44'],
            ['name' => 'Cipő', 'size' => '45'],
            ['name' => 'Cipő', 'size' => '46'],
        ]);
    }
}
