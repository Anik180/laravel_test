<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/admin/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('admin.logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::Resource('/user', App\Http\Controllers\UserController::class);
Route::Resource('/category', App\Http\Controllers\CategoryController::class);
Route::Resource('/size', App\Http\Controllers\SizeController::class);
Route::Resource('/color', App\Http\Controllers\ColorController::class);
Route::Resource('/product', App\Http\Controllers\ProductController::class);
