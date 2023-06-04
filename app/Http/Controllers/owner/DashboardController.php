<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owner');
    }
    
    //vendor dashboard
    public function index(){
        return view('owner.dashboard');
    }
    
}
