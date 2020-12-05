<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [BlogController::class, 'index']);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/home', [BlogController::class, 'index'])->name('home');
    Route::group(['prefix' => 'blogs'], function () {
        Route::get('/', [BlogController::class, 'myBlogs'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
    });

});

