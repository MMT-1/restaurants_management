@extends('front.layout.master')

@section('content')










<style>
   .cardul .card {
  background: #fff;
  display: flex;
  flex-direction: column;
}
.cardul .card .card-body {
  display: flex;
  flex-flow: row wrap;
  padding: 0 30px ;
}
.cardul .card header {
  flex: 100%;
}
.cardul .card .meta {
  margin-bottom: 22px;
}
.cardul .card .chips {
  align-self: flex-end;
}
.cardul .card .featured-image {
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
  overflow: hidden;
  width: 276px;
    height: 216px;
}

@media only screen and (min-width: 768px) {
  .cardul .card {
    flex-direction: row;
    max-height: 279px;
  }
  .cardul .card h3 {
    font-size: calc(100% + 1vw);
  }
  .cardul .card .featured-image {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
    border-top-right-radius: 0;
    max-width: 276px;
    max-height: 216px;
  }
}
@media only screen and (min-width: 1280px) {
    .cardul .card h3 {
    font-size: 32px;
  }
}
.cardul{
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

.cardul h3 {
  font-size: 32px;
  line-height: 1.2;
  font-weight: bold;
  color: #222;
  margin: 0.5em 0;
}

.cardul .pre-heading {
  color: #444;
  font-size: 20px;
  font-weight: 400;
  text-transform: uppercase;
}



.cardul .author {
  text-transform: uppercase;
}

.cardul {
  display: block;
  margin: 0 auto;
  max-width: 1160px;
}

.cardul a {
  text-decoration: none;
}

.cardul .chips {
  white-space: nowrap;
  overflow-x: auto;
  -webkit-overflow-scrolling: touch;
  -ms-overflow-style: -ms-autohiding-scrollbar;
  -ms-overflow-style: none;
}
.cardul .chips::-webkit-scrollbar {
  display: none;
}

.cardul .chip {
  display: inline-block;
  position: relative;
  font-size: 16px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  line-height: 1.4;
  white-space: nowrap;
  color: white;
  background: #009DFF;
  border-radius: 25px;
  margin-right: 8px;
  padding: 5px 12px;
  max-height: 32px;
}
.cardul .chip.large {
  text-transform: uppercase;
  color: black;
   background: white;
  padding: 10px 15px;
  max-height: 44px;
}
.cardul .chip input {
  margin-bottom: 0 !important;
  height: 22px !important;
  background-color: transparent !important;
  padding: 3px 0 0 0 !important;
}
.cardul .chip input::placeholder {
  color: black;
  text-transform: uppercase;
  font-size: 16px;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}

.cardul a.chip {
  cursor: pointer;
}
.cardul a.chip:hover, a.chip:visited, a.chip:active {
  color: white;
}

.cardul a.chip.large:visited, a.chip.large:hover, a.chip.large:active {
  color: black;
}
#map {
  height: 860px;
}




.card {
    content: '';
     width: 100%;
    border-bottom: 1px solid hsl(220, 9%, 62%);
     
}
.title h3{
  font-family: RalewayX,arial,sans-serif;
  font-size: 1.05rem !important;
    font-weight: 600 !important;
    line-height: 1.875rem !important;
}
.css-1bgn2qo {
    font-size: 1rem;
    font-weight: 300;
    font-family: RalewayX,arial,sans-serif;
    font-style: normal;
    line-height: 1.375;
    margin: 0;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.css-fl00r9 {
    text-transform: uppercase;
    white-space: nowrap;
    font-weight: 300;
    padding: 0.25rem 0.5rem;
    font-size: 0.8125rem;
    border-radius: 0.25rem;
    color: hsl(354, 69%, 44%);
    background-color: hsl(354, 52%, 94%);
    font-weight: 400;
    width: m;
    height: m;
    display: inline-block;
}
.css-ibqusf {
    margin-top: 0.25rem;
    margin-bottom: 0.25rem;
    color: hsl(218, 9%, 17%);
    font-size: 1rem;
    font-weight: 300;
    font-family: RalewayX,arial,sans-serif;
    font-style: normal;
    line-height: 1.375;
}
</style>







<input type="hidden" id="latitudeInput" name="latitude" value="{{ request()->get('latitude') }}">
<input type="hidden" id="longitudeInput" name="longitude" value="{{ request()->get('longitude') }}">

<div class="container" style="max-width: 80rem;">
  <h1 style="">The Best Restaurants in {{ request()->get('location') }}</h1>
    <div class="row m-0 p-0">
    
        <div class="col-md-8 m-0 p-0" >
            <ul class="cardul" style="">
        
                @if ($nearbyRestaurants->count() > 0)
                @foreach ($nearbyRestaurants as $restaurant)
                <li class="card" style="border:0;border-bottom: 1px solid  hsl(220, 9%, 62%);padding-bottom: 1rem;padding-top: 1rem; border-radius:0">
                    <a 
                        href="#" 
                        class="featured-image" 
                        style='background-image:url("{{ asset('owner/restaurant/' . $restaurant->logo) }}");'>
                    </a>
                    <article class="card-body">
                        <header>
                            <a href="utilidata-national-governors-association-meeting">
                              <span data-test="search-restaurant-tags-MICHELIN"><span font-weight="m" data-test="michelin-tag" data-testid="tag" display="inline-block" color="information" class="css-fl00r9 e13tleqf0">MICHELIN</span></span>
                                <div class="title">
                                    <h3>{{ $restaurant->restaurant_name }}</h3>
                                </div>
                                <p color="gray.xl" class="css-ibqusf eulusyj0">
                                  {{$restaurant->restaurant_address}}
                                </p>
                                
                            </a>
                        </header>
                      
                    </article>
                </li>
                       @endforeach
                    @else
                        <li>No nearby restaurants found</li>
                    @endif
                </ul>
        </div>
        

        <div class="col-md-4">
            <div id="map"></div>
        </div>
</div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6vplU0Ty7M1OQTJ3yhZBroOJ59i7bMpg&libraries=places&callback=initAutocomplete" async defer></script>



<script>
    function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 28.986890, lng: -10.058010 }, // Set the initial center of the map
            zoom: 12, // Set the initial zoom level
        });

        // Retrieve the restaurant data from your backend or API
        // For demonstration purposes, we'll use the data passed from Laravel
        var restaurantLocations = {!! $restaurantLocations !!};

        // Add markers for each restaurant location
        for (var i = 0; i < restaurantLocations.length; i++) {
            var restaurant = restaurantLocations[i];
            var restaurantLatLng = new google.maps.LatLng(restaurant.lat, restaurant.lng);

            var restaurantMarker = new google.maps.Marker({
                position: restaurantLatLng,
                map: map,
                title: restaurant.name,
            });
        }
    }

    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>
  
    @endsection


  