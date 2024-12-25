<?php

use App\Http\Controllers\ManufactureController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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