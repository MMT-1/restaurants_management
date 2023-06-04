@extends('front.layout.master')


@section('content')
     <!-- start banner area -->
     <div class="container">
            
            <div class="row">
                <div class="col-lg-12 text-start">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-start">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}" style="color: #589442;">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{$shop->shop_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
     <section class="inner-page banner" data-img="{{asset('owner/shop/'.$shop->logo)}}" style="height:400px">
         <div class="container">
            
            <div class="row">
                <div class="col-lg-12 text-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                          <li class="breadcrumb-item"><a href="{{route('home.page')}}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">{{$shop->shop_name}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div> 
    </section>
    <!-- end banner area -->

        @include('front.shop.reservation')
        
    <!-- start main area -->
    <section class="shop-page left-sidebar main">
        <div class="container">
            <div class="row">
                <!-- left content -->
                <!-- <div class="col-xl-3 col-lg-4 col-md-8 offset-md-2 offset-lg-0">
                    




                <form action="{{url('/reservation')}}" method="POST" class="personalinfo-form">
  @csrf
<h2>Find a table</h2>
  <input type="hidden" name="shop_id" value="{{$shop->id}}">

  <label for="date">Date:</label>
  <input type="date" class="personalinfo" id="date" name="date">

  <label for="time">Time:</label>
  <input type="time" id="time" name="time" class="personalinfo">

  <label for="guests">Number of guests:</label>
  <input type="number" id="guests" name="guests"  placeholder="Number Of Guests" class="personalinfo  ">

  <button type="submit"  class="mt-3">Submit</button>
</form>









                </div> -->
                <!-- right content -->
                <div class="">
                    <div class="content right-content">
                        <div class="title d-flex justify-content-between align-items-center">
                            <h4>{{$shop->shop_name}}</h4>
                           
                        </div>
                        <div class="home1 collection">
                            <div class="row">

                             @forelse ($shop->foods as $foods)
                             <div class="col-lg-3 col-md-4 col-sm-6 m-0 p-0">
                                <div class="single-item">
                                    <div class="image-area">
                                        <a href="{{route('food.single',array('id'=>$foods->id,'slug'=>$foods->food_slug))}}">
                                            <img src="{{asset('owner/food/'.$foods->image)}}" class="img-active" alt="food Image"/>
                                        </a>
                                        <a href="{{route('food.single',array('id'=>$foods->id,'slug'=>$foods->food_slug))}}">
                                            <img src="{{asset('owner/food/'.$foods->image)}}" class="img-hover" alt="food Image"/>
                                        </a>
                                        <span class="sale-status">sale</span>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="{{route('add.wishlist',$foods->id)}}">
                                                        <i class="far fa-heart"></i>
                                                        <p class="my-tooltip">
                                                            add to wishlist
                                                        </p>
                                                    </a>
                                                </li>
                                                <li>

                                                    <a  href="{{route('add.cart',$foods->id)}}" >
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <p class="my-tooltip">
                                                            add To cart
                                                        </p>
                                                    </a>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="bottom-area">
                                        <!-- <ul class="rating d-flex">
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                            <li><i class="fas fa-star"></i></li>
                                        </ul> -->
                                        <a href="shop-detail.html">
                                            <h5>{{$foods->food_name}}</h5>
                                        </a>
                                        <!-- <a href="{{route('food.single',array('id'=>$foods->id,'slug'=>$foods->food_slug))}}" class="add-cart button-style1">View More <span class="btn-dot"></span></a> -->
                                    </div>
                                </div>
                            </div>
                              @empty
                                <p>No food Found</p>
                             @endforelse
                                <div class="col-lg-12">
                                    <!-- <div class="pages">
                                        <ul class="d-flex justify-content-center">
                                            <li><a href="#!"><i class="flaticon-chevron-1"></i></a></li>
                                            <li><a href="#!" class="active">1</a></li>
                                            <li><a href="#!">2</a></li>
                                            <li><a href="#!">3</a></li>
                                            <li><a href="#!">4</a></li>
                                            <li><a href="#!"><i class="flaticon-chevron"></i></a></li>
                                        </ul>
                                    </div> -->
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