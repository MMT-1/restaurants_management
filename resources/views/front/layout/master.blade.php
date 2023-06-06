<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!--==== favicon css ====-->
     <link rel="shortcut icon" href="{{asset('front/assets/images/favicon.png')}}" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>@yield('title')</title>

    <!-- owner css files -->
    
    <!--==== bootstrap css ====-->
    
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}">

    <!--==== fontawesome css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/all.min.css')}}">

    <!--==== flaticon css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/font/flaticon.css')}}">

    <!--==== select css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/select2.min.css')}}">

    <!--==== menu css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/menu.css')}}">

    <!--==== animate css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}">

    <!--==== slider css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/slick.css')}}">

    <!--==== venobox css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/venobox.css')}}">

    <!--==== scroll animation css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/aos.css')}}">

    <!--==== range slider css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/jquery-ui.min.css')}}">

    <!--==== style css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}">

    <!--==== responsive css ====-->
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <style>
        .dropdown-toggle::after{
            display:none;
        }
        .dropdown-menu1 {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    min-width: 10rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 0.875rem;
    color: #3e5569;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e9ecef;
    border-radius: 2px;}
        .dropdown-item1 {
    display: block;
    width: 100%;
    padding: 0.65rem 1rem;
    clear: both;
    font-weight: 400;
    color: #212529;
    text-align: inherit;
    text-decoration: none;
    white-space: nowrap;
    background-color: transparent;
    border: 0;
}




.section {
  margin: 20px;
}

.time-buttons {
  display: flex;
  flex-wrap: wrap;
  margin-top: 10px;
}

.time-button {
  background-color: #fff;
  border: 1px solid #ccc;
  border-radius: 5px;
  color: #333;
  font-size: 16px;
  margin-right: 10px;
  margin-bottom: 10px;
  padding: 10px 20px;
  cursor: pointer;
  transition: all 0.3s ease;
}

.time-button:hover {
  background-color: #ccc;
  border-color: #999;
  color: #fff;
}

    </style>
    <!-- <style>
        .page {
            display: none;
        }

        .active {
            display: block;
        }

        table {
            border-collapse: collapse;
            margin: 20px 0;
        }

        th,
        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }

        th {
            background-color: #ccc;
        }

        td.today {
            background-color: #ff0;
        }

        td button {
            position: relative;
            border: 0px;
            border-radius: 0.25rem;
            text-transform: uppercase;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            vertical-align: bottom;
            transition: background-color 62.5ms ease 0s, box-shadow 62.5ms ease 0s;
            font-size: 1rem;
            font-weight: 400;
            font-family: RalewayX, arial, sans-serif;
            font-style: normal;
            margin-top: 0.375rem;
            color: rgb(39, 42, 47);
            background-color: rgb(255, 255, 255);
            box-shadow: rgb(213, 216, 220) 0px 0px 0px 1px inset;
            padding: 0px;
            min-width: 2.78125rem;
            height: 2.78125rem;
            line-height: 1.5;


        }

        .btns {
            width: 100%;
            border-bottom: 1px solid rgb(236, 237, 239);
            background-color: rgb(243, 252, 243);
            border: 0.125rem solid rgb(243, 252, 243);
        }

        .btns {
            list-style-type: none;
            display: flex;
            padding: 0.125rem;
            overflow: hidden;
           
            border-radius: 0.5rem;
            height: 2rem;
            margin: 0.5rem;
        }

        .btn {
            list-style-type: none;
            display: flex;
            flex: 1 1 0px;
            -webkit-box-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            align-items: center;
            min-width: 0px;
            
        }

        .btnbtn {
            min-width: 0px;
            flex: 1 1 0px;
            position: relative;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            text-align: left;
            background-color: rgb(88, 148, 66);
            width: calc(100% - 0.53rem);
            border-radius: 0px 0.375rem 0.375rem 0px;
            border-top-left-radius: 0.375rem;
            border-bottom-left-radius: 0.375rem;
            padding-left: 0.5rem;

            
        }

        .btnbtn button {
            position: relative;
            border: 0px;
            cursor: pointer;
            text-align: center;
            text-align: left;
            padding-left: 0px;
            padding-right: 0px;
            text-decoration: none;
            display: inline-block;
            vertical-align: bottom;
            transition: background-color 62.5ms ease 0s, box-shadow 62.5ms ease 0s;
            font-size: 0.8125rem;
            font-weight: 400;
            font-family: RalewayX, arial, sans-serif;
            font-style: normal;
            box-shadow: none;
            background-color: transparent;
            padding: 0px 0.25rem;
            border-radius: 0px;
            height: unset;
            line-height: unset;
            width: 100%;
            text-transform: capitalize;
            white-space: nowrap;
            color: rgb(255, 255, 255);

            overflow: hidden;
            text-overflow: ellipsis;
            margin: 0.125rem 0px;
        }

        .sas{
            max-width:388px;
            justify-content: center;
            text-align: center;
        }

        .btnbtn::after{
            content: "";
    position: absolute;
    width: 2.12rem;
    height: 2.12rem;
    top: 0.16rem;
    bottom: 0px;
    right: -0.675rem;
    clip-path: polygon(0% 0%, 100% 100%, 0% 100%);
    transform: rotate(-135deg);
    background-color: rgb(88, 148, 66);
    border-radius: calc(0.625rem) 0.25rem;
        }

        .calendar-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#prev-button {
  order: 1;
}

#next-button {
  order: 3;
}

#month-year {
  order: 2;
  text-align: center;
}
#prev-button, #next-button {
  background-color: transparent;
  border: none;
  outline: none;
  cursor: pointer;
}

#month-year{
    text-transform: capitalize;
    
}
#date-page svg{
    width: 1.23077em;
    height: 1.23077em;
}
svg{
    margin-right: 0.375rem;
    width: 1.23077em;
    height: 1.23077em;
    color: #fff !important;
}
       .cale{
        width: 100%;
       }
/* .cale thead{
    display: flex;
  justify-content: space-between;
  align-items: center;
} */
.cale th{
    padding-bottom: 0.125rem;
    text-align: center;
    font-size: 0.625rem;
    font-weight: 300;
    border: 0;
    padding-bottom: 1rem;
    font-family: RalewayX, arial, sans-serif;
    font-style: normal;
    line-height: 1.5;
    text-transform: uppercase;
    background-color: transparent;
    justify-content: center;
}


#calendar-body td{
    position: relative;
    border: 0px;
    border-radius: 0.25rem;
    text-transform: uppercase;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    vertical-align: bottom;
    transition: background-color 62.5ms ease 0s, box-shadow 62.5ms ease 0s;
    font-size: 1rem;
    font-weight: 400;
    font-family: RalewayX, arial, sans-serif;
    font-style: normal;
    margin-top: 0.375rem;
    vertical-align: middle;
    color: rgb(39, 42, 47);
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(213, 216, 220) 0px 0px 0px 1px inset;
    padding: 0px;
    min-width: 2.78125rem;
    height: 2.78125rem;
    line-height: 1.5;
}
.btn:first-child{
    padding-left: 0;
    text-align: center;
    justify-content: center;
}




.active .btnbtn {
    color: #fff;
    background-color: rgb(88, 148, 66);
}
.btnbtn::after {
    
    background-color: rgb(88, 148, 66);
}



#time-page td{
    
    position: relative;
    border: 0px;
    text-transform: uppercase;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    vertical-align: bottom;
    transition: background-color 62.5ms ease 0s, box-shadow 62.5ms ease 0s;
    padding: 1rem 0.75rem;
    font-size: 0.8125rem;
    font-weight: 400;
    font-family: RalewayX, arial, sans-serif;
    font-style: normal;
    line-height: 1.38462;
    margin-bottom: 1rem;
    color: rgb(39, 42, 47);
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(213, 216, 220) 0px 0px 0px 1px inset;
    border-radius: 0.25rem;
    margin: 10px ;
    min-width: 67px;

}
input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: none;
  border: none;
  background-color: transparent;
}
input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  border-radius: 0;
  outline: none;
  /* Other styling */
}
input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  outline: none;
  border: none;
  margin: 0;
  padding: 0;
  width: 100px;
  height: 100px;
  position: absolute;
  background-color: transparent;
  border-radius: 0;
}

input[type="radio"]:checked::before {
  content: "";
  display: block;
  /* width: 100px;
  height: 100px;
  background-color: black;
  border-radius: 50%; */
}

.css-1ccut2i {
    list-style-type: none;
    display: flex;
    margin-left: -0.25rem;
    margin-right: -0.25rem;
    flex-wrap: wrap;
}
.css-1ccut2i tr {
    list-style-type: none;
    padding-left: 0.25rem;
    display: flex;
    padding-right: 0.25rem;
    text-align: center;
    justify-content: center;
}






 #guests-page td{
    
    position: relative;
    border: 0px;
    text-transform: uppercase;
    cursor: pointer;
    text-align: center;
    text-decoration: none;
    vertical-align: bottom;
    transition: background-color 62.5ms ease 0s, box-shadow 62.5ms ease 0s;
    padding: 1rem 0.75rem;
    font-size: 0.8125rem;
    font-weight: 400;
    font-family: RalewayX, arial, sans-serif;
    font-style: normal;
    line-height: 1.38462;
    margin-bottom: 1rem;
    color: rgb(39, 42, 47);
    background-color: rgb(255, 255, 255);
    box-shadow: rgb(213, 216, 220) 0px 0px 0px 1px inset;
    border-radius: 0.25rem;
    margin: 10px ;
    min-width: 67px;

}
    </style> -->
</head>
<body>
      <!-- start header area -->
      @include('front.include.header')
      <!-- end header area -->
      
    <!-- start preloader area -->
    <div class="preloader">
        <img src="{{asset('front/assets/images/loader.gif')}}" alt="Preloader">
    </div>
    <!-- end preloader area -->

    <!-- start top to button -->
    <div class="top-to">
        <button class="top-to-btn">
            <i class="fas fa-long-arrow-alt-up"></i>
        </button>
        <p>back to top</p>
    </div>
    <!-- end top to button -->
 
   <!--start content -->
     @yield('content')
   <!-- end content -->

    <!-- start footer area -->
    @include('front.include.footer')
    <!-- end footer area -->

    <!-- start modal area -->
    <div class="modal fade quick-view-modal" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
              </button>
            </div>
            <div class="modal-body">
              <!-- start detail area -->
                <section class="shop-detail detail">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="image-area">
                                <div class="modal-gallery">
                                    <div class="item">
                                        <img id="zoom_01" src="{{asset('front/assets/images/restaurant/shop1.jpg')}}" alt="food" data-zoom-image="{{asset('front/assets/images/shop/shop1.jpg')}}">
                                    </div>
                                    <div class="item">
                                        <img id="zoom_02" src="{{asset('front/assets/images/shop/shop2.jpg')}}" alt="food" data-zoom-image="{{asset('front/assets/images/restaurant/shop2.jpg')}}">
                                    </div>
                                    <div class="item">
                                        <img id="zoom_03" src="{{asset('front/assets/images/restaurant/shop3.jpg')}}" alt="food" data-zoom-image="{{asset('front/assets/images/restaurant/shop3.jpg')}}">
                                    </div>
                                    <div class="item">
                                        <img id="zoom_04" src="{{asset('front/assets/images/restaurant/shop4.jpg')}}" alt="food" data-zoom-image="{{asset('front/assets/images/restaurant/shop4.jpg')}}">
                                    </div>
                                </div>
                                <div class="modal-thumb">
                                    <div class="item">
                                        <img src="{{asset('front/assets/images/restaurant/shop-sm1.jpg')}}" alt="food">
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('front/assets/images/restaurant/shop-sm2.jpg')}}" alt="food">
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('front/assets/images/restaurant/shop-sm3.jpg')}}" alt="food">
                                    </div>
                                    <div class="item">
                                        <img src="{{asset('front/assets/images/restaurant/shop-sm4.jpg')}}" alt="food">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="detail-content">
                                <span class="stock">in stock</span>
                                <h4>Flower Check Flannel Jacket</h4>
                                <div class="review-area d-flex align-items-center">
                                    <ul class="rating d-flex">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <p>(2 customer review)</p>
                                </div>
                                <h4>$671.73 – <span>$921.45</span></h4>
                                <p class="desc">Crescendo lacusque ut utramque. Rapidisqur descen Diversa plagae minantia terras! Naturae super perveniunt Fixo fronde tellure orbis consistere margine sole toto tu Turba tuba surgere eodem. Nubibus ille in  saidul </p>
                                
                                <div class="color-pallate d-flex align-items-center">
                                    <p>color : </p>
                                    <ul class="d-flex">
                                        <li><a href="#!" class="blue"></a></li>
                                        <li><a href="#!" class="red"></a></li>
                                        <li><a href="#!" class="pink"></a></li>
                                    </ul>
                                </div>
                                <div class="size-area d-flex align-items-center">
                                    <p>size : </p>
                                    <ul class="d-flex">
                                        <li><a href="#!">s</a></li>
                                        <li><a href="#!">m</a></li>
                                        <li><a href="#!">l</a></li>
                                        <li><a href="#!">xl</a></li>
                                    </ul>
                                </div>
                                <div class="border-area">
                                    <div class="cart-part d-flex align-items-center">
                                        <div class="d-flex number-spinner">
                                            <input type="text" class="form-control text-center input-value" value="1">
                                            <div class="buttons">
                                                <button data-dir="up" class="up-btn"><i class="flaticon-plus"></i></button>
                                                <button data-dir="dwn" class="down-btn"><i class="flaticon-remove"></i></button>
                                            </div>
                                        </div>
                                        <a href="#!" class="cart button-style1">add to cart <span class="btn-dot"></span></a>
                                        <a href="wishlist.html" class="add-more"><i class="far fa-heart"></i></a>
                                        <a href="compare.html" class="add-more"><i class="fas fa-sync-alt"></i></a>
                                    </div>
                                </div>
                                <h5>category : <a href="#!">fashion,</a> <a href="#!">trend</a></h5>
                                <h5>tags : <a href="#!">fashion,</a> <a href="#!">trend</a></h5>
                                <div class="share d-flex align-items-center">
                                    <h5>share : </h5>
                                    <ul class="d-flex">
                                        <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-pinterest-p"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- end detail area -->
            </div>
          </div>
        </div>
    </div>
    <!-- end modal area -->
    
    <!-- owner js files -->

    <!--==== jquery min js ====-->
    <script src="{{asset('front/assets/plugins/jquery-3.5.1.min.js')}}"></script>

    <!--==== bootstrap min js ====-->
    <script src="{{asset('front/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--==== select js ====-->
    <script src="{{asset('front/assets/plugins/select2.min.js')}}"></script>

    <!--==== menu js ====-->
    <script src="{{asset('front/assets/plugins/menu.min.js')}}"></script>

    <!--==== slider js ====-->
    <script src="{{asset('front/assets/plugins/slick.min.js')}}"></script>

    <!--==== parallax js ====-->
    <script src="{{asset('front/assets/plugins/parallax.js')}}"></script>

    <!--==== countdown js ====-->
    <script src="{{asset('front/assets/plugins/jquery.countdown.min.js')}}"></script>

    <!--==== venobox js ====-->
    <script src="{{asset('front/assets/plugins/venobox.min.js')}}"></script>

    <!--==== scroll animation js ====-->
    <script src="{{asset('front/assets/plugins/aos.js')}}"></script>

    <!--==== jquery ui js ====-->
    <script src="{{asset('front/assets/plugins/jquery-ui.min.js')}}"></script>

    <!--==== elevate zoom js ====-->
    <script src="{{asset('front/assets/plugins/jquery.elevateZoom-3.0.8.min.js')}}"></script>

    <!--==== packary js ====-->
    <script src="{{asset('front/assets/plugins/packery.pkgd.min.js')}}"></script>

    <!--=== Google map ===-->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjkssBA3hMeFtClgslO2clWFR6bRraGz0"></script> --}}

    <!--==== script js ====-->
    <script src="{{asset('front/assets/js/script.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
        integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    






        {{-- <script>
             $(document).ready(function () {
    var owl = $("#slider-carousel6");
    owl.owlCarousel({
        items: 4,
        // itemsDesktop: [1000, 3],
        // itemsDesktopSmall: [900, 2],
        // itemsTablet: [600, 1],
        // itemsMobile: false,
        // pagination: false
    });
    $(".next6").click(function () {
        owl.trigger('owl.next');
    })
    $(".prev6").click(function () {
        owl.trigger('owl.prev');
    })
});
          </script>--}}

<script> 
     $(document).ready(function () {
        $('.owl-carousel').each(function () {
            var carousel = $(this);
            var carouselContainer = carousel.closest('.carousel-container');
            var prevButton = carouselContainer.find('.prev');
            var nextButton = carouselContainer.find('.next');

            carousel.owlCarousel({
                items: 4,
                // Configure other options as needed
            });

            nextButton.click(function () {
                carousel.trigger('next.owl.carousel');
            });

            prevButton.click(function () {
                carousel.trigger('prev.owl.carousel');
            });
        });
    });
</script>


</body>
</html>