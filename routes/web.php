<?php

use App\Http\Controllers\Admin\Main\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\Category\IndexController as CategoryIndexController;
use App\Http\Controllers\Main\IndexController;
use Illuminate\Support\Facades\Auth;
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
Route::namespace('App\Http\Controllers\Main')->group(function() {
    Route::get('/', IndexController::class);
});


Route::prefix('admin')->group(function () {
    Route::name('Main')->group(function () {
        Route::get('/', AdminIndexController::class);
    });

    Route::prefix('categories')->name('Category')->group(function () {
        Route::get('/', CategoryIndexController::class);
    }
    );
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
