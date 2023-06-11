@extends('owner.layout.master')

@section('title') Dashboard @endsection

@section('content')
 
    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="{{asset('admin/assets/font-awesome/css/all.css')}}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="{{asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css" />

 
    <style>
        .card-box{
            height: 150px;
        }
    </style>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="breadcrumb-holder">
                <h1 class="main-title float-left">Dashboard</h1>
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
         
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-warning">
                <i class="fas fa-shopping-cart float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-8">Reservation</h6>
                <h1 class="m-b-20 text-white counter">{{$reservationCount}}</h1>
                <span class="text-white">25 Today</span>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
            <div class="card-box noradius noborder bg-info">
                <i class="fas fa-pizza-slice float-right text-white"></i>
                <h6 class="text-white text-uppercase m-b-8">Food</h6>
                <h1 class="m-b-20 text-white counter">{{$foodCount}}</h1>
                <span class="text-white">5 New</span>
            </div>
        </div>
    </div>
    <!-- end row -->

    
   
     
</div>
@endsection 