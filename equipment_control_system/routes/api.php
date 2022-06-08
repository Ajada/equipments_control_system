<?php

use App\Http\Controllers\Application\HomeController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);    

Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    
    Route::get('me', [AuthController::class, 'me']);

    Route::apiResource('home', HomeController::class)->middleware('home.verification');
    

    Route::post('logout', [AuthController::class, 'logout']);    
});
