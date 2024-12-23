<?php

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

Route::get('/logout',[UserController::class, 'logout']);

