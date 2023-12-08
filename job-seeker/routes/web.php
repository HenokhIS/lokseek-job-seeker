<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['is_admin'], 'as' => 'admin', 'prefix' => 'admin'], function() {
    Route::get('dashboard',[\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class);
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
    Route::resource('jobs', \App\Http\Controllers\Admin\JobController::class);
});

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

Route::get('detail/{job:slug}', [\App\Http\Controllers\DetailController::class, 'detail'])->name('detail');
Route::get('create-loker', [\App\Http\Controllers\JobController::class, 'create'])->name('job.create');
Route::post('create-loker', [\App\Http\Controllers\JobController::class, 'store'])->name('job.store');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
