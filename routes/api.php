<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class);

Route::get('categories/relation', [CategoryController::class, 'relation'])->name('categories.relation');

//masuk resource
