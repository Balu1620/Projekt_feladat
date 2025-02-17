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
            ['name' => 'Sisak', 'size' => 'M', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Sisak', 'size' => 'L', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Sisak', 'size' => 'XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Sisak', 'size' => '2XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Sisak', 'size' => '3XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Sisak', 'size' => 'M', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Sisak', 'size' => 'L', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Sisak', 'size' => 'XL', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Sisak', 'size' => '2XL', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Sisak', 'size' => '3XL', 'location' => '1011 Budapest, Fő utca 5.'],

            ['name' => 'Protektoros Ruha', 'size' => 'M', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => 'L', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => 'XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => '2XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => '3XL', 'location' => '1024 Budapest, Keleti Károly utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => 'M', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => 'L', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => 'XL', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => '2XL', 'location' => '1011 Budapest, Fő utca 5.'],
            ['name' => 'Protektoros Ruha', 'size' => '3XL', 'location' => '1011 Budapest, Fő utca 5.'],
        ]);
    }
}
