<?php

namespace App\Http\Controllers\owner;

use App\Models\owner\Food;
use Illuminate\Http\Request;
use App\Models\owner\Restaurant;
use App\Models\owner\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }
    
    //vendor dashboard
    public function index(){

        $owner = Auth::guard('owner')->user();

    $restaurant=Restaurant::where('owner_id',$owner->id)->first();


   

       $reservationCount = Reservation::where("restaurant_id", $restaurant->id)->count();
       

       $foodCount = Food::where('owner_id', $owner->id)->count();


        return view('owner.dashboard',compact('reservationCount','foodCount'));
    }
    
}
