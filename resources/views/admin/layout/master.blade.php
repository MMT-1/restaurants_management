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
$('#latitude').val('');
$('#longitude').val('');
// This example adds a search box to a map, using the Google Place Autocomplete
// feature. People can enter geographical searches. The search box will return a
// pick list containing a mix of places and predicted search terms.
// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
function initAutocomplete() {
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 24.740691, lng: 46.6528521 },
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    var input = document.getElementById('location');
    var searchBox = new google.maps.places.SearchBox(input);

    // Bias the search box results towards current map's viewport.
    map.addListener('bounds_changed', function() {
        searchBox.setBounds(map.getBounds());
    });

    var markers = [];
    // Listen for the event fired when the user selects a prediction and retrieve
    // more details for that place.
    searchBox.addListener('places_changed', function() {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
            return;
        }




        // Clear out the old markers.
        markers.forEach(function(marker) {
            marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function(place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
                map: map,
                icon: icon,
                title: place.name,
                position: place.geometry.location
            }));

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });
        map.fitBounds(bounds);

        console.log("test11")
    });
}



</script>
</body>

</html>
