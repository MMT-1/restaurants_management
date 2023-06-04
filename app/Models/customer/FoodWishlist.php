<?php

namespace App\Models\customer;

use App\Models\owner\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodWishlist extends Model
{
    public function food(){
        return $this->belongsTo(Food::class,'food_id');
    }
}
