<?php 

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\OrderController;
use App\Http\Controllers\customer\WishlistController;


//login route start
  Route::get('/customer/login', [LoginController::class, 'showCustomerLoginForm'])->name('customer.login');
  Route::post('/customer/login', [LoginController::class,'customerLogin'])->name('customer.login.process');
//login route end

//registration route start
  Route::get('/customer/registration', [AccountController::class, 'customerRegister'])->name('customer.registration');
  Route::post('/customer/registration', [AccountController::class,'customerRegisterProcess'])->name('customer.registration.process');
//registration route end



//wishlist route start
Route::resource('/cart',CartController::class);



Route::get('/customerProfile',[\App\Http\Controllers\customer\AccountController::class,'index'])->name('customerProfile');
Route::put('/customerProfile', [\App\Http\Controllers\customer\AccountController::class, 'update'])->name('customerProfile.update');


Route::post('/cart',[CartController::class, 'store'])->name('cart.store');

Route::get('cart/item/delete/{id}',[CartController::class,'delete'])->name('item.delete');
Route::get('cart/add/{id}',[CartController::class,'addCart'])->name('add.cart');
//wishlist route end

//wishlist route start
Route::get('wishlist/item/delete/{id}',[WishlistController::class,'destroy'])->name('itemwhish.delete');

Route::resource('wishlist',WishlistController::class);
Route::get('add/wishlist/{id}',[WishlistController::class,'addWishlist'])->name('add.wishlist');
//wishlist route end



Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');


Route::post('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
