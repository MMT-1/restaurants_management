  @extends('front.layout.master')
  @section('title') Home @endsection
  @section('content')

    <!-- start fancybox area -->
    @include('front.include.fancybox')
    <!-- end fancybox area -->

    <!-- start banner area -->
    <!-- <section class="home1 banner" data-img="{{asset('front/assets/images/home1/banner.jpg')}}">
            <div class="banner-slider">
                @forelse ($slider as $sliders)
                <div class="slider-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-7">
                                <div class="text-area">
                                    <h4 data-animation="fadeInUp" data-delay=".2s">{{$sliders->text}}</h4>
                                    <h1 data-animation="fadeInUp" data-delay=".4s">{{$sliders->text}}</h1>
                                    <p data-animation="fadeInUp" data-delay=".6s">{{$sliders->description}}</p>
                                    <a href="shop-3-column-sidebar.html" class="button-style1" data-animation="fadeInUp" data-delay=".8s">shop now <span class="btn-dot"></span></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-5">
                                <div class="image-area image1" data-animation="fadeInRight" data-delay=".3s">
                                    <img src="{{asset('admin/slider/'.$sliders->image)}}" alt="Banner Image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>No Slider Found</p>
               @endforelse
            </div>
    </section> -->
    <!-- end banner area -->

    <!-- start feature area -->
    @include('front.include.feature')
    <!-- end feature area -->
   @include('front.resSectionOne')
   @include('front.resSectionTwo')
   @include('front.resSectionTree')
   @include('front.resSectionFour')
   @include('front.resSectionFive')
     <!-- start shop area -->
      <!-- <section class="home1 category mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>shop list</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5">
                            <div class="single-category cat-height item-animation">
                                <img src="{{asset('front/assets/images/home1/category/image1.jpg')}}" alt="Category Image"/>
                                <div class="content">
                                    <h5>Latest Shop</h5>
                                    <a href="{{route('restaurant.all')}}">View All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-7">
                            <div class="row">
                                @forelse ($restaurant as $restaurants)
                                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                        <div class="single-category item-animation">
                                            <img src="{{asset('owner/restaurant/'.$restaurants->logo)}}" alt="Category Image"/>
                                            <div class="content">
                                                <h5>{{$restaurants->restaurant_name}}</h5>
                                                <p>4 foods</p>
                                                <a href="{{route('restaurant.single',array('id'=>$restaurants->id,'slug'=>$restaurants->restaurant_slug))}}">view more</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No restaurant Found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section> -->





      
     <!-- end restaurant area -->

     <!-- start category area -->
        <!-- <section class="home1 category">
          <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>food brands</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-3 col-lg-5">
                            <div class="single-category cat-height item-animation">
                                <img src="{{asset('front/assets/images/home1/category/image1.jpg')}}" alt="Category Image"/>
                                <div class="content">
                                    <h5>latest brand</h5>
                                    <a href="{{route('brand.all')}}">view all</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-7">
                            <div class="row">
                                @forelse ($brand as $brands)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                                    <div class="single-category item-animation">
                                        <img src="{{asset('admin/brand/'.$brands->image)}}" alt="Category Image"/>
                                        <div class="content">
                                            <h5>{{$brands->brand_name}}</h5>
                                            <p>4 foods</p>
                                            <a href="{{route('brand.food',array('id'=>$brands->id,'slug'=>$brands->slug))}}">view more</a>
                                        </div>
                                    </div>
                                </div>
                                 @empty
                                 <p>No Brand Found</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </section> -->
     <!-- end category area -->



    

    <!-- start featured area -->
    <!-- <section class="home1 featured">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>featured food</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row featured-slider">
                        @forelse ($featured as $featureds)
                        <div class="col-lg-3">
                            <div class="single-food">
                                <div class="image-area">
                                    <img src="{{asset('owner/food/'.$featureds->image)}}" class="img-main" alt="food Image"/>
                                    <img src="{{asset('owner/food/'.$featureds->image)}}" class="img-hover" alt="food Image"/>
                                    <span class="sale-status">sale</span>
                                    <div class="action">
                                        <ul class="d-flex">
                                            <li>
                                                <a href="{{route('add.wishlist',$featureds->id)}}">
                                                    <i class="far fa-heart"></i>
                                                    <p class="my-tooltip">add to wishlist</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="far fa-eye"></i>
                                                    <p class="my-tooltip">quick view</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="cart.html">
                                                    <i class="flaticon-shopping-cart"></i>
                                                    <p class="my-tooltip">add to cart</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="bottom-area">
                                    <a href="{{route('food.single',array('id'=>$featureds->id,'slug'=>$featureds->food_slug))}}">
                                        <h5>{{$featureds->food_name}}</h5>
                                    </a>
                                    <p><span>$110</span> - $78</p>
                                    <ul class="rating d-flex">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No food Found</p>
                       @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end featured area -->






    <!-- start blog area -->
    <!-- <section class="home1 blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>from the blog</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row justify-content-center">
                        @forelse ($blog as $blogs)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-blog">
                                <div class="blog-img item-animation3">
                                    <span class="item-animation3a"></span>
                                    <img src="{{asset('admin/blog/'.$blogs->image)}}" alt="Blog Image"/>
                                </div>
                                <div class="content">
                                    <a href="#!">
                                        <p>{{date('F d, Y',strtotime($blogs->created_at))}}</p>
                                    </a>
                                    <a href="blog-detail-right.html">
                                        <h5>{{$blogs->title}}</h5>
                                    </a>
                                    <a href="blog-detail-left.html" class="read-more">read more</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>No Blog Found</p>
                       @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end blog area -->








  @endsection 
  