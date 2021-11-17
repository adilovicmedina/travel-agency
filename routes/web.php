<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [CountryController::class, 'index'])->name('home');

Route::get('/single-country/{id}', [CountryController::class, 'show'])->name('show');

Route::get('/tour/{id}', [TourController::class, 'show']);

Route::get('/tours', [TourController::class, 'index']);

Route::get('/continents', [ContinentController::class, 'index']);

Route::get('/continent/{id}', [ContinentController::class, 'show']);

Route::get('/locations', [LocationController::class, 'index']);

Route::get('/location/{id}', [LocationController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionsController::class, 'create'])->name('login');

Route::post('/login/store', [SessionsController::class, 'login_store']);

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/admin/dashboard', [AdminController::class, 'create'])->middleware('admin');



// Auth::routes();
