<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/get-all-product',[ProductController::class,'getProduct']);
Route::post('/create-new-product',[ProductController::class,'createProduct']);