<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/single-country/{id}', [CountryController::class, 'show'])
    ->name('countries.show');

Route::get('/tour/{id}', [TourController::class, 'show'])->name('tours.tour');

Route::get('/tours', [TourController::class, 'index'])->name('tours.tours');

Route::get('/continents', [ContinentController::class, 'index']);

Route::get('/continent/{id}', [ContinentController::class, 'show']);

Route::get('/locations', [LocationController::class, 'index']);

Route::get('/location/{id}', [LocationController::class, 'show']);

Route::get('/register', [RegisterController::class, 'create'])
    ->name('register.show');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register.perform');

Route::get('/login', [SessionsController::class, 'create'])
    ->name('login.show');

Route::post('/login', [SessionsController::class, 'store'])
    ->name('login.perform');

Route::post('/logout', [SessionsController::class, 'destroy'])
    ->name('logout.perform');

Route::get('/{user}/show', [UserController::class, 'show_user'])
    ->name('users.show_user');

Route::get('/reservations/{user}', [ReservationController::class, 'index'])
    ->name('reservations.index');

Route::get('/reservations/{tour}/create', [ReservationController::class, 'create'])
    ->name('reservations.create');

Route::get('/reservations/{tour}/checkout', [ReservationController::class, 'checkout'])
    ->name('reservations.checkout');

Route::post('/reservations/{tour}/checkout', [ReservationController::class, 'store'])
    ->name('reservations.store');

Route::get('/reservations/{user}/{reservation}/{tour}/edit', [ReservationController::class, 'edit'])
    ->name('reservations.edit');

Route::post('/reservations/{user}/{reservation}/{tour}/update', [ReservationController::class, 'update'])
    ->name('reservations.update');

Route::delete('/reservations/{user}/{reservation}/delete', [ReservationController::class, 'delete'])
    ->name('reservations.delete');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'create'])
        ->name('dashboard');

    Route::post('/dashboard/logout', [AdminController::class, 'destroy'])
        ->name('logout');

    Route::get('/dashboard/roles/create', [RoleController::class, 'create'])
        ->name('roles.create');

    Route::post('/dashboard/roles/create', [RoleController::class, 'store'])
        ->name('roles.store');

    //Users
    Route::get('/dashboard/users', [UserController::class, 'index'])
        ->name('users.index');

    Route::get('/dashboard/users/create', [UserController::class, 'create'])
        ->name('users.create');

    Route::post('/dashboard/users/create', [UserController::class, 'store'])
        ->name('users.store');

    Route::get('/dashboard/{user}/show', [UserController::class, 'show'])
        ->name('users.show');

    Route::get('/dashboard/{user}/edit', [UserController::class, 'edit'])
        ->name('users.edit');

    Route::patch('/dashboard/{user}/update', [UserController::class, 'update'])
        ->name('users.update');

    Route::delete('/dashboard/{user}/delete', [UserController::class, 'delete'])
        ->name('users.destroy');

    //Countries
    Route::get('/dashboard/countries', [CountryController::class, 'admin_index'])
        ->name('countries.index');

    Route::get('/dashboard/{country}', [CountryController::class, 'admin_show'])
        ->name('countries.show');

    Route::get('/dashboard/countries/create', [CountryController::class, 'create'])
        ->name('countries.create');

    Route::post('/dashboard/countries/create', [CountryController::class, 'store'])
        ->name('countries.store');

    Route::get('/dashboard/countries/{country}/edit', [CountryController::class, 'edit'])
        ->name('countries.edit');

    Route::patch('/dashboard/countries/{country}/update', [CountryController::class, 'update'])
        ->name('countries.update');

    Route::delete('/dashboard/countries/{country}/delete', [CountryController::class, 'delete'])
        ->name('countries.delete');

    //Continents
    Route::get('/dashboard/continents/continents', [ContinentController::class, 'admin_index'])
        ->name('continents.index');

    Route::get('/dashboard/{continent}', [ContinentController::class, 'admin_show'])
        ->name('continents.show');

    Route::get('/dashboard/continents/create', [ContinentController::class, 'create'])
        ->name('continents.create');

    Route::post('/dashboard/continents/create', [ContinentController::class, 'store'])
        ->name('continents.store');

    Route::get('/dashboard/continents/{continent}/edit', [ContinentController::class, 'edit'])
        ->name('continents.edit');

    Route::patch('/dashboard/continents/{continent}/update', [ContinentController::class, 'update'])
        ->name('continents.update');

    Route::delete('/dashboard/continents/{continent}/delete', [ContinentController::class, 'delete'])
        ->name('continents.delete');

    //Tours
    Route::get('/dashboard/tours/tours', [TourController::class, 'admin_index'])
        ->name('tours.index');

    Route::get('/dashboard/tours/{tour}', [TourController::class, 'admin_show'])
        ->name('tours.show');

    Route::get('/dashboard/tours/tours/create', [TourController::class, 'create'])
        ->name('tours.create');

    Route::post('/dashboard/tours/tours/create', [TourController::class, 'store'])
        ->name('tours.store');

    Route::get('/dashboard/tours/{tour}/edit', [TourController::class, 'edit'])
        ->name('tours.edit');

    Route::patch('/dashboard/tours/{tour}/update', [TourController::class, 'update'])
        ->name('tours.update');

    Route::delete('/dashboard/tours/{tour}/delete', [TourController::class, 'delete'])
        ->name('tours.delete');

    //Locations
    Route::get('/dashboard/locations/locations', [LocationController::class, 'admin_index'])
        ->name('locations.index');

    Route::get('/dashboard/locations/{location}', [LocationController::class, 'admin_show'])
        ->name('locations.show');

    Route::get('/dashboard/locations/locations/create', [LocationController::class, 'create'])
        ->name('locations.create');

    Route::post('/dashboard/locations/locations/create', [LocationController::class, 'store'])
        ->name('locations.store');

    Route::get('/dashboard/locations/{location}/edit', [LocationController::class, 'edit'])
        ->name('locations.edit');

    Route::patch('/dashboard/locations/{location}/update', [LocationController::class, 'update'])
        ->name('locations.update');

    Route::delete('/dashboard/locations/{location}/delete', [LocationController::class, 'delete'])
        ->name('locations.delete');

    //Reservations

    Route::get('dashboard/reservations/reservations', [ReservationController::class, 'show'])
        ->name('reservations.show');

    Route::get('dashboard/reservations/{user}/{reservation}/{tour}', [ReservationController::class, 'show_one'])
        ->name('reservations.show_one');

});

// Auth::routes();
