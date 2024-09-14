<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/Registration',[UserController::class,'UserRegistration']);
Route::post('/Login',[UserController::class,'UserLogin']);

Route::get('/Categorylist',[CategoryController::class,'CategoryList']);
Route::get('/Brandlist',[BrandController::class,'BrandList']);

Route::get('/Productlist',[ProductController::class,'ProductList']);
Route::get('/Productbycategory/{id}',[ProductController::class,'ProductByCategory']);
Route::get('/Productbybrand/{id}',[ProductController::class,'ProductByBrand']);