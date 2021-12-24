<!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index.html"><img src="{{ asset('image/Logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <!-- CUSTOMER -->
                    <!-- Ini digunakan untuk mengecek apakah user dalam posisi guest atau mempunyai role CUSTOMER -->
                    @if (Auth::guest() || Auth::user()->getRoleNames()->first() == 'CUSTOMER')
                        <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}"><a class="nav-link" href="{{ route('dashboard') }}">Home</a></li> 
                        <li class="nav-item {{ Request::path() == 'about' || Request::is('about*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                        <li class="nav-item {{ Request::path() == 'booking' || Request::is('booking/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('booking') }}">Booking</a></li>
                        <li class="nav-item {{ Request::path() == 'gallery' || Request::is('gallery/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('gallery') }}">Gallery</a></li>
                        <li class="nav-item {{ Request::path() == 'contact' || Request::is('contact/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact Us</a></li>
                    @endif
                    
                    @role('CUSTOMER')
                        <li class="nav-item {{ Request::path() == 'booking-list' || Request::is('booking-list/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('booking-list') }}">Booking List</a></li>
                    @endrole

                    <!-- ADMIN -->
                    @role('ADMIN')
                        <li class="nav-item {{ Request::path() == 'admin/pengguna' || Request::is('admin/pengguna/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.pengguna.index') }}">Pengguna</a></li>
                        <li class="nav-item {{ Request::path() == 'admin/gallery' || Request::is('admin/gallery/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.gallery.index') }}">Gallery</a></li>
                        <li class="nav-item {{ Request::path() == 'admin/facility' || Request::is('admin/facility/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.facility.index') }}">Facility</a></li>
                        <li class="nav-item {{ Request::path() == 'admin/room' || Request::is('admin/room/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.room.index') }}">Room</a></li>
                        <li class="nav-item {{ Request::path() == 'admin/booking-list' || Request::is('admin/booking-list/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.booking-list.customer') }}">Booking List Customer</a></li>
                    @endrole


                    @guest
                        <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">Sign In</a></li>
                    @else
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="#" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a></li>
                            </ul>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endguest
                    
                </ul>
            </div> 
        </nav>
    </div>
</header>
<!--================Header Area =================-->