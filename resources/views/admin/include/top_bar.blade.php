<div class="headerbar">
    <!-- LOGO -->
    <div class="headerbar-left">
        <a href="index.html" class="logo">
            <img alt="Logo" src="{{asset('admin/assets/images/logo.png')}}" />
            <span>Dashboard</span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="list-inline float-right mb-0">
            
            <li class="list-inline-item dropdown notif">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('admin/assets/images/avatars/admin.png')}}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="text-overflow">
                            <small>Hello, {{auth()->user()->first_name}} {{auth()->user()->last_name}}</small>
                        </h5>
                    </div>
                    <!-- item-->
                    <a href="{{route('home.page')}}" class="dropdown-item notify-item">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('logout')}}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="dropdown-item notify-item">
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="fas fa-bars"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
<script>
    $(document).ready(function() {
    $('.dropdown-toggle').dropdown();
});

</script>