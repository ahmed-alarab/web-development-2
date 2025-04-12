<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('admin',\App\Http\Controllers\adminController::class);
Route::patch('admin/{id}/update2', [\App\Http\Controllers\adminController::class, 'update2'])->name('admin.update2');
Route::get('adminn/listOrders', [\App\Http\Controllers\adminController::class, 'listOrders']);
