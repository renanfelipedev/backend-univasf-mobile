<?php

use App\Http\Controllers\FoodController;
use App\Http\Controllers\MealController;
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
    Route::resource('/restaurants/{restaurant}/meals', MealController::class);
    Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');


    Route::resource('/campuses/{campus}/transports', TransportController::class);
    Route::resource('/campuses/{campus}/transports/{transport}/stops', StopController::class);
});

// <div class="card card-primary">
// <div class="card-header">
// <h3 class="card-title">General</h3>
// <div class="card-tools">
// <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
// <i class="fas fa-minus"></i>
// </button>
// </div>
// </div>
// <div class="card-body">
// <div class="form-group">
// <label for="inputName">Project Name</label>
// <input type="text" id="inputName" class="form-control">
// </div>
// <div class="form-group">
// <label for="inputDescription">Project Description</label>
// <textarea id="inputDescription" class="form-control" rows="4"></textarea>
// </div>
// <div class="form-group">
// <label for="inputStatus">Status</label>
// <select id="inputStatus" class="form-control custom-select">
// <option selected="" disabled="">Select one</option>
// <option>On Hold</option>
// <option>Canceled</option>
// <option>Success</option>
// </select>
// </div>
// <div class="form-group">
// <label for="inputClientCompany">Client Company</label>
// <input type="text" id="inputClientCompany" class="form-control">
// </div>
// <div class="form-group">
// <label for="inputProjectLeader">Project Leader</label>
// <input type="text" id="inputProjectLeader" class="form-control">
// </div>
// </div>

// </div>
