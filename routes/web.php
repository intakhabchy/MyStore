<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
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

Route::get('/Categorylist',[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Brandlist',[BrandController::class,'BrandList'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/Productlist',[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productbycategory/{id}',[ProductController::class,'ProductByCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productbybrand/{id}',[ProductController::class,'ProductByBrand'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productdetailbyid/{id}',[ProductController::class,'ProductDetailById'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productslider',[ProductController::class,'ProductSlider'])->middleware([TokenVerificationMiddleware::class]);

Route::post('/Addtocart',[ProductController::class,'AddProductToCart'])->middleware([TokenVerificationMiddleware::class]);