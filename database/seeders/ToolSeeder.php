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
            ['toolName' => 'Sisak', 'size' => 'S'],
            ['toolName' => 'Sisak', 'size' => 'M'],
            ['toolName' => 'Sisak', 'size' => 'L'],
            ['toolName' => 'Sisak', 'size' => 'XL'],
            ['toolName' => 'Sisak', 'size' => '2XL'],


            ['toolName' => 'Protektoros Ruha', 'size' => 'S'],
            ['toolName' => 'Protektoros Ruha', 'size' => 'M'],
            ['toolName' => 'Protektoros Ruha', 'size' => 'L'],
            ['toolName' => 'Protektoros Ruha', 'size' => 'XL'],
            ['toolName' => 'Protektoros Ruha', 'size' => '2XL'],


            ['toolName' => 'Cipő', 'size' => '39'],
            ['toolName' => 'Cipő', 'size' => '40'],
            ['toolName' => 'Cipő', 'size' => '41'],
            ['toolName' => 'Cipő', 'size' => '42'],
            ['toolName' => 'Cipő', 'size' => '43'],
            ['toolName' => 'Cipő', 'size' => '44'],
            ['toolName' => 'Cipő', 'size' => '45'],
            ['toolName' => 'Cipő', 'size' => '46'],
        ]);
    }
}
