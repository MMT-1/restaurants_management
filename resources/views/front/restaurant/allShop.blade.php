@extends('front.layout.master')

@section('title') All restaurant @endsection

@section('content') 
    <!-- start banner area -->
    <section class="inner-page banner" data-img="{{asset('front/assets/images/banner.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>restaurant</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">restaurant</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end banner area -->

     <!-- start main area -->
       <section class="shop-page left-sidebar main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h4>Home/restaurant</h4>
                            <ul class="d-flex">
                                <li><a href="shop-list-left.html"><i class="flaticon-list"></i></a></li>
                                <li><a href="shop-5-column.html" class="active"><i class="flaticon-grid"></i></a></li>
                            </ul>
                        </div>
                        <div class="home1 collection">
                            <div class="row">
                                @forelse ($allRestaurant as $restaurants)
                                <div class="col-lg-1-5 col-lg-3 col-md-4 col-sm-6">
                                    <div class="single-item">
                                        <div class="image-area">
                                            <a href="shop-detail.html">
                                                <img src="{{asset('owner/restaurant/'.$restaurants->logo)}}" class="img-active" alt="restaurant Logo"/>
                                            </a>
                                            <a href="{{route('restaurant.single',array('id'=>$restaurants->id,'slug'=>$restaurants->restaurant_slug))}}">
                                                <img src="{{asset('owner/restaurant/'.$restaurants->logo)}}" class="img-hover" alt="restaurant Logo"/>
                                            </a>
                                            <span class="sale-status">{{$restaurants->restaurant_name}}</span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                 <p>No restaurant Found</p>
                                @endforelse
                                <div class="col-lg-12">
                                    <div class="pages">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#!"><i class="flaticon-chevron-1"></i></a></li>
                                            <li><a href="#!" class="active">1</a></li>
                                            <li><a href="#!">2</a></li>
                                            <li><a href="#!">3</a></li>
                                            <li><a href="#!">4</a></li>
                                            <li><a href="#!"><i class="flaticon-chevron"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </section>
    <!-- end main area -->
@endsection