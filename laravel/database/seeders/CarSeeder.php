<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        //php artisan db:seed --class=CarSeeder			

    public function run(): void
    {
        //
        DB::table('cars')->insert([
            'name' => 'MINI GT Box Version MGT00784 Lamborghini Aventador SVJ 63 Blu Aegir',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/784.jpg',
            'price' => '329000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        //
        DB::table('cars')->insert([
            'name' => 'MiniGT Box Version MGT00511 Lamborghini Huracán STO Arancio Borealis',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/511.jpg',
            'price' => '319000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        //
        DB::table('cars')->insert([
            'name' => 'MiniGT Box Version MGT00607 Lamborghini Countach LPI 800-4 Nero Maia',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/607.jpg',
            'price' => '289000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        DB::table('cars')->insert([
            'name' => 'MiniGT Box Version MGT00639 Lamborghini LB-Silhouette WORKS Aventador GT EVO Yellow',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/639.jpg',
            'price' => '349000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        DB::table('cars')->insert([
            'name' => 'MiniGT CARD Version MGT00645 Lamborghini Huracán GT3 EVO #4 2022 Macau GP Macau GT Cup 3rd Place',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/645.jpg',
            'price' => '359000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        DB::table('cars')->insert([
            'name' => 'MiniGT Box Version MGT00605 Lamborghini LB-Silhouette WORKS Aventador GT EVO Lime',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/605.jpg',
            'price' => '299000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
        DB::table('cars')->insert([
            'name' => 'MiniGT Box Version MGT00563 Lamborghini Aventador SVJ New Giallo Orion',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '../images/563.jpg',
            'price' => '329000',
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => '10'
        ]);
    }
}
