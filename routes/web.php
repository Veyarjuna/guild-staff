<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\UserController;
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

Route::resource('/', DashboardController::class);

Route::resource('/users',UserController::class);
Route::resource('/ranks',RankController::class);
Route::resource('/menus', MenuController::class);

// Page Not Found 404
Route::fallback(function(){
    return view('404');
});