<?php 

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\vendor\ProductController;
use App\Http\Controllers\vendor\ProfileController;
use App\Http\Controllers\vendor\DashboardController;
use App\Http\Controllers\vendor\ShopProductController;
use App\Http\Controllers\vendor\ReservationsController;

//registration route start
  Route::get('vendor/registration', [AccountController::class, 'vendorRegister'])->name('vendor.registration');
  Route::post('vendor/registration', [AccountController::class,'vendorRegisterProcess'])->name('vendor.registration.process');
//registration route end

//login route start
  Route::get('/login/vendor', [LoginController::class, 'showVendorLoginForm'])->name('vendor.login');
  Route::post('/login/vendor', [LoginController::class,'vendorLogin'])->name('vendor.login.process');
//login route end


//dashboard route start
  Route::get('vendor/dashboard', [DashboardController::class,'index'])->name('vendor.dashboard');
  Route::get('vendor/vendorProfile', [ProfileController::class,'profile'])->name('vendor.vendorProfile');
  
  Route::post('vendor/vendorProfile/update', [ProfileController::class,'update'])->name('vendor.vendorProfile.update');

  // Route::post('/reservation', [ReservationController::class, 'reservation']);
  Route::get('vendor/reservations', [ReservationsController::class, 'reservations']);;


  // Route::get('vendor/updateprofile', [ProfileController::class,'update'])->name('vendor.updateprofile');
  // Route::post('vendor/profile', [ProfileController::class,'update'])->name('vendor.update-profile');
  // Route::get('vendor/profile', [DashboardController::class,'index'])->name('vendor.profile');
//dashboard route end


Route::get('shop/products',[ShopProductController::class,'index'])->name('shop.products');
Route::post('shop/products',[ShopProductController::class,'store'])->name('shop.products');
Route::get('shop/products/create',[ShopProductController::class,'create'])->name('shop.products.create');
// Route::get('att/value/{id}',[ProductController::class,'attributeValue'])->name('att.values');