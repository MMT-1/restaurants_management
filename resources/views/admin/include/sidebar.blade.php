@php $url=Route::currentRouteName();  @endphp
<div class="left main-sidebar">
    <div class="sidebar-inner leftscroll">
        <div id="sidebar-menu">
            <ul>
                <li class="submenu">
                    <a class="@if($url==='admin.dashboard') active @endif" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-bars"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='customers.index' || $url==='customers.create' || $url==='customers.edit') active @endif" href="#">
                        <i class="fas fa-user"></i>
                        <span> Customer </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('customers.index')}}">List</a>
                        </li>
                        <li>
                            <a href="{{route('customers.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='owners.index' || $url==='owners.create' || $url==='owners.edit') active @endif" href="#">
                        <i class="fas fa-user"></i>
                        <span>Owner</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='owners.index') active @endif">
                            <a href="{{route('owners.index')}}">List</a>
                        </li>
                        <li class="@if($url==='owners.create') active @endif">
                            <a href="{{route('owners.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>
                
                <li class="submenu">
                    <a id="tables" class="@if($url==='foods.index' || $url==='foods.create' || $url==='foods.edit') active @endif" href="#">
                        <i class="fab fa-product-hunt"></i>
                        <span> Food </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='foods.index') active @endif">
                            <a href="{{route('foods.index')}}">List</a>
                        </li>
                        <li class="@if($url==='foods.create') active @endif">
                            <a href="{{route('foods.create')}}">Add New</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Stock</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Food Review</a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">Food Wishlist</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fab fa-first-order-alt"></i>
                        <span>Order</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-money-bill-alt"></i>
                        <span>Customer Payment</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="tables-basic.html">List</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='categories.index' || $url==='categories.create' || $url==='categories.edit') active @endif" href="#">
                        <i class="fas fa-certificate"></i>
                        <span>Category</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='categories.index') active @endif">
                            <a href="{{route('categories.index')}}">List</a>
                        </li>
                        <li class="@if($url==='categories.create') active @endif">
                            <a href="{{route('categories.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='brands.index' || $url==='brands.create' || $url==='brands.edit') active @endif" href="#">
                        <i class="fab fa-bandcamp"></i>
                        <span>Brand</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='brands.index') active @endif">
                            <a href="{{route('brands.index')}}">List</a>
                        </li>
                        <li class="@if($url==='brands.create') active @endif">
                            <a href="{{route('brands.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                <li class="submenu">
                    <a id="tables" class="@if($url==='attributes.index' || $url==='attributes.create' || $url==='attributes.edit') active @endif" href="#">
                        <i class="fab fa-vaadin"></i>
                        <span>Attribute</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li class="@if($url==='attributes.index') active @endif">
                            <a href="{{route('attributes.index')}}">List</a>
                        </li>
                        <li class="@if($url==='attributes.create') active @endif">
                            <a href="{{route('attributes.create')}}">Add New</a>
                        </li>
                    </ul>
                </li>

                

                <li class="submenu">
                    <a id="tables" href="#">
                        <i class="fas fa-user"></i>
                        <span>Activity Logs</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{route('activity.logs')}}">List</a>
                        </li>
                    </ul>
                </li>

              

                <li class="submenu">
                    <li class="submenu">
                        <a href="{{route('logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>
                            <span> Logout </span>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>