  <!-- Header Start -->
  <div class="header-area">
    <div class="main-header ">
        <div class="header-top d-none d-lg-block">
            <!-- Left Social -->
            <div class="header-left-social">

            </div>
            <div class="container">
                <div class="col-xl-12">

                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <!-- Logo -->
            <div class="logo d-none d-lg-block">
                <a href="index.html"><img src="{{ asset('template-admin/dist/assets/img/logo.png') }}" alt="" width="38px"></a>
            </div>
            <div class="container">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo logo2 d-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('template-admin/dist/assets/img/logo.png') }}" alt="" width="38px"></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{ route('userDashboard') }}">Home</a></li>

                                <li><a href="#">Akun</a>
                                    <ul class="submenu">
                                        @auth
                                        <li><a href="{{ route('Userlogout') }}">Logout</a></li>
                                        @else
                                        <li><a href="{{ route('Userlogin') }}">Login</a></li>
                                        @endauth
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                    <!-- Header-btn -->
                    {{-- <div class="header-search d-none d-lg-block">
                        <form action="#" class="form-box f-right ">
                            <input type="text" name="Search" placeholder="Search Courses">
                            <div class="search-icon">
                                <i class="fas fa-search special-tag"></i>
                            </div>
                        </form>
                    </div> --}}
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header End -->
