<?php

use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarModelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/brands', [CarBrandController::class, 'index'])
    ->name('brandss.index');

Route::get('/models', [CarModelController::class, 'index'])
    ->name('models.index');

Route::apiResources([
    'cars' => CarController::class,
]);
