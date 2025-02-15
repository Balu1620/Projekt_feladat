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
            ['Tipus' => 'Sisak', 'Meret' => 'M', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => 'L', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => 'XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => '2XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => '3XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => 'M', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => 'L', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => 'XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => '2XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Sisak', 'Meret' => '3XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],

            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'M', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'L', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => '2XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => '3XL', 'Helyszin' => '1024 Budapest, Keleti Károly utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'M', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'L', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => 'XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => '2XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
            ['Tipus' => 'Protektoros Ruha', 'Meret' => '3XL', 'Helyszin' => '1011 Budapest, Fő utca 5.'],
        ]);
    }
}
