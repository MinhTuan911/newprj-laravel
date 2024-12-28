<?php

use App\Http\Controllers\ManufactureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use app\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('dashboard'); // Hoặc view bạn muốn làm trang chủ, ví dụ: 'home' hoặc 'dashboard'
});
Route::get('/users', [UserController::class, 'index'])->name('users.index');        
Route::get('/dashboard', function () {
    return view('dashboard');
})-> middleware('auth')->name('dashboard'); 
Route::get('/register', function () {
    return view('crud_user.register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('crud_user.login');
})->name('login');
Route::post('/login', [UserController::class, 'login']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/listuser', [UserController::class, 'listuser'])->name('listuser');
Route::get('/readuser', [UserController::class, 'readuser'])->name('readuser');
Route::get('/edituser/{id}', [UserController::class, 'edituser'])->name('edituser');
Route::put('/updateuser/{id}', [UserController::class, 'updateuser'])->name('updateuser');
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteuser'])->name('deleteuser');

//Manufactures
Route::get('/createmanufacture', [ManufactureController::class, 'create'])->name('createmanufacture');
Route::post('/createmanufacture', [ManufactureController::class, 'store'])->name('storemanufacture');
Route::get('/listmanufacture', [ManufactureController::class, 'list'])->name('listmanufacture');
Route::get('/showmanufacture/{id}', [ManufactureController::class, 'show'])->name('showmanufacture');
Route::get('editmanufacture/{id}', [ManufactureController::class, 'edit'])->name('editmanufacture');
Route::post('updatemanufacture/{id}', [ManufactureController::class, 'update'])->name('updatemanufacture');
Route::delete('deletemanufacture/{id}', [ManufactureController::class, 'delete'])->name('deletemanufacture');


//brands
Route::get('/addbrand', [BrandController::class, 'addBrand'])->name('addbrand');
Route::post('/addbrand', [BrandController::class, 'storeBrand'])->name('storebrand');
Route::get('/listbrand', [BrandController::class, 'listBrand'])->name('listbrand');
Route::get('/showbrand/{id}', [BrandController::class, 'showBrand'])->name('showbrand');
Route::get('edit-brand/{id}', [BrandController::class, 'editBrand'])->name('editbrand');
Route::post('update-brand/{id}', [BrandController::class, 'updateBrand'])->name('updatebrand');
Route::delete('delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('deletebrand');

//cars
Route::get('/addcar', [CarController::class, 'addCar'])->name('addcar');
Route::post('/addcar', [CarController::class, 'storeCar'])->name('storecar');
Route::get('/listcar', [CarController::class, 'listCar'])->name('listcar');
Route::get('/showcar/{id}', [CarController::class, 'showCar'])->name('showcar');
// Route::get('timkiem', [CarController::class, 'TimKiemCar'])->name('cars.showTen');
Route::delete('delete-car/{id}', [CarController::class, 'deleteCar'])->name('deletecar');
Route::get('edit-car/{id}', [CarController::class, 'editCar'])->name('editcar');
Route::put('update-car/{id}', [CarController::class, 'updateCar'])->name('updatecar');