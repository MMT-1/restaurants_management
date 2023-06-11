<?php

namespace App\Http\Controllers\admin;
use DataTables;

use App\Models\User;
use App\Traits\CommonTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    //import trait
    use CommonTrait;
         
    public function index(Request $request)
    {
        $list = User::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                  //for image
                  ->addColumn('image', function($row){
                    $src=asset('customer/profile/'.$row->image);
                    return '<img src="'.$src.'" border="0" width="40" class="img-rounded" align="center" />';
                   })

                  // for status  
                  ->addColumn('status', function($row){
                    if($row->status==1){
                       $status='Active';
                     }else{
                        $status='Inactive';
                     }    
                      return $status;
                    })

                  //for action column
                  ->addColumn('action', function($row){
                     $btn = '<a class="btn btn-primary btn-sm marginaction" title="Edit customer" href="'.route('customer.edit',$row->id).'"> <i class="fa fa-edit"></i>Edit Profile</a><a class="btn btn-secondary ms-2 btn-sm" title="delete customer" href="'.route('customer.delete',$row->id).'"> <i class="fa fa-trash"></i>Edit Profile</a>';
                     return $btn;
                   })
                   ->rawColumns(['image','status','action'])
                   ->make(true);
              }
            return view('admin.customer.index');
     }










     public function create()
     {
 
 
       return view('admin.customer.create');
     }
    
     public function store(Request $request)
     {
 
             // owner profile information
 
             //check if file is upload
             $image_name='';
             if($request->hasFile('image')){
               $image_name = time().'.'.$request->image->getClientOriginalExtension();
               $request->image->move(('customer/profile/'), $image_name);
             } 
 
             $store = new User;  
 
             $store->first_name=$request->first_name;
 
             $store->last_name=$request->last_name;
 
             $store->email=$request->email;
       
             $store->password= Hash::make($request->password);
 
             $store->mobile=$request->mobile;
 
             $store->image=$image_name;
           
 
             
 
             $store->address=$request->address;
 
             $store->country_id=0;
 
             $store->role=3;
 
 
             $store->zip_code=$request->zip_code;
 
             $store->gender=$request->gender;
 
             $store->created_by=auth()->user()->id;
 
             $store->status=$request->status;
         
             $store->save();
 
             //Owner Restaurant information
 
           
 
             return redirect()->route('customers.index')
             ->with('success','customer created successfully.');
     }
      
   
    




     public function edit(User $customer)
     {
 
        return view('admin.customer.edit',compact('customer'));
     }



public function delete(Request $request, User $customer)
{
    // Perform the deletion
    $customer->delete();

    // Redirect back or to any desired page
    return redirect()->back()->with('success', 'Customer deleted successfully');
}


     public function update(Request $request,User $customer)
     {
 
               //check if file is upload
               $image_name='';
               if($request->hasFile('image')){
                 $image_name = time().'.'.$request->image->getClientOriginalExtension();
                 $request->image->move(('customer/profile/'), $image_name);
               }else{
                 $image_name=$customer->image;
               } 
 
               if($request->password==''){
                 $pass=$customer->password;
               }else{
                 $pass=Hash::make($request->password);
               }
 
               $customer->first_name=$request->first_name;
 
               $customer->last_name=$request->last_name;
 
               $customer->email=$request->email;
 
               $customer->password = $pass;
 
               $customer->mobile=$request->mobile;
 
               $customer->image=$image_name;
 
               
               $customer->address=$request->address;
 
               $customer->country_id=0;
 
               $customer->role=3;
 
 
               $customer->zip_code=$request->zip_code;
 
               $customer->gender=$request->gender;
 
               $customer->created_by=auth()->user()->id;
 
               $customer->status=$request->status;
           
               $customer->save();
 
               
               return redirect()->route('customers.index')
               ->with('success','customer updated successfully.');
 
     }
 




     
}
