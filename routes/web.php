<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ContinentController;

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

Route::get('/', [CountryController::class, 'index'])->name('index');

Route::get('/single-country/{id}', [CountryController::class, 'show'])->name('show');

Route::get('/tour/{id}', [TourController::class, 'show']);

Route::get('/tours', [TourController::class, 'index']);

Route::get('/continents', [ContinentController::class, 'index']);

// Auth::routes();
