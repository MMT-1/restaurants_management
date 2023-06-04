<?php

namespace App\Models\owner;

use App\Models\owner\Food;
use App\Models\admin\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\owner\FoodCategory;

class FoodCategory extends Model
{
    protected $fillable = [
        'category_id',
    ];

    //this function show all Food from category wise
    public function food(){
        return $this->belongsTo(Food::class,'food_id');
    }

    //this function show category name
    public function categoryName(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
