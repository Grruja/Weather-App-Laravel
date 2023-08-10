<?php

use App\Http\Controllers\Admin_forecasts;
use App\Http\Controllers\Admin_weather;
use App\Http\Controllers\Forecast;
use App\Http\Controllers\Forecasts;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Weather;
use Illuminate\Support\Facades\Route;

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


Route::get('/home', function () {
    return 'Hello World';
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::view('/', 'welcome');

Route::get('/weather', [Weather::class, 'index'])
    ->name('weather');


Route::get('/forecast/search', [Forecasts::class, 'search'])
    ->name('forecast_search');

Route::get('/forecast/{cities:city}', [Forecast::class, 'index'])
    ->name('forecast_city');


Route::view('admin/weather', 'admin.admin_weather')
    ->name('admin_weather');

Route::post('/admin/weather-update', [Admin_weather::class, 'temp_update'])
    ->name('weather_update');

Route::view('admin/forecasts', 'admin.admin_forecasts')
    ->name('admin_forecasts');

Route::post('/admin/add-forecast', [Admin_forecasts::class, 'add_forecast'])
    ->name('add_forecast');

// ==========

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
