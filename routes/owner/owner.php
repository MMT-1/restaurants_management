<?php 

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Owner\FoodController;
use App\Http\Controllers\Owner\ProfileController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\RestaurantFoodController;
use App\Http\Controllers\Owner\ReservationsController;

//registration route start
  Route::get('owner/registration', [AccountController::class, 'ownerRegister'])->name('owner.registration');
  Route::post('owner/registration', [AccountController::class,'ownerRegisterProcess'])->name('owner.registration.process');
//registration route end

//login route start
  Route::get('/login/owner', [LoginController::class, 'showOwnerLoginForm'])->name('owner.login');
  Route::post('/login/owner', [LoginController::class,'ownerLogin'])->name('owner.login.process');
//login route end


//dashboard route start
  Route::get('owner/dashboard', [DashboardController::class,'index'])->name('owner.dashboard');
  Route::get('owner/ownerProfile', [ProfileController::class,'profile'])->name('owner.ownerProfile');
  
  Route::post('owner/ownerProfile/update', [ProfileController::class,'update'])->name('owner.ownerProfile.update');

  // Route::post('/reservation', [ReservationController::class, 'reservation']);
  Route::get('owner/reservations', [ReservationsController::class, 'reservations']);;


  // Route::get('owner/updateprofile', [ProfileController::class,'update'])->name('owner.updateprofile');
  // Route::post('owner/profile', [ProfileController::class,'update'])->name('owner.update-profile');
  // Route::get('owner/profile', [DashboardController::class,'index'])->name('owner.profile');
//dashboard route end


Route::get('restaurant/foods',[RestaurantFoodController::class,'index'])->name('restaurant.foods');
Route::post('restaurant/foods',[RestaurantFoodController::class,'store'])->name('restaurant.foods');
Route::get('restaurant/foods/create',[RestaurantFoodController::class,'create'])->name('restaurant.foods.create');
// Route::get('att/value/{id}',[foodController::class,'attributeValue'])->name('att.values');



Route::get('foods/{food}/edit', [RestaurantFoodController::class, 'edit'])->name('restaurant.foods.edit');
Route::put('foods/{food}', [RestaurantFoodController::class, 'update'])->name('restaurant.foods.update');