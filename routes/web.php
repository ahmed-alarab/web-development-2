<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\driverController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;

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

Route::get('/order-form', [PageController::class, 'orderFormPage'])->name('order.form');
Route::get('/login', [PageController::class, 'loginPage'])->name('login.page');
Route::get('/drivers', [PageController::class, 'driverListPage'])->name('drivers.page');
Route::get('/drivers/{id}', [PageController::class, 'driverDetailPage'])->name('driver.detail.page');
Route::get('/dashboard', [PageController::class, 'dashboardPage'])->name('dashboard');

