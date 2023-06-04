<?php

namespace App\Http\Controllers\owner;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\owner\Owner;
use App\Models\owner\Restaurant;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\OwnerUpdateValidation;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    } 

    
    public function profile(Request $request)
    {
        
        $owner_id = Auth::guard('owner')->user()->id;
        $owner = Owner::findOrFail($owner_id);
       return view('owner.ownerProfile.edit', compact('owner'));

       
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request)
{
    $owner = Auth::guard('owner')->user();
    $image_name='';
    if($request->hasFile('image')){
      $image_name = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(('owner/profile/'), $image_name);
    }else{
      $image_name=$owner->image;
    } 

    if($request->password==''){
      $pass=$owner->password;
    }else{
      $pass=Hash::make($request->password);
    }

    $owner->first_name=$request->first_name;

    $owner->last_name=$request->last_name;

    $owner->email=$request->email;

    $owner->password = $pass;

    $owner->mobile=$request->mobile;

    $owner->image=$image_name;

    $owner->address=$request->address;

    $owner->country_id=$request->country_id;

    $owner->role=2;

    $owner->city=$request->city;

    $owner->zip_code=$request->zip_code;

    $owner->gender=$request->gender;

    $owner->created_by=auth()->user()->id;

    $owner->status=$request->status;

    $owner->save();

    //owner Restaurant information
    $restaurant=Restaurant::where('owner_id',$owner->id)->first();

    //check if file is upload
    $logo_name='';
     if($request->hasFile('logo')){
              $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
              $request->logo->move(('owner/restaurant/'), $logo_name);
     }else{
       $logo_name= $restaurant->logo;
     } 

    $restaurant->restaurant_name=$request->restaurant_name;

    $restaurant->logo=$logo_name;

    $restaurant->restaurant_slug=Str::slug($request->restaurant_name);

    $restaurant->restaurant_address=$request->location;

    $restaurant->latitude=$request->latitude;

    $restaurant->longitude=$request->longitude;

    $restaurant->owner_id=$owner->id;
    $restaurant->created_by=auth()->user()->id;

    $restaurant->status=$request->restaurant_status;

    $restaurant->save();

    return redirect()->route('owner.dashboard')->with('success', 'Profile updated successfully');
}



}
