<?php

use App\Http\Controllers\admin\SystemLogs;
use App\Http\Controllers\admin\FoodController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\OwnerController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\AttributeController;
use App\Http\Controllers\admin\DashboardController;


//login route start
  Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
  Route::post('/login/admin', [LoginController::class,'adminLogin'])->name('admin.login');
//login route end

//dashboard route start
  Route::get('admin/dashboard', [DashboardController::class,'index'])->name('admin.dashboard');
//dashboard route end

//category route start
  Route::resource('categories',CategoryController::class);
  Route::get('categories/delete/{category}',[CategoryController::class,'delete'])->name('categories.delete');
//category route end

//brand route start
  Route::resource('brands',BrandController::class);
//brand route end

//category route start
  Route::resource('countries',CountryController::class);
//category route end

//attribute route start
  Route::resource('attributes',AttributeController::class);
  Route::post('attributes/value/{id}',[AttributeController::class,'attributeValue'])->name('attribute.value');
//attribute route end

//Owner route start
  Route::resource('owners',OwnerController::class);
  Route::get('owners/delete/{owner}',[OwnerController::class,'deleteOwner'])->name('owners.deleteOwner');





  Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('customers/create', [CustomerController::class, 'create'])->name('customers.create');
Route::post('customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
Route::get('customer/{customer}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
Route::put('customer/{customer}', [CustomerController::class, 'update'])->name('customers.update');

//Owner route end

//Food route start
  Route::resource('owner/foods',FoodController::class);
  Route::get('owner/foods/delete/{id}',[FoodController::class,'delete'])->name('foods.delete');
  Route::get('att/value/{id}',[FoodController::class,'attributeValue'])->name('att.values');
//Food route end




Route::get('/activity-logs', [SystemLogs::class,'index'])->name('activity.logs');
Route::post('/activity/clear', [SystemLogs::class, 'clear'])->name('activity.clear');




Route::get('getreservations', [OwnerController::class, 'reservations'])->name('admin.reservations');
  Route::get('/getreservations/delete/{id}', [OwnerController::class, 'delete'])->name('admin.reservation.delete');