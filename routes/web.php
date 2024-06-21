<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PrestamoController;
use App\Models\Prestamo;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Module books


Route::resource('prestamos',PrestamoController::class);

Route::get('/prestamos/create/login', [UserController::class, 'getLogin'])->name('login');
Route::post('/prestamos/create/login', [UserController::class, 'postLogin'])->name('login');


Route::get('/prestamos/create/register',[UserController::class,'getRegister'])->name('register');
Route::post('/prestamos/create/register',[UserController::class,'postRegister'])->name('register');
Route::get('/logout', [UserController::class,'getLogout']);

Route::post('prestamos/create/search',[PrestamoController::class,'postProductSearch']);

//Esto es del mejor programador de un cuarto de 4*4<!-elpepe->

//https://github.com/nilton2005/Lab-13.git