<?php

namespace App\Models\owner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\AttributeValue;

class FoodAttribute extends Model
{
    public function attributeValue(){
        return $this->belongsTo(AttributeValue::class,'value_id');
    }
}
