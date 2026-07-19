<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\ComparisonController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Countries
    |--------------------------------------------------------------------------
    */

    Route::get('/countries', [CountryController::class,'index'])
    ->name('countries.index');

    Route::get('/countries/{country}', [CountryController::class, 'show'])
        ->name('countries.show');

    Route::get('/countries/search', [CountryController::class, 'search'])
        ->name('countries.search');

    /*
    |--------------------------------------------------------------------------
    | Monitoring
    |--------------------------------------------------------------------------
    */

    Route::get('/monitoring', [MonitoringController::class, 'index'])
        ->name('monitoring.index');

    Route::get('/monitoring/{shipment}', [MonitoringController::class, 'show'])
    ->name('monitoring.show');

    /*
    |--------------------------------------------------------------------------
    | Comparison
    |--------------------------------------------------------------------------
    */

    Route::get('/comparison', [ComparisonController::class, 'index'])
        ->name('comparison.index');

    Route::post('/comparison', [ComparisonController::class, 'compare'])
        ->name('comparison.compare');

    /*
    |--------------------------------------------------------------------------
    | Favorites
    |--------------------------------------------------------------------------
    */

    Route::get('/favorites', [FavoriteController::class, 'index'])
        ->name('favorites.index');

    Route::post('/favorites', [FavoriteController::class, 'store'])
        ->name('favorites.store');

    Route::delete('/favorites/{favorite}', [FavoriteController::class, 'destroy'])
        ->name('favorites.destroy');

    /*
    |--------------------------------------------------------------------------
    | Ports
    |--------------------------------------------------------------------------
    */

    Route::get('/ports', [PortController::class, 'index'])
        ->name('ports.index');

    /*
    |--------------------------------------------------------------------------
    | Admin
    |--------------------------------------------------------------------------
    */

    Route::get('/admin', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});

require __DIR__.'/auth.php';