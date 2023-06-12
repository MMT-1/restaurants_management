<?php

namespace App\Http\Controllers\owner;

use DataTables;
use App\Models\owner\Food;
use App\Models\owner\Restaurant;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\owner\FoodCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\owner\FoodAttribute;
use App\Http\Requests\admin\FoodValidate;

class RestaurantFoodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }

    use CommonTrait;

  public function index(Request $request)
{
    if ($request->ajax()) {
        $owner = Auth::guard('owner')->user();
        $restaurant = $owner->restaurant;

        $list = Food::where('owner_id', $owner->id)->orderBy('id', 'DESC')->get();

        return Datatables::of($list)
            ->addIndexColumn()
            ->addColumn('image', function ($row) {
                $src = asset('owner/food/' . $row->image);
                return '<img src="' . $src . '" border="0" width="40" class="img-rounded" align="center" />';
            })
            ->addColumn('status', function ($row) {
                if ($row->status == 1) {
                    $status = 'Active';
                } else {
                    $status = 'Inactive';
                }
                return $status;
            })
            ->addColumn('action', function ($row) {
                $btn = '<a class="btn btn-primary btn-sm" title="Edit food" href="' . route('restaurant.foods.edit', $row->id) . '"> <i class="fa fa-edit"></i></a> <a class="btn btn-secondary btn-sm" title="Delete food" href="' . route('restaurant.foods.delete', $row->id) . '"> <i class="fa fa-trash"></i></a>';
                return $btn;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->make(true);
    }

    $owner = Auth::guard('owner')->user();
    $restaurant = $owner->restaurant;
    $foods = Food::where('owner_id', $owner->id)->orderBy('id', 'DESC')->get();

    return view('owner.food.index', compact('foods'));
}

    
   

public function ActiveRestaurant()
{
    $owner = Auth::guard('owner')->user();
    $restaurants = Restaurant::where('owner_id', $owner->id)->where('status', 1)->get();
    return $restaurants;
}


public function create()
{
    $attributeType = $this->activeType();
    $restaurants = $this->ActiveRestaurant();
    $category = $this->allParentCategory();
    return view('owner.food.create', compact('attributeType', 'restaurants', 'category'));
}




public function store(FoodValidate $request)
{
    // Check if file is uploaded
    $image_name = '';
    if ($request->hasFile('image')) {
        $image_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(('owner/food/'), $image_name);
    }

    // Get the owner
    $owner = Auth::guard('owner')->user();

    // Create the food
    $food = new Food;
    $food->food_name = $request->food_name;
    $food->food_slug = Str::slug($request->food_name);
    $food->quantity = $request->quantity;
    $food->alert_quantity = $request->alert_quantity;
    $food->regular_price = $request->regular_price;
    $food->sale_price = $request->sale_price;
    $food->cost_price = $request->cost_price;
    $food->image = $image_name;
    $food->is_featured = $request->is_featured;
    $food->stock_status = $request->stock_status;
    $food->owner_id = $owner->id;
    $food->restaurant_id = $request->restaurant_id;
    $food->short_description = $request->short_description;
    $food->long_description = $request->long_description;
    $food->tag = $request->tag;
    $food->save();


    return redirect()->route('restaurant.foods')->with('success', 'food has been successfully stored');
}




public function allActiveRestaurantByOwner($ownerId)
{
    return Restaurant::where('owner_id', $ownerId)->get();
}

public function edit($id)
{
  $ownerId = auth()->user()->id;
  $food = Food::where('owner_id', $ownerId)->findOrFail($id);    
  $attributeType = $this->activeType();
  $restaurant = $this->allActiveRestaurantByOwner(auth()->user()->id); // Get Restaurants belonging to the authenticated Owner
  $category = $this->allParentCategory();

    return view('owner.food.edit', compact('food', 'attributeType', 'restaurant', 'category'));
}



public function delete($id)
{
  $ownerId = auth()->user()->id;
  $food = Food::where('owner_id', $ownerId)->findOrFail($id);    
  $food->delete();

    return redirect()->back()->with('success', 'Food deleted successfully');
}



public function update(Request $request, $id)
{
    // Find the food to be updated
    $ownerId = auth()->user()->id;
    $food = Food::where('owner_id', $ownerId)->findOrFail($id);   
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

    return redirect()->route('restaurant.foods')->with('success', 'food has been successfully updated.');
}



}



