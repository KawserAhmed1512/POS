<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\OrderEntryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\OrderlistController;

use Illuminate\Support\Facades\Route;



//Admin Controller Panel

//Route::group(['prefix' => 'admin'], function() {


//log in
Route::get('/Login',[LoginController::class,'login'])->name('login');
Route::get('/wel-Login',[LoginController::class,'wel'])->name('wel');
Route::get('/signup',[LoginController::class,'signup'])->name('signup');

Route::post('/do-login',[LoginController::class,'doLogin'])->name('do.login');

//signout

Route::get('/logout',[LoginController::class,'logout'])->name('logout');




Route::group(['middleware'=>'auth'],function(){

Route::get('/',[HomeController::class,'home'])->name('dashboard');
Route::get('/master',[MasterController::class,'master']);



//order entry
Route::get('/order-entry',[OrderEntryController::class,'orderentry'])->name('order.entry');
Route::post('/order-place',[OrderEntryController::class,'placeOrder'])->name('order.place');
Route::get('/View-cart',[OrderentryController::class,'viewcart'])->name('View-cart');
Route::get('/Clear-cart',[OrderentryController::class,'clearCart'])->name('Cart.clear');
Route::get('/Add-to-cart/{productlist}',[OrderentryController::class,'addToCart'])->name('Add.to.cart');
Route::get('/Show-product/{productlist}',[OrderentryController::class,'showProduct'])->name('Show.product');
Route::get('/invoice/{id}',[OrderEntryController::class,'viewInvoice'])->name('invoice');

//Customer

Route::get('/customer',[CustomerController::class,'list'])->name('customer');

Route::post('/customer-store',[CustomerController::class,'store'])->name('customer.store');
Route::get('/order-cancel/{order_id}',[CustomerController::class,'cancelOrder'])->name('cancel.order');



//Category

Route::get('/category',[CategoryController::class,'list'])->name('category');
Route::get('/category-form',[CategoryController::class,'form'])->name('category.form');
Route::post('/category-store',[CategoryController::class,'store'])->name('category.store');



//Business Setting

Route::get('/business-setting',[BusinessController::class,'list']);

//Admin Panel

Route::get('/admin',[AdminController::class,'form']);


//product-info
Route::get('/product-list',[ProductController::class,'list'])->name('product.list');

Route::get('/product-create',[ProductController::class,'create'])->name('product.create');
Route::post('/product-store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/delete/{p_id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/edit/{p_id}',[ProductController::class,'edit'])->name('product.edit');
Route::post('/product/update/{p_id}',[ProductController::class,'update'])->name('product.update');


//stock

Route::get('/Stock',[StockController::class,'stock'])->name('Stock');



//report


Route::get('/report',[OrderEntryController::class,'Reportlist'])->name('report');

//Sales-executive

Route::get('/sales-executive',[SalesController::class,'list']);



//payment

Route::get('/payment',[PaymentController::class,'list']);

//Retunr Product

Route::get('/return-product',[ReturnController::class,'list'])->name('return.list');
Route::get('/return-form',[ReturnController::class,'form'])->name('return.form');
Route::post('return-store',[ReturnController::class,'store'])->name('return.store');


//Sale







});

//});


