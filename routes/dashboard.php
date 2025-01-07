<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => ['auth']
],function(){
    Route::get('/test', [DashboardController::class, 'dashboard']);

    Route::resource('/test/categories', CategoryController::class);
}
);



