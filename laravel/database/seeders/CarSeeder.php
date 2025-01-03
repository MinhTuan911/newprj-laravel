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
    public function run(): void
    {
        // Thêm xe đầu tiên
        $car1Id = DB::table('cars')->insertGetId([
            'name' => 'Lamborghini Aventador SVJ 63 Blu Aegir',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '784.jpg', // Đường dẫn ảnh chính
            'price' => 329000,
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm hình phụ cho xe đầu tiên
        DB::table('car_images')->insert([
            [
                'car_id' => $car1Id,
                'image' => '784_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => $car1Id,
                'image' => '784_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => $car1Id,
                'image' => '784_3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Thêm xe thứ hai
        $car2Id = DB::table('cars')->insertGetId([
            'name' => 'Lamborghini Huracán Sterrato Verde Gea Matt',
            'brand' => 'Lamborghini',
            'manufacture' => 'Mini GT',
            'image' => '779.jpg', // Đường dẫn ảnh chính
            'price' => 329000,
            'description' => 'Hàng hóa chưa có mô tả chi tiết',
            'amount' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Thêm hình phụ cho xe thứ hai
        DB::table('car_images')->insert([
            [
                'car_id' => $car2Id,
                'image' => '779_1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => $car2Id,
                'image' => '779_2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'car_id' => $car2Id,
                'image' => '779_3.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

            // Thêm xe thứ ba
            $car3Id = DB::table('cars')->insertGetId([
                'name' => 'Lamborghini Aventador SVJ Viola Aletheia',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '343.jpg', // Đường dẫn ảnh chính
                'price' => 429000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car3Id,
                    'image' => '343_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car3Id,
                    'image' => '343_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car3Id,
                    'image' => '343_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
    
            $car4Id = DB::table('cars')->insertGetId([
                'name' => 'Lamborghini Huracán GT3 EVO2 #83 Iron Dames 2023 IMSA Daytona 24 Hrs',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '772.jpg', // Đường dẫn ảnh chính
                'price' => 329000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car4Id,
                    'image' => '772_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car4Id,
                    'image' => '772_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car4Id,
                    'image' => '772_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car5Id = DB::table('cars')->insertGetId([
                'name' => 'Lamborghini LB-Silhouette WORKS Aventador GT EVO Yellow',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '639.jpg', // Đường dẫn ảnh chính
                'price' => 329000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car5Id,
                    'image' => '639_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car5Id,
                    'image' => '639_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car5Id,
                    'image' => '639_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car6Id = DB::table('cars')->insertGetId([
                'name' => 'LB★WORKS Lamborghini Huracán GT White',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '126.jpg', // Đường dẫn ảnh chính
                'price' => 999000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car6Id,
                    'image' => '126_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car6Id,
                    'image' => '126_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car6Id,
                    'image' => '126_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car7Id = DB::table('cars')->insertGetId([
                'name' => 'Lamborghini Aventador SVJ Giallo Orion',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '563.jpg', // Đường dẫn ảnh chính
                'price' => 329000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car7Id,
                    'image' => '563_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car7Id,
                    'image' => '563_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car7Id,
                    'image' => '563_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            $car7Id = DB::table('cars')->insertGetId([
                'name' => 'Lamborghini Aventador SVJ Giallo Orion',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '563.jpg', // Đường dẫn ảnh chính
                'price' => 329000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car7Id,
                    'image' => '563_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car7Id,
                    'image' => '563_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car7Id,
                    'image' => '563_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car8Id = DB::table('cars')->insertGetId([
                'name' => 'LB★WORKS Lamborghini Huracan ver. 2 Red',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '375.jpg', // Đường dẫn ảnh chính
                'price' => 359000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car8Id,
                    'image' => '375_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car8Id,
                    'image' => '375_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car8Id,
                    'image' => '375_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car9Id = DB::table('cars')->insertGetId([
                'name' => 'LB★WORKS Lamborghini Huracan GT Rosso Mars',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '129.jpg', // Đường dẫn ảnh chính
                'price' => 999000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car9Id,
                    'image' => '129_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car9Id,
                    'image' => '129_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car9Id,
                    'image' => '129_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);
            //
            $car10Id = DB::table('cars')->insertGetId([
                'name' => 'LB★WORKS Lamborghini Huracán GT Digital Camouflage',
                'brand' => 'Lamborghini',
                'manufacture' => 'Mini GT',
                'image' => '398.jpg', // Đường dẫn ảnh chính
                'price' => 390000,
                'description' => 'Hàng hóa chưa có mô tả chi tiết',
                'amount' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::table('car_images')->insert([
                [
                    'car_id' => $car10Id,
                    'image' => '398_1.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car10Id,
                    'image' => '398_2.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'car_id' => $car10Id,
                    'image' => '398_3.jpg',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

    
    
    
    
    
    
    
    
    
    
    }
}
