<?php

use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\RentedController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);    

Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::post('refresh', [AuthController::class, 'refresh']);
    
    Route::get('me', [AuthController::class, 'me']);

    Route::apiResource('home', HomeController::class)->middleware('home.verification'); // inventory
    Route::apiResource('rented', RentedController::class)->middleware('rented.verification'); // rented_equipments
    

    Route::post('logout', [AuthController::class, 'logout']);    
});
