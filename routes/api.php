<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/members', function (Request $request) {
    return response()->json(['message' => "Success!"]);
});
