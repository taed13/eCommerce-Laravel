<?php

use App\Http\Controllers\Admin\attributeController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Admin\dashboardController;
use App\Http\Controllers\Admin\HomeBannerController;
use App\Http\Controllers\Admin\profileController;
use App\Http\Controllers\Admin\sizeController;
use App\Http\Controllers\Admin\colorController;
use App\Http\Controllers\Admin\brandController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
  return view('admin/index');
});

// Profile section
Route::get('/profile', [profileController::class, 'index']);
Route::post('/saveProfile', [profileController::class, 'store']);

// Home Banner section
Route::get('/home_banner', [HomeBannerController::class, 'index']);
Route::post('/updateHomeBanner', [HomeBannerController::class, 'store']);

// Manage Sizes
Route::get('/manage_size', [sizeController::class, 'index']);
Route::post('/updatesize', [sizeController::class, 'store']);

// Manage Color 
Route::get('/manage_color', [colorController::class, 'index']);
Route::post('/updatecolor', [colorController::class, 'store']);

// Attribute 
Route::get('/attribute_name', [attributeController::class, 'index_attribute_name']);
Route::post('/update_attribute_name', [attributeController::class, 'store_attribute_name']);

Route::get('/attribute_value', [attributeController::class, 'index_attribute_value']);
Route::post('/update_attribute_value', [attributeController::class, 'store_attribute_value']);

// Category
Route::get('/category', [categoryController::class, 'index']);
Route::post('/update_category', [categoryController::class, 'store']);

// Category Attribute
Route::get('/category_attribute', [categoryController::class, 'index_category_attribute']);
Route::post('/update_category_attribute', [categoryController::class, 'store_category_attribute']);

// Brand
Route::get('/brands', [brandController::class, 'index']);
Route::post('/updateBrand', [brandController::class, 'store']);

// Delete data
Route::get('/deleteData/{id?}/{table?}', [dashboardController::class, 'deleteData']);
