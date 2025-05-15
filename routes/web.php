<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\reportsController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('admin',\App\Http\Controllers\adminController::class);
Route::patch('admin/{id}/update2', [\App\Http\Controllers\adminController::class, 'update2'])->name('admin.update2');
Route::get('admin2/listOrders', [\App\Http\Controllers\adminController::class, 'listOrders']);

Route::get('admin2/listLoyalties',[\App\Http\Controllers\loyaltyController::class, 'listLoyalties']);


Route::get('/reports', [reportsController::class, 'index'])->name('reports.index');
Route::get('/reports/totalEarnings', [reportsController::class, 'totalEarnings'])->name('total-earnings');
Route::get('/reports/driverPerformance', [reportsController::class, 'driverPerformance'])->name('driver-performance');
Route::get('/reports/clientSpending', [reportsController::class, 'clientSpending'])->name('client-spending');
Route::get('/reports/demandTrends', [reportsController::class, 'demandTrends'])->name('demand-trends');


// routes/api.php
Route::post('/send-otp', [\App\Http\Controllers\otpController::class, 'generateOtp']);
Route::post('/verify-otp', [\App\Http\Controllers\otpController::class, 'verifyOtp']);
Route::resource('user',\App\Http\Controllers\userController::class);
