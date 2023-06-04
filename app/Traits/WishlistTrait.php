<?php

namespace App\Traits;
use App\Models\customer\FoodWishlist;
use Auth;

trait WishlistTrait {

    //this function show all count of wishlist
    public function wishListCount(){
      $data=FoodWishlist::where('user_id',auth()->user()->id)->count();
      return $data;
    } 

    //this function show all wishlist item
    public function wishListItem(){
      $data=FoodWishlist::where('user_id',auth()->user()->id)->with('food')->get();
      return $data;
    }
}