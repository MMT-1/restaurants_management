<?php
namespace App\Traits;
use App\Models\customer\FoodCart;
use Auth;

trait CartTrait{

    //this function show total cart item count
    public function cartCount(){
       $data=FoodCart::where('user_id',auth()->user()->id)->count();
       return $data;
    }

    //this function show all cart item
    public function cartItem(){
        $data=FoodCart::where('user_id',auth()->user()->id)->orderBy('id','DESC')->with('food','attributeType','attributeValue')->get();
        return $data;
    }

    //this function show cart subtotal 
    public function cartSubTotal(){
        $data=FoodCart::where('user_id',auth()->user()->id)->sum('sub_total');
        return $data;
    } 
}