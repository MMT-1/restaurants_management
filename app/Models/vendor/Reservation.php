<?php

namespace App\Models\vendor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'time',
        'guests',
        'shop_id'
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
