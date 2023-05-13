<?php

namespace App\Http\Controllers\vendor;

use App\Models\vendor\Shop;
use Illuminate\Http\Request;
use App\Models\vendor\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    //
   // ReservationController.php
  


   public function reservations(Request $request)
   {
    $vendor_id = Auth::guard('vendor')->user()->id;

    $reservation = Reservation::where('shop_id', $vendor_id)->get();

    return view('vendor.vendorProfile.reservation', compact('reservation'));
   }
   



}
