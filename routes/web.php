<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PrestamoController;
use App\Models\Prestamo;

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


Route::post('/prestamos/search','PrestamoController@postBookSearch')->name('book_search');

Route::resource('prestamos',PrestamoController::class);
