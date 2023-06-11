<?php

namespace App\Http\Controllers\owner;

use App\Models\owner\Restaurant;
use Illuminate\Http\Request;
use App\Models\owner\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DataTables;

class ReservationsController extends Controller
{
    //
   // ReservationController.php
  
   public function reservations(Request $request)

   {     
    $owner = Auth::guard('owner')->user();

    $restaurant=Restaurant::where('owner_id',$owner->id)->first();
// dd($restaurant->id);


   

       $list = Reservation::where("restaurant_id", $restaurant->id)->orderBy('id','DESC')->get();
       if ($request->ajax()) {
           return Datatables::of($list)
               ->addIndexColumn()
               ->addColumn('action', function($row){
                $btn = '<a class="btn btn-primary btn-sm" title="delete owner" href="'.route('reservation.delete',$row->id).'"> <i class="fa fa-trash"></i>delete</a>';
                return $btn;
              })
               
                  ->rawColumns(['action'])
                  ->make(true);
             }
           return view('owner.ownerProfile.reservation');
    }



    public function delete($id)
{
    // Find the reservation by ID
    $reservation = Reservation::find($id);

    // Perform the deletion
    if ($reservation) {
        $reservation->delete();
    }

    return redirect()->route('reservations');
}


   



}
