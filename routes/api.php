<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContinentController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

//Authentication

Route::group([

    'middleware' => 'api',

    'prefix' => 'auth',

], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/refresh', [AuthController::class, 'refresh']);

    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

//Reservations

Route::get('reservations/{user}', [ReservationController::class, 'index']);

Route::get('reservations/{tour}/create', [ReservationController::class, 'create']);

Route::get('reservations/{tour}/checkout', [ReservationController::class, 'checkout']);

Route::post('reservations/{tour}/checkout', [ReservationController::class, 'store']);

Route::get('reservations/{user}/{reservation}/{tour}/edit', [ReservationController::class, 'edit']);

Route::post('reservations/{user}/{reservation}/{tour}/update', [ReservationController::class, 'update']);

Route::delete('reservations/{user}/{reservation}/delete', [ReservationController::class, 'delete']);

//Countries

Route::get('countries', [CountryController::class, 'index']);

Route::get('country/{id}', [CountryController::class, 'show']);

Route::get('dashboard/countries', [CountryController::class, 'admin_index']);

Route::get('dashboard/country/{country}', [CountryController::class, 'admin_show']);

Route::get('dashboard/countries/create', [CountryController::class, 'create']);

Route::post('dashboard/countries/create', [CountryController::class, 'store']);

Route::patch('dashboard/countries/{country}/update', [CountryController::class, 'update']);

Route::delete('dashboard/countries/{country}/delete', [CountryController::class, 'delete']);

//Continents

Route::get('continents', [ContinentController::class, 'index']);

Route::get('continent/{id}', [ContinentController::class, 'show']);

Route::get('dashboard/continents', [ContinentController::class, 'admin_index']);

Route::get('dashboard/continent/{continent}', [ContinentController::class, 'admin_show']);

Route::get('dashboard/continents/create', [ContinentController::class, 'create']);

Route::post('dashboard/continents/create', [ContinentController::class, 'store']);

Route::get('dashboard/continents/{continent}/edit', [ContinentController::class, 'edit']);

Route::patch('dashboard/continents/{continent}/update', [ContinentController::class, 'update']);

Route::delete('dashboard/continents/{continent}/delete', [ContinentController::class, 'delete']);

//Locations

Route::get('/locations', [LocationController::class, 'index']);

Route::get('/location/{id}', [LocationController::class, 'show']);

Route::get('dashboard/locations', [LocationController::class, 'admin_index']);

Route::get('dashboard/location/{location}', [LocationController::class, 'admin_show']);

Route::get('dashboard/locations/create', [LocationController::class, 'create']);

Route::post('dashboard/locations/create', [LocationController::class, 'store']);

Route::get('dashboard/locations/{location}/edit', [LocationController::class, 'edit']);

Route::patch('dashboard/locations/{location}/update', [LocationController::class, 'update']);

Route::delete('dashboard/locations/{location}/delete', [LocationController::class, 'delete']);

//Tours

Route::get('/tours', [TourController::class, 'index']);

Route::get('/tour/{id}', [TourController::class, 'show']);

Route::get('dashboard/tours', [TourController::class, 'admin_index']);

Route::get('dashboard/tour/{tour}', [TourController::class, 'admin_show']);

Route::get('dashboard/tours/create', [TourController::class, 'create']);

Route::post('dashboard/tours/create', [TourController::class, 'store']);

Route::get('dashboard/tours/{tour}/edit', [TourController::class, 'edit']);

Route::patch('dashboard/tours/{tour}/update', [TourController::class, 'update']);

Route::delete('dashboard/tours/{tour}/delete', [TourController::class, 'delete']);

//Roles

Route::get("dashboard/roles", [RoleController::class, 'index']);

Route::get('/dashboard/roles/create', [RoleController::class, 'create']);

Route::post('/dashboard/roles/create', [RoleController::class, 'store']);

Route::get('/dashboard/role/{role}', [RoleController::class, 'show']);

Route::get('dashboard/roles/{role}/edit', [RoleController::class, 'edit']);

Route::patch('dashboard/roles/{role}/update', [RoleController::class, 'update']);

Route::delete('dashboard/roles/{role}/delete', [RoleController::class, 'destroy']);

//Users
Route::get('/dashboard/users', [UserController::class, 'index']);

Route::get('/dashboard/users/create', [UserController::class, 'create']);

Route::post('/dashboard/users/create', [UserController::class, 'store']);

Route::get('/dashboard/user/{user}', [UserController::class, 'show']);

Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit']);

Route::patch('/dashboard/users/{user}/update', [UserController::class, 'update']);

Route::delete('/dashboard/users/{user}/delete', [UserController::class, 'delete']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
