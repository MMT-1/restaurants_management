<?php
  
namespace App\Http\Controllers\admin;
   
use DataTables;
use App\Models\owner\Restaurant;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use App\Models\owner\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\admin\OwnerValidate;
use App\Http\Requests\admin\OwnerUpdateValidation;
  
class OwnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    } 

    //import trait
    use CommonTrait;
 
    public function index(Request $request)
    {
        $list = Owner::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                  //for image
                  ->addColumn('image', function($row){
                    $src=asset('owner/profile/'.$row->image);
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
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit owner" href="'.route('owners.edit',$row->id).'"> <i class="fa fa-edit"></i>Edit Profile</a>';
                     return $btn;
                   })
                   ->rawColumns(['image','status','action'])
                   ->make(true);
              }
            return view('admin.owner.index');
     }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $country = $this->activeCountry();

      return view('admin.owner.create',compact('country'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnerValidate $request)
    {

            // owner profile information

            //check if file is upload
            $image_name='';
            if($request->hasFile('image')){
              $image_name = time().'.'.$request->image->getClientOriginalExtension();
              $request->image->move(('owner/profile/'), $image_name);
            } 

            $store = new Owner;  

            $store->first_name=$request->first_name;

            $store->last_name=$request->last_name;

            $store->email=$request->email;
      
            $store->password= Hash::make($request->password);

            $store->mobile=$request->mobile;

            $store->image=$image_name;
          

            

            $store->address=$request->address;

            $store->country_id=0;

            $store->role=2;

            $store->city=$request->city;

            $store->zip_code=$request->zip_code;

            $store->gender=$request->gender;

            $store->created_by=auth()->user()->id;

            $store->status=$request->status;
        
            $store->save();

            //Owner Restaurant information

            //check if file is upload
             $logo_name='';
              if($request->hasFile('image')){
                  $logo_name = time().'.'.$request->logo->getClientOriginalExtension();
                  $request->logo->move(('owner/restaurant/'), $logo_name);
             } 

            $restaurant = new Restaurant;

            $restaurant->restaurant_name=$request->restaurant_name;

            $restaurant->logo=$logo_name;

            $restaurant->restaurant_slug=Str::slug($request->restaurant_name);

            $restaurant->restaurant_address=$request->location;
            
            $restaurant->latitude=$request->latitude;

            $restaurant->longitude=$request->longitude;

            $restaurant->owner_id=$store->id;

            $restaurant->created_by=auth()->user()->id;

            $restaurant->status=$request->restaurant_status;

            $restaurant->save();

            return redirect()->route('owners.index')
            ->with('success','owner created successfully.');
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
       $country = $this->activeCountry();

       return view('admin.owner.edit',compact('owner','country'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(OwnerUpdateValidation $request,Owner $owner)
    {

              //check if file is upload
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

              $owner->country_id=0;

              $owner->role=2;

              $owner->city=$request->city;

              $owner->zip_code=$request->zip_code;

              $owner->gender=$request->gender;

              $owner->created_by=auth()->user()->id;

              $owner->status=$request->status;
          
              $owner->save();

              //owner restaurant information
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

              $restaurant->latitude=$request->latitude;
              $restaurant->longitude=$request->longitude;

              $restaurant->restaurant_slug=Str::slug($request->restaurant_name);

              $restaurant->restaurant_address=$request->location;

              $restaurant->owner_id=$owner->id;
              

              $restaurant->created_by=auth()->user()->id;

              $restaurant->status=$request->restaurant_status;

              $restaurant->save();

              return redirect()->route('owners.index')
              ->with('success','owner updated successfully.');

    }


}