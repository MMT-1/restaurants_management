<?php

namespace App\Http\Controllers\vendor;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\vendor\Vendor;
use App\Models\vendor\Shop;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\VendorUpdateValidation;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:vendor');
    } 

    
    public function profile(Request $request)
    {
        
        $vendor_id = Auth::guard('vendor')->user()->id;
        $vendor = Vendor::findOrFail($vendor_id);
       return view('vendor.vendorProfile.edit', compact('vendor'));

       
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function update(VendorUpdateValidation $request,Vendor $vendor)
    // {

    //           //check if file is upload
    //           $image_name='';
    //           if($request->hasFile('image')){
    //             $image_name = time().'.'.$request->image->getClientOriginalExtension();
    //             $request->image->move(('vendor/profile/'), $image_name);
    //           }else{
    //             $image_name=$vendor->image;
    //           } 

    //           if($request->password==''){
    //             $pass=$vendor->password;
    //           }else{
    //             $pass=Hash::make($request->password);
    //           }

    //           $vendor->first_name=$request->first_name;

    //           $vendor->last_name=$request->last_name;

    //           $vendor->email=$request->email;

    //           $vendor->password = $pass;

    //           $vendor->mobile=$request->mobile;

    //           $vendor->image=$image_name;

    //           $vendor->address=$request->address;

    //           $vendor->country_id=$request->country_id;

    //           $vendor->role=2;

    //           $vendor->city=$request->city;

    //           $vendor->zip_code=$request->zip_code;

    //           $vendor->gender=$request->gender;

    //           $vendor->created_by=auth()->user()->id;

    //           $vendor->status=$request->status;
          
    //           $vendor->save();

    //           //vendor shop information
    //           $shop=Shop::where('vendor_id',$vendor->id)->first();

    //           //check if file is upload
    //           $logo_name='';
    //            if($request->hasFile('logo')){
    //                     $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
    //                     $request->logo->move(('vendor/shop/'), $logo_name);
    //            }else{
    //              $logo_name= $shop->logo;
    //            } 

    //           $shop->shop_name=$request->shop_name;

    //           $shop->logo=$logo_name;

    //           $shop->shop_slug=Str::slug($request->shop_name);

    //           $shop->shop_address=$request->shop_address;

    //           $shop->vendor_id=$vendor->id;

    //           $shop->created_by=auth()->user()->id;

    //           $shop->status=$request->shop_status;

    //           $shop->save();

    //           return redirect()->route('vendor.vendorProfile')
    //           ->with('success','Vendor updated successfully.');

    // }

    public function update(Request $request)
{
    $vendor = Auth::guard('vendor')->user();
    $image_name='';
    if($request->hasFile('image')){
      $image_name = time().'.'.$request->image->getClientOriginalExtension();
      $request->image->move(('vendor/profile/'), $image_name);
    }else{
      $image_name=$vendor->image;
    } 

    if($request->password==''){
      $pass=$vendor->password;
    }else{
      $pass=Hash::make($request->password);
    }

    $vendor->first_name=$request->first_name;

    $vendor->last_name=$request->last_name;

    $vendor->email=$request->email;

    $vendor->password = $pass;

    $vendor->mobile=$request->mobile;

    $vendor->image=$image_name;

    $vendor->address=$request->address;

    $vendor->country_id=$request->country_id;

    $vendor->role=2;

    $vendor->city=$request->city;

    $vendor->zip_code=$request->zip_code;

    $vendor->gender=$request->gender;

    $vendor->created_by=auth()->user()->id;

    $vendor->status=$request->status;

    $vendor->save();

    //vendor shop information
    $shop=Shop::where('vendor_id',$vendor->id)->first();

    //check if file is upload
    $logo_name='';
     if($request->hasFile('logo')){
              $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
              $request->logo->move(('vendor/shop/'), $logo_name);
     }else{
       $logo_name= $shop->logo;
     } 

    $shop->shop_name=$request->shop_name;

    $shop->logo=$logo_name;

    $shop->shop_slug=Str::slug($request->shop_name);

    $shop->shop_address=$request->shop_address;

    $shop->vendor_id=$vendor->id;

    $shop->created_by=auth()->user()->id;

    $shop->status=$request->shop_status;

    $shop->save();

    return redirect()->route('vendor.dashboard')->with('success', 'Profile updated successfully');
}



}
