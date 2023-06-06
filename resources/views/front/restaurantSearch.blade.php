@extends('front.layout.master')

@section('content')










<style>
   .cardul .card {
  box-shadow: 0 0px 1px rgba(0, 0, 0, 0.1), 0 2px 2px rgba(0, 0, 0, 0.1);
  background: #fff;
  border-radius: 5px;
  display: flex;
  flex-direction: column;
}
.cardul .card .card-body {
  display: flex;
  flex-flow: row wrap;
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
  width: 100%;
  height: 300px;
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
    max-width: 390px;
    max-height: 279px;
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
  border: 1px solid #E0E0E0;
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

</style>







<input type="hidden" id="latitudeInput" name="latitude" value="{{ request()->get('latitude') }}">
<input type="hidden" id="longitudeInput" name="longitude" value="{{ request()->get('longitude') }}">

<div class="container">
    <div class="row ">
    
        <div class="col-md-8">
            <ul class="cardul">
        
                @if ($Restaurants->count() > 0)
                @foreach ($Restaurants as $restaurant)
                <li class="card">
                    <a 
                        href="#" 
                        class="featured-image" 
                        style='background-image:url("{{ asset('owner/restaurant/' . $restaurant->logo) }}")'>
                    </a>
                    <article class="card-body">
                        <header>
                            <a href="utilidata-national-governors-association-meeting">
                                <span class="pre-heading">Blog</span>
                                <div class="title">
                                    <h3>{{ $restaurant->restaurant_name }}</h3>
                                </div>
                                <p class="meta">
                                    <span class="author">Utilidata</span>
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


  