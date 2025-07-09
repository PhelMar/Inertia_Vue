<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Home')->name('home');

Route::resource('/products', ProductController::class);