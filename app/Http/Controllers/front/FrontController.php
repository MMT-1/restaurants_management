<?php

namespace App\Http\Controllers\front;

use App\Models\admin\Blog;
use App\Models\owner\Food;
use App\Traits\CommonTrait;
use App\Models\admin\Slider;
use Illuminate\Http\Request;
use App\Models\owner\Restaurant;
use App\Models\owner\Reservation;

use Illuminate\Support\Facades\DB;
use App\Models\owner\FoodCategory;
use App\Http\Controllers\Controller;


class FrontController extends Controller
{
    //import trait
     use CommonTrait;

    //home page method
    public function index(){
        $restaurant=$this->activeRestaurant();
        $brand=$this->activeBrand();
        $slider=Slider::where('status',1)->orderBy('id','DESC')->get();
        $featured=Food::where(['status'=>1,'is_featured'=>1])->orderBy('id','DESC')->get();
        $blog=Blog::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        return view('front.index',compact('restaurant','brand','slider','featured','blog'));
    } 

    //contact method view
    public function contact(){
      return view('front.page.contact');
    } 

    //Restaurant single method
    public function restaurantSingle($id){
     $restaurant=Restaurant::findOrFail($id);
     return view('front.restaurant.restaurantDetails',compact('restaurant'));
    }

    //food single method
    public function foodSingle($id){
        $food=Food::findOrFail($id);
        $attributeType=$food->foodAttributeType($id);
        return view('front.food.foodtDetails',compact('food','attributeType'));
    }

    //food search
    public function search(Request $request){
      if($request->cat_id==''){
        $foods=Food::where('status',1)
        ->where('food_name', 'like', '%'.$request->search.'%')
        ->select('foods.id','foods.food_name','foods.image','foods.food_slug')
        ->get();
      }else{
        $foods=FoodCategory::
         where('category_id',$request->cat_id)
        ->leftjoin('foods','foods.id','=','food_categories.food_id')
        ->select('foods.id','foods.food_name','foods.image','foods.food_slug')
        ->get();
      }
      return view('front.food.search',compact('foods'));
    }

    //category food method
    public function categoryFood($id){
      $category=FoodCategory::where(['category_id'=>$id,'status'=>1])->get();
      return view('front.food.categoryFood',compact('category'));
    }

    //all active category
    public function allCategory(){
      $category=$this->activeCategory();
      return view('front.category.allCategory',compact('category'));
    }

    //all active Restaurant
    public function allRestaurant(){
      $allRestaurant=$this->allActiveRestaurant();
      return view('front.restaurant.allRestaurant',compact('allSRestaurant'));
    }

    //all active Restaurant
     public function allBrand(){
        $allbrand=$this->allActiveBrand();
        return view('front.brand.allBrand',compact('allbrand'));
     }

    //brand food method
    public function brandFood($id){
      $brand=Food::where(['brand_id'=>$id,'status'=>1])->get();
      return view('front.food.brandFood',compact('brand'));
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

    $reservation->restaurant_id = $request->restaurant_id; 
    $reservation->email = $request->email; 
    $reservation->first_name = $request->first_name; 
    $reservation->last_name = $request->last_name; 
    $reservation->mobile = $request->mobile; 
    
    
    $reservation->save(); 
    
    return redirect()->back();
}









public function getNearbyRestaurants(Request $request)
{
    $location = $request->input('location');

    // Make a request to Google Maps Geocoding API to obtain the latitude and longitude
    $geocodeUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($location) . '&key=AIzaSyA6vplU0Ty7M1OQTJ3yhZBroOJ59i7bMpg';
    $geocodeResponse = json_decode(file_get_contents($geocodeUrl));

    if ($geocodeResponse->status === 'OK') {
        $latitude = $geocodeResponse->results[0]->geometry->location->lat;
        $longitude = $geocodeResponse->results[0]->geometry->location->lng;

        // Retrieve nearby Restaurants based on the latitude and longitude
        $nearbyRestaurants = Restaurant::select('restaurants.*', DB::raw('
            ( 6371 * acos( cos( radians(' . $latitude . ') ) *
            cos( radians( restaurants.latitude ) ) *
            cos( radians( restaurants.longitude ) - radians(' . $longitude . ') ) +
            sin( radians(' . $latitude . ') ) *
            sin( radians( restaurants.latitude ) ) ) ) AS distance
        '))
        ->having('distance', '<', 100) // 10 represents the distance in kilometers
        ->orderBy('distance', 'asc')
        ->get();



        $restaurantLocations = $nearbyRestaurants->map(function ($restaurant) {
            return [
                'name' => $restaurant->name,
                'lat' => $restaurant->latitude,
                'lng' => $restaurant->longitude,
            ];
        });




      return view('front.nearby', compact('nearbyRestaurants','restaurantLocations'));
    }

    // Handle error case when geocoding fails
    return redirect()->back()->with('error', 'Location not found');
}

}
