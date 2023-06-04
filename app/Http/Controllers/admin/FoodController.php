<?php

namespace App\Http\Controllers\admin;

use DataTables;
use App\Models\owner\Food;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\owner\Restaurant;
use App\Models\owner\FoodCategory;

use App\Http\Controllers\Controller;

use App\Models\admin\AttributeValue;
use App\Models\owner\FoodAttribute;

use App\Http\Requests\admin\ProductValidate;

class FoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

     use CommonTrait;  
   
    public function index(Request $request)
    {
        $list = Food::orderBy('id','DESC')->get();
        if ($request->ajax()) {
            return Datatables::of($list)
                ->addIndexColumn()

                 //for image
                 ->addColumn('image', function($row){
                    $src=asset('owner/food/'.$row->image);
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
                     $btn = '<a class="btn btn-primary btn-sm" title="Edit food" href="'.route('foods.edit',$row->id).'"> <i class="fa fa-edit"></i></a>';
                     return $btn;
                   })

                   ->rawColumns(['image','status','action'])

                   ->make(true);
              }
            return view('admin.food.index');
    }

   
    public function create()
    {
        $attributeType=$this->activeType();
        $restaurant=$this->allActiveRestaurant();
        $brand=$this->activeBrand();
        $category=$this->allParentCategory();
        return view('admin.food.create',compact('attributeType','restaurant','brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoodValidate $request)
    {
         //check if file is upload
         $image_name='';
         if($request->hasFile('image')){
           $image_name = time().'.'.$request->image->getClientOriginalExtension();
           $request->image->move(('owner/food/'), $image_name);
         } 

         //restaurant wise owner
         $owner=Restaurant::where('id',$request->restaurant_id)->first();

        //food information
        $store = new Food;
        $store->food_name=$request->food_name;
        $store->food_slug=Str::slug($request->food_name);
        $store->quantity=$request->quantity;
        $store->alert_quantity=$request->alert_quantity;
        $store->regular_price=$request->regular_price;
        $store->sale_price=$request->sale_price;
        $store->cost_price=$request->cost_price;
        $store->image=$image_name;
        $store->is_featured=$request->is_featured;
        $store->stock_status=$request->stock_status;
        $store->brand_id=$request->brand_id;
        $store->owner_id=$owner->owner_id;
        $store->restaurant_id=$request->restaurant_id;
        $store->short_description=$request->short_description;
        $store->long_description=$request->long_description;
        $store->tag=$request->tag;
        $store->save();

        //category information
        for($i=0;$i<count($request->category_id);$i++){
          $category = new FoodCategory;
          $category->food_id = $store->id;
          $category->category_id = $request->category_id[$i];
          $category->created_by = auth()->user()->id;
          $category->status = 1;
          $category->save();
        }

        //attribute information
        if($request->type_id!=''){
        for($i=0;$i<count($request->type_id);$i++){
          $att_image_name='';
          if($request->hasFile('att_image')){
            $att_image_name = time().'.'.$request->att_image[$i]->getClientOriginalExtension();
            $request->att_image[$i]->move(('owner/food/attribute/'), $att_image_name);
          } 
          $attribute = new FoodAttribute;
          $attribute->food_id = $store->id;
          $attribute->type_id = $request->type_id[$i];
          $attribute->value_id = $request->value_id[$i];
          $attribute->quantity = $request->att_qty[$i];
          $attribute->alert_quantity = $request->att_alert_qty[$i];
          $attribute->regular_price = 0;
          $attribute->sale_price = $request->att_sale_price[$i];
          $attribute->cost_price = 0;
          $attribute->image = $att_image_name;
          $attribute->created_id = 0;
          $attribute->status = 1;
          $attribute->save();
        }
      }



        return redirect()->route('foods.index')->with('success','food has been successfully store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function edit($id)
    {
        $food = Food::find($id);
        $attributeType = $this->activeType();
        $restaurant = $this->allActiveRestaurant();
        $brand = $this->activeBrand();
        $category = $this->allParentCategory();
    
        return view('admin.food.edit', compact('food', 'attributeType', 'restaurant', 'brand', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the food to be updated
        $food = Food::findOrFail($id);
    
        // Update the food fields
        $food->food_name = $request->input('food_name');
        $food->food_slug = Str::slug($request->input('food_name'));
        $food->quantity = $request->input('quantity');
        $food->alert_quantity = $request->input('alert_quantity');
        $food->regular_price = $request->input('regular_price');
        $food->sale_price = $request->input('sale_price');
        $food->cost_price = $request->input('cost_price');
        $food->is_featured = $request->input('is_featured');
        $food->stock_status = $request->input('stock_status');
        $food->brand_id = $request->input('brand_id');
        $food->restaurant_id = $request->input('restaurant_id');
        $food->short_description = $request->input('short_description');
        $food->long_description = $request->input('long_description');
        $food->tag = $request->input('tag');
    
        // Handle image upload if provided
        if ($request->hasFile('image')) {
            // Delete the old image file
            if ($food->image) {
                $oldImagePath = public_path('owner/food/'.$food->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload and save the new image file
            $image_name = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('owner/food/'), $image_name);
            $food->image = $image_name;
        }
    
        // Save the updated food
        $food->save();
    
        // Update the categories for the food
        if ($request->has('category_id')) {
            $categories = [];
            foreach ($request->input('category_id') as $categoryId) {
                $categories[] = new FoodCategory([
                    'category_id' => $categoryId,
                    'created_by' => auth()->user()->id,
                    'status' => 1
                ]);
            }
    
            $food->category()->delete();
            $food->category()->saveMany($categories);
        } else {
            $food->category()->delete();
        }
    
        return redirect()->route('foods.index')->with('success', 'food has been successfully updated.');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

      /**
     * attribute value ajax request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attributeValue($id){
      $data = AttributeValue::where('type_id',$id)->where('status',1)->get();
      return response()->json($data);
    }
}
