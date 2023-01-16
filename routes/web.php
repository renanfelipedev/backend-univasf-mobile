<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\{AuthController, CalendarController, CampusController, CityController, EventController, HolidayController, PostController, RestaurantController, StateController, StopController, TransportController};

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

Route::get('/', [AuthController::class, 'create'])->name('login');
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login');
Route::any('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', fn () => view('welcome'));
    Route::resource('/posts', PostController::class);
    Route::resource('/campuses', CampusController::class);
    Route::resource('/cities', CityController::class);
    Route::resource('/states', StateController::class);
    Route::resource('/calendars', CalendarController::class);
    Route::resource('/events', EventController::class);
    Route::resource('/holidays', HolidayController::class);
    Route::resource('/restaurants', RestaurantController::class);

    Route::resource('/campuses/{campus}/transports', TransportController::class);
    Route::resource('/campuses/{campus}/transports/{transport}/stops', StopController::class);
});
