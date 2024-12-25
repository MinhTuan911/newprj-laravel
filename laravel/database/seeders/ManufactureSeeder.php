<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        //php artisan db:seed --class=ManufactureSeeder			

    public function run(): void
    {
        //
        DB::table('manufactures')->insert([
            'name' => 'Mini GT',
        ]);
          //
          DB::table(table: 'manufactures')->insert([
            'name' => 'Kaido House',
        ]);
          //
          DB::table('manufactures')->insert([
            'name' => 'Hot Wheels',
        ]);
    }
}
