<?php

namespace App\Models\owner;

use App\Models\owner\Food;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    //restaurant Food
    public function foods(){
        return $this->hasMany(Food::class,'restaurant_id');
    } 
    
}
