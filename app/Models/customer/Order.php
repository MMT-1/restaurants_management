<?php

namespace App\Models\customer;

use App\Models\owner\Food;
use App\Models\owner\Restaurant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function restaurant()
{
    return $this->belongsTo(Restaurant::class);
}

public function foods()
{
    return $this->belongsToMany(Food::class)->withPivot('quantity');
}

}
