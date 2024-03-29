<?php

namespace Database\Seeders;

use App\Models\owner\Owner;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Owner;
        $user->first_name   =    'owner';
        $user->last_name    =    'User';
        $user->email        =    'owner@email.com';
        $user->password     =     Hash::make('12345678');
        $user->mobile       =     12345678;
        $user->image        =     '1.jpg';
        $user->address      =     'dhaka';
        $user->country_id   =     1;
        $user->role         =     2;
        $user->city         =     'Dhaka';
        $user->zip_code     =     1205;
        $user->gender       =     1;
        $user->created_by   =     1;
        $user->status       =     1;
        $user->save();
    }
}
