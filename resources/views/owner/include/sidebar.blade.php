@php $url=Route::currentRouteName();  @endphp

<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('owner.dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{route('owner.ownerProfile')}}" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                            class="hide-menu">Profile</span></a></li>
                         
                            


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('restaurant.foods') }}"><i class="mdi mdi-border-inside"></i><span
                            class="hide-menu">foods List</span></a></li>


                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('restaurant.foods.create') }}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                            class="hide-menu">Add New food</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('reservations') }}" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                            class="hide-menu">Reservations</span></a></li>

                
                
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>