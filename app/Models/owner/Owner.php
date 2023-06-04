<?php

namespace App\Models\owner;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;


use App\Models\owner\Restaurant;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use Notifiable;

    protected $guard = 'owner';

    //this function show owner restaurant information
    public function restaurants(){
        return $this->hasOne(Restaurant::class, 'owner_id');
    }

}
