<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller
{
    //
    public function index(){
        $user = auth()->user(); // Assuming you're using Laravel's authentication

        return view('customer.profile.customerProfile',compact('user'));
    } 
    
    public function update(Request $request)
    {
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Update the user information
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'address' => $request->input('address'),
            'zip_code' => $request->input('zip_code'),
            'gender' => $request->input('gender'),

        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');            ;
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('customer/profile', $image_name);
    
            // Delete the old image if it exists
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
    
            // Update the image path in the user model
            $user->image =  $image_name;
            $user->save();
        }
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
    
}
