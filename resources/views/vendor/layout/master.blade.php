<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>@yield('title')</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('vendor/assets/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{asset('vendor/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link href="{{asset('vendor/assets/dist/css/style.min.css')}}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         @include('vendor.include.top_bar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
         @include('vendor.include.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
             @yield('content')
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            {{-- footer start --}}
             @include('vendor.include.footer')
            {{-- footer end --}}
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{asset('vendor/assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('vendor/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('vendor/assets/extra-libs/sparkline/sparkline.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{asset('vendor/assets/dist/js/waves.js')}}"></script>
    <!--Menu sidebar -->
    <script src="{{asset('vendor/assets/dist/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('vendor/assets/dist/js/custom.min.js')}}"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="{{asset('vendor/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/flot/jquery.flot.j')}}s"></script>
    <script src="{{asset('vendor/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('vendor/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('vendor/assets/dist/js/pages/chart/chart-page-init.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('admin/assets/data/data_datatables.js')}}"></script>



    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6vplU0Ty7M1OQTJ3yhZBroOJ59i7bMpg&libraries=places&callback=initAutocomplete" async defer></script>

    <script>
  $("#pac-input").focusin(function() {
    $(this).val('');
  });
  $('#latitude').val('');
  $('#longitude').val('');

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