<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Blog;
use App\Models\vendor\Shop;
use App\Traits\CommonTrait;
use App\Models\admin\Slider;
use Illuminate\Http\Request;
use App\Models\vendor\Product;
use App\Models\vendor\Reservation;
use Illuminate\Support\Facades\DB;
use App\Models\vendor\ProductBrand;

use App\Http\Controllers\Controller;
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









public function getNearbyShops(Request $request)
{
    $location = $request->input('location');

    // Make a request to Google Maps Geocoding API to obtain the latitude and longitude
    $geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($location) . '&key=AIzaSyA6vplU0Ty7M1OQTJ3yhZBroOJ59i7bMpg';
    $geocodeResponse = json_decode(file_get_contents($geocodeUrl));

    if ($geocodeResponse->status === 'OK') {
        $latitude = $geocodeResponse->results[0]->geometry->location->lat;
        $longitude = $geocodeResponse->results[0]->geometry->location->lng;

        // Retrieve nearby shops based on the latitude and longitude
        $nearbyShops = Shop::select('shops.*', DB::raw('
            ( 6371 * acos( cos( radians(' . $latitude . ') ) *
            cos( radians( shops.latitude ) ) *
            cos( radians( shops.longitude ) - radians(' . $longitude . ') ) +
            sin( radians(' . $latitude . ') ) *
            sin( radians( shops.latitude ) ) ) ) AS distance
        '))
        ->having('distance', '<', 100) // 10 represents the distance in kilometers
        ->orderBy('distance', 'asc')
        ->get();



        $restaurantLocations = $nearbyShops->map(function ($shop) {
            return [
                'name' => $shop->name,
                'lat' => $shop->latitude,
                'lng' => $shop->longitude,
            ];
        });




      return view('front.nearby', compact('nearbyShops','restaurantLocations'));
    }

    // Handle error case when geocoding fails
    return redirect()->back()->with('error', 'Location not found');
}

}
