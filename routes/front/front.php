<?php 

use App\Http\Controllers\front\FrontController;


//home page route start
  Route::get('/', [FrontController::class,'index'])->name('home.page');
//home page route end

//home page route start
  Route::get('/account', [FrontController::class,'account'])->name('account.page');
//home page route end

//single restaurant route start
  Route::get('/restaurant/{id}/{slug}', [FrontController::class,'restaurantSingle'])->name('restaurant.single');
//single restaurant route end

//all restaurant route start
  Route::get('/restaurant/list', [FrontController::class,'allRestaurant'])->name('restaurant.all');
//all restaurant route end

//single Food route start
  Route::get('/food/{id}/{slug}', [FrontController::class,'foodSingle'])->name('food.single');
//single food route end

//food search route start
  Route::get('/food/search', [FrontController::class,'search'])->name('food.search');
//food search route end

//all category route start
  Route::get('/category', [FrontController::class,'allCategory'])->name('all.category');
//all category route end

//category food route start
  Route::get('/category/food/{id}/{slug}', [FrontController::class,'categoryfood'])->name('category.food');
//category food route end

//contact route start
  Route::get('/contact', [FrontController::class,'contact'])->name('contact.page');
//contact route end

//all restaurant route start
  Route::get('/brand/list', [FrontController::class,'allBrand'])->name('brand.all');
//all restaurant route end

//brand food route start
  Route::get('/brand/food/{id}/{slug}', [FrontController::class,'brandFood'])->name('brand.food');
//brand food route end


Route::post('/reservation', [FrontController::class, 'reservation']);


Route::post('/restaurants/nearby',[FrontController::class, 'getNearbyRestaurants'] )->name('restaurants.nearby');


// Route::post('/restaurants/nearby',[FrontController::class, 'getNearby'] )->name('restaurants.nearby');
