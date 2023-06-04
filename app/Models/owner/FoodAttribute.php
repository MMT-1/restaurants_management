<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\AttributeValue;

class FoodAttribute extends Model
{
    //this function show attribute value name
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'value_id');
    }
}
