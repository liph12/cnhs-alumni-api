<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIs\MemberController;

Route::prefix('v1')->group(function () {

    Route::apiResource(MemberController::class);
    
});