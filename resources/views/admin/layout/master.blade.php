<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta name="description" content="Dashboard | Nura Admin">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Your website">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.ico')}}">
    <!-- heder start -->
    @include('admin.include.header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
  

</style>
    <!-- heder end -->
</head>

<body class="adminbody">

    <div id="main">

        <!-- top bar navigation -->
          @include('admin.include.top_bar')
        <!-- End top bar Navigation -->

        <!-- Left Sidebar -->
          @include('admin.include.sidebar')
        <!-- End Sidebar -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">

               @yield('content')

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->

         <!-- start footer -->
          @include('admin.include.footer')
         <!-- end footer -->

        <script src="{{asset('admin/assets/js/modernizr.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/moment.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('admin/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('admin/assets/js/detect.js')}}"></script>
        <script src="{{asset('admin/assets/js/fastclick.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('admin/assets/js/jquery.nicescroll.js')}}"></script>

        <!-- App js -->
        <script src="{{asset('admin/assets/js/admin.js')}}"></script>

    </div>
    <!-- END main -->

    <!-- BEGIN Java Script for this page -->
    <script src="{{asset('admin/assets/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>

    <!-- Counter-Up-->
    <script src="{{asset('admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('admin/assets/plugins/counterup/jquery.counterup.min.js')}}"></script>

    <!-- dataTabled data -->
    <script src="{{asset('admin/assets/data/data_datatables.js')}}"></script>

    <!-- Charts data -->
    <script src="{{asset('admin/assets/data/data_charts_dashboard.js')}}"></script>
    <script>
        $(document).on('ready', function() {
            // data-tables



            // counter-up
            $('.counter').counterUp({
                delay: 10,
                time: 600
            });
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6vplU0Ty7M1OQTJ3yhZBroOJ59i7bMpg&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
  $("#pac-input").focusin(function() {
    $(this).val('');
  });
  $('#latitude');
  $('#longitude');

  function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: { lat: 24.740691, lng: 46.6528521 },
      zoom: 13,
      mapTypeId: 'roadmap'
    });

    var input = document.getElementById('location');
    var searchBox = new google.maps.places.SearchBox(input);

    map.addListener('bounds_changed', function() {
      searchBox.setBounds(map.getBounds());
    });

    var marker;

    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();

      if (places.length == 0) {
        return;
      }

      // Clear existing marker, if any
      if (marker) {
        marker.setMap(null);
      }

      var bounds = new google.maps.LatLngBounds();
      places.forEach(function(place) {
        if (!place.geometry) {
          console.log("Returned place contains no geometry");
          return;
        }

        marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location,
          draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function() {
          var latLng = marker.getPosition();
          $('#latitude').val(latLng.lat());
          $('#longitude').val(latLng.lng());
          geocodeLatLng(latLng);
        });

        if (place.geometry.viewport) {
          bounds.union(place.geometry.viewport);
        } else {
          bounds.extend(place.geometry.location);
        }

        // Set initial latitude and longitude values
        var initialLatLng = marker.getPosition();
        $('#latitude').val(initialLatLng.lat());
        $('#longitude').val(initialLatLng.lng());
      });

      map.fitBounds(bounds);
    });

    // Reverse geocode to get address based on coordinates
    function geocodeLatLng(latLng) {
      var geocoder = new google.maps.Geocoder();
      geocoder.geocode({ 'location': latLng }, function(results, status) {
        if (status === 'OK') {
          if (results[0]) {
            var address = results[0].formatted_address;
            document.getElementById('location').value = address;
          } else {
            console.log('No results found');
          }
        } else {
          console.log('Geocoder failed due to: ' + status);
        }
      });
    }
  }
</script>


</body>

</html>
