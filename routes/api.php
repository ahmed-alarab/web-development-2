<?php

use App\Http\Controllers\clientController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\driverController;
use App\Http\Controllers\productController;
use App\Http\Controllers\orderController;






Route::post('/register',[userController::class,'register']);



Route::get('/AllDrivers', [driverController::class, 'getAllDrivers'])->middleware('auth:sanctum');

Route::post('/request-delivery', [orderController::class, 'requestDelivery'])->middleware('auth:sanctum');

Route::post('/orders', [orderController::class, 'createOrderWithProducts'])->middleware('auth:sanctum');
Route::post('/reviews', [clientController::class, 'createReview'])->middleware('auth:sanctum');
Route::get('/drivers/{id}', [driverController::class, 'getReviews'])->middleware('auth:sanctum');
Route::get('/DriverInbox', [driverController::class, 'getMyInbox'])->middleware('auth:sanctum');





