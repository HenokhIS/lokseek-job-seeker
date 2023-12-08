<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('categories', [\App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('locations', [\App\Http\Controllers\Api\LocationController::class, 'index']);
Route::get('jobs', [\App\Http\Controllers\Api\JobController::class, 'index']);
Route::post('jobs', [\App\Http\Controllers\Api\JobController::class, 'search']);
Route::get('jobs/location/{location:id}', [\App\Http\Controllers\Api\JobController::class, 'getJobByLocation']);
Route::get('jobs/category/{category:id}', [\App\Http\Controllers\Api\JobController::class, 'getJobByCategory']);