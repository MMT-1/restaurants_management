<?php

namespace App\Models\owner;

use App\Models\admin\Brand;
use App\Models\owner\Owner;
use App\Models\owner\FoodGallery;
use App\Models\owner\FoodCategory;

use App\Models\owner\FoodAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Food extends Model
{
    use HasFactory;
    protected $table = 'foods';


    //this function shows food gallery
    public function gallery(){
        return $this->hasMany(FoodGallery::class,'food_id');
    }

    // this function shows food owner name
    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id');
    }

    // this function shows food restaurant name
    public function restaurant(){
        return $this->belongsTo(Restaurant::class,'restaurant_id');
    }

    //this function shows food category
    public function category(){
        return $this->hasMany(FoodCategory::class,'food_id');
    }

     //this function shows food multiple attribute type
    public function foodAttributeType($id){
      $data= FoodAttribute::where('food_id',$id)
      ->where('food_attributes.status',1)
      ->leftjoin('attributes','attributes.id','=','food_attributes.type_id')
      ->groupBy('food_attributes.type_id')
      ->get();
      return $data;
    }

    //this function show food multiple attribute value
    public function foodAttributeValue(){
        return $this->hasMany(FoodAttribute::class,'food_id');
    }

    //this function show food brand name
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    } 

    
}
