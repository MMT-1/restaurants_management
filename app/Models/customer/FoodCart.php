<?php

namespace App\Models\customer;

use App\Models\owner\Food;
use App\Models\admin\Attribute;
use App\Models\admin\AttributeValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FoodCart extends Model
{
    //this function show Food details without attribute
    public function food(){
        return $this->belongsTo(Food::class,'food_id');
    }

    //this function show food attribute type
    public function attributeType(){
        return $this->belongsTo(Attribute::class,'attribute_type_id');
    }

    //this function show food attribute value
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'attribute_value_id');
    }


}
