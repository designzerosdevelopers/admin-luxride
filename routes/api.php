<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\InquiryController;

Route::resource('car', CarController::class);
Route::get('car_type', [CarController::class, 'getCarTypes']);
Route::resource('feature', FeatureController::class);
Route::resource('inquiry', InquiryController::class);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
