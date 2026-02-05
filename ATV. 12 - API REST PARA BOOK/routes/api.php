<?php

use App\Http\Controllers\BookAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('book',BookAPIController::class);



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
