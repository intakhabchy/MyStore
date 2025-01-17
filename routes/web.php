<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PolicyController;
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

Route::get('/',[HomeController::class,'homePage']);
Route::get('/CategoryProduct',[CategoryController::class,'ProductByCaegoryPage']);
Route::get('/BrandProduct',[BrandController::class,'ProductByBrandPage']);
Route::get('/login-page',[UserController::class,'LoginPage']);

Route::get('/Policy',[PolicyController::class,'Policy']);
Route::get('/PolicyByType/{type}',[PolicyController::class,'PolicyByType']);

Route::get('/detail',[ProductController::class,'ProductDetailPage']);

Route::post('/Registration',[UserController::class,'UserRegistration']);
Route::post('/Login',[UserController::class,'UserLogin']);

Route::get('/Categorylist',[CategoryController::class,'CategoryList']);
Route::get('/Brandlist',[BrandController::class,'BrandList']);

Route::get('/Productlist',[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productbycategory/{id}',[ProductController::class,'ProductByCategory']);
Route::get('/Productbybrand/{id}',[ProductController::class,'ProductByBrand']);
Route::get('/Productdetailbyid/{id}',[ProductController::class,'ProductDetailById']);
Route::get('/Productslider',[ProductController::class,'ProductSlider']);

Route::post('/Addtocart',[ProductController::class,'AddProductToCart'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Cartlist',[ProductController::class,'CartList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Deletecartlist/{product_id}',[ProductController::class,'DeleteCartList'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/Createwishlist/{product_id}',[ProductController::class,'CreateWishList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productwishlist',[ProductController::class,'ProductWishList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Removewishlist/{product_id}',[ProductController::class,'RemoveWishList'])->middleware([TokenVerificationMiddleware::class]);

Route::post('/Createproductreview',[ProductController::class,'CreateProductReview'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Productreview/{product_id}',[ProductController::class,'ProductReviewById']);
Route::get('/ProductByRemark/{remarks}',[ProductController::class,'ProductByRemark']);

Route::get('/InvoiceCreate',[InvoiceController::class,'InvoiceCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/Invoicelist',[InvoiceController::class,'InvoiceList'])->middleware(TokenVerificationMiddleware::class);
Route::get('/Invoiceproductlist/{invoice_id}',[InvoiceController::class,'InvoiceProductList'])->middleware(TokenVerificationMiddleware::class);

Route::post('/PaymentSuccess',[InvoiceController::class,'PaymentSuccess']);
Route::post('/PaymentCancel',[InvoiceController::class,'PaymentCancel']);
Route::post('/PaymentFail',[InvoiceController::class,'PaymentFail']);