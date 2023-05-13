<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Blog;
use App\Models\vendor\Shop;
use App\Traits\CommonTrait;
use App\Models\admin\Slider;
use Illuminate\Http\Request;
use App\Models\vendor\Product;
use App\Models\vendor\ProductBrand;
use App\Http\Controllers\Controller;
use App\Models\vendor\Reservation;

use Illuminate\Support\Facades\Auth;
use App\Models\vendor\ProductCategory;

class FrontController extends Controller
{
    //import trait
     use CommonTrait;

    //home page method
    public function index(){
        $shop=$this->activeShop();
        $brand=$this->activeBrand();
        $slider=Slider::where('status',1)->orderBy('id','DESC')->get();
        $featured=Product::where(['status'=>1,'is_featured'=>1])->orderBy('id','DESC')->get();
        $blog=Blog::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        return view('front.index',compact('shop','brand','slider','featured','blog'));
    } 

    //contact method view
    public function contact(){
      return view('front.page.contact');
    } 

    //shop single method
    public function shopSingle($id){
     $shop=Shop::findOrFail($id);
     return view('front.shop.shopDetails',compact('shop'));
    }

    //product single method
    public function productSingle($id){
        $product=Product::findOrFail($id);
        $attributeType=$product->productAttributeType($id);
        return view('front.product.productDetails',compact('product','attributeType'));
    }

    //product search
    public function search(Request $request){
      if($request->cat_id==''){
        $products=Product::where('status',1)
        ->where('product_name', 'like', '%'.$request->search.'%')
        ->select('products.id','products.product_name','products.image','products.product_slug')
        ->get();
      }else{
        $products=ProductCategory::
         where('category_id',$request->cat_id)
        ->leftjoin('products','products.id','=','product_categories.product_id')
        ->select('products.id','products.product_name','products.image','products.product_slug')
        ->get();
      }
      return view('front.product.search',compact('products'));
    }

    //category product method
    public function categoryProduct($id){
      $category=ProductCategory::where(['category_id'=>$id,'status'=>1])->get();
      return view('front.product.categoryProduct',compact('category'));
    }

    //all active category
    public function allCategory(){
      $category=$this->activeCategory();
      return view('front.category.allCategory',compact('category'));
    }

    //all active shop
    public function allShop(){
      $allShop=$this->allActiveShop();
      return view('front.shop.allShop',compact('allShop'));
    }

    //all active shop
     public function allBrand(){
        $allbrand=$this->allActiveBrand();
        return view('front.brand.allBrand',compact('allbrand'));
     }

    //brand product method
    public function brandProduct($id){
      $brand=Product::where(['brand_id'=>$id,'status'=>1])->get();
      return view('front.product.brandProduct',compact('brand'));
    }
    public function reservation(Request $request)
{
  if (!auth()->check()) {
    return redirect()->route('login')->with('error', 'You need to be logged in to make a reservation.');
}

    
    $reservation = new Reservation;
    $reservation->date = $request->date;
    $reservation->time = $request->time;
    $reservation->guests = $request->guests;

    $reservation->shop_id = $request->shop_id; 
    $reservation->email = $request->email; 
    $reservation->first_name = $request->first_name; 
    $reservation->last_name = $request->last_name; 
    $reservation->mobile = $request->mobile; 
    
    
    $reservation->save(); 
    
    return redirect()->back();
}






public function getNearby(Request $request)
{
    // Get the location entered by the user
    $location = $request->input('location');

    // Use the OpenStreetMap Nominatim API to convert the location to latitude and longitude coordinates
    $geocode_url = "https://nominatim.openstreetmap.org/search?q=" . urlencode($location) . "&format=json&limit=1";
    $geocode_response = file_get_contents($geocode_url);
    $geocode_data = json_decode($geocode_response);

    if (!empty($geocode_data)) {
        $latitude = $geocode_data[0]->lat;
        $longitude = $geocode_data[0]->lon;

        // Use the OpenStreetMap Overpass API to search for nearby restaurants
        $places_url = "https://overpass-api.de/api/interpreter?data=[out:json][timeout:25];node[\"amenity\"=\"restaurant\"](" . $latitude . "," . $longitude . ",1500);out;";
        $places_response = file_get_contents($places_url);
        $places_data = json_decode($places_response);

        // Render the results in a view
        return view('restaurants.nearby', [
            'location' => $location,
            'restaurants' => $places_data->elements
        ]);
    } else {
        // Render an error message in the same view
        return view('home')->with('error', 'Could not find location.');
    }
}


}
