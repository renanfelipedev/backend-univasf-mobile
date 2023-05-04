<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{AnnouncementController, AuthController, PostController, CalendarController, CalendarEventController, CampusController, DisciplinaController, EventController, HistoricoController, MealController, RestaurantController, TransportController, VinculoController};

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

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('/vinculos', VinculoController::class);
    Route::apiResource('/vinculos/{vinculo}/historico', HistoricoController::class);
});

Route::post('/login', [AuthController::class, 'store'])->name('login');

Route::get('/posts', PostController::class);
Route::get('/events', EventController::class);
Route::get('/calendars', CalendarController::class);
Route::get('/restaurants', RestaurantController::class);
Route::get('/announcements', AnnouncementController::class);
Route::get('/calendar-events', CalendarEventController::class);
Route::get('/restaurants/{restaurant}/meals', MealController::class);

Route::apiResource('/campuses', CampusController::class);
Route::apiResource('/campuses/{campus}/transports', TransportController::class);
