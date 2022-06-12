<?php

use App\Http\Controllers\AboutContoller;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;
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

Route::get('/', function () {
    return view('front.index');
});


Route::get('/dashboard', function () {
    return view('layouts.app');
});
// Route::get('/create', function () {
//     return view('createcategory');
// });
Route::resource('meals', MealController::class);
Route::resource('category', CategoryController::class);
Route::resource('order', OrderController::class);
Route::resource('user', UserController::class);


Route::resource('book',BookController::class);



Route::get('/menu', function () {
    return view('front.menu');
});

Route::resource('front',FrontController::class);
Route::resource('menu',MenuController::class);
Route::resource('about',AboutContoller::class);


