<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\MemberController;
use App\Http\Middleware\APIInterceptor;

Route::prefix('v1')->group(function () {

    Route::apiResource('members', MemberController::class)->except('index', 'update');

    Route::post('/login-attempt', [MemberController::class, 'loginAttempt']);

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::get('/authenticate', [MemberController::class, 'authenticate']);

        Route::apiResource('members', MemberController::class)->except('store');
        
    });

})->middleware(APIInterceptor::class);