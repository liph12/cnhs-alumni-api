<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\MemberController;
use App\Http\Middleware\APIInterceptor;

Route::prefix('v1')->group(function () {

    Route::apiResource('members', MemberController::class);

})->middleware(APIInterceptor::class);