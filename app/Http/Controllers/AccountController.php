<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\owner\Owner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\owner\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\admin\OwnerValidate;
use App\Http\Requests\customer\CustomerValidate;


class AccountController extends Controller
{

    //customer registration
    public function customerRegister(){
      return view('auth.register');
    }

    //customer registration process
    public function customerRegisterProcess(CustomerValidate $request){

            //customer information 
            $customer = new User;

            $customer->first_name=$request->first_name;

            $customer->last_name=$request->last_name;

            $customer->email=$request->email;
      
            $customer->password= Hash::make($request->password);

            $customer->mobile=$request->mobile;

            $customer->role=3;

            $customer->created_by=0;

            $customer->status=1;
        
            $customer->save();
            
 
            return Redirect::route('customer.login')->with('success', 'Registration has been completed successfully. Please log in.');
          }

    //owner registration
    public function ownerRegister(){
      return view('owner.auth.register');
    }

    //owner registration process
    public function ownerRegisterProcess(OwnerValidate $request){
      
            // Owner profile information
            $store = new Owner;  

            $store->first_name=$request->first_name;

            $store->last_name=$request->last_name;

            $store->email=$request->email;
      
            $store->password= Hash::make($request->password);

            $store->mobile=$request->mobile;

            $store->role=2;

            $store->created_by=0;

            $store->status=0;
        
            $store->save();

            //Owner Restaurant information 
            $restaurant = new Restaurant;

            $restaurant->restaurant_name=$request->restaurant_name;

            $restaurant->restaurant_slug=Str::slug($request->restaurant_name);

            $restaurant->owner_id=$store->id;

            $restaurant->created_by=0;

            $restaurant->status=0;

            $restaurant->save();

            return redirect()->route('owner.registration')
            ->with('success','Registration has completed successfully.Please wait for admin approval');
    }













    

}
