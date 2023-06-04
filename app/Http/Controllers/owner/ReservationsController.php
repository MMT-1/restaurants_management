<?php

namespace App\Http\Controllers\owner;

use App\Models\owner\Restaurant;
use Illuminate\Http\Request;
use App\Models\owner\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    //
   // ReservationController.php
  


   public function reservations(Request $request)
   {
    $owner_id = Auth::guard('owner')->user()->id;

    $reservation = Reservation::where('restaurant_id', $owner_id)->get();

    return view('owner.ownerProfile.reservation', compact('reservation'));
   }
   



}
