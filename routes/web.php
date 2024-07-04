<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});


// Products routes

Route::resource('products', ProductController::class)->parameters([
    'products' => 'product',
]);

//sales routes

Route::resource('sales', SaleController::class);