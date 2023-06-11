<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\owner\Food;
use Illuminate\Http\Request;
use App\Models\owner\Restaurant;
use App\Models\owner\Reservation;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //admin dashboard
    public function index(){
        $userCount = User::count();
        $restaurantcount = Restaurant::count();
        $foodcount = Food::count();
        $reservationcount = Reservation::count();

        return view('admin.dashboard',compact('userCount','restaurantcount','foodcount','reservationcount'));
    }
}
