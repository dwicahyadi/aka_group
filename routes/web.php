<?php

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect('/home');
    });

    Route::resource('user',\App\Http\Controllers\UserController::class);
    Route::resource('driver',\App\Http\Controllers\DriverController::class);
    Route::resource('tax_officer',\App\Http\Controllers\TaxOfficerController::class);
    Route::resource('vehicle',\App\Http\Controllers\VehicleController::class);
    Route::resource('service',\App\Http\Controllers\ServiceController::class);
    Route::resource('tax',\App\Http\Controllers\TaxController::class);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

    Route::get('reminder/service/{service}', [\App\Http\Controllers\ManualReminderController::class,'service'])->name('reminder.service');
    Route::get('reminder/tax/{tax}', [\App\Http\Controllers\ManualReminderController::class,'tax'])->name('reminder.tax');

    Route::get('report/services', [\App\Http\Controllers\ReportController::class,'service'])->name('report.services');
    Route::get('report/upcoming_services', [\App\Http\Controllers\ReportController::class,'upcomingService'])->name('report.upcoming-services');
    Route::get('report/tax', [\App\Http\Controllers\ReportController::class,'tax'])->name('report.taxes');
    Route::get('report/upcoming_tax', [\App\Http\Controllers\ReportController::class,'upcomingTax'])->name('report.upcoming-taxes');


});
