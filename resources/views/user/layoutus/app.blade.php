<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title> PERTAL </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="{{ asset('template-admin/dist/assets/img/logo.png') }}">

	<!-- CSS here -->
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('template-user/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template-user/assets/css/gijgo.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/animate.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/magnific-popup.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/fontawesome-all.min.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/themify-icons.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/nice-select.css') }}">
	<link rel="stylesheet" href="{{ asset('template-user/assets/css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

</head>
<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset('template-user/assets/img/logo/loder.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header>
      @include('user.layoutus.header')
    </header>

    <main>
       @yield('content')
    </main>
    <footer>
      @include('user.layoutus.footer')
    </footer>
    <!-- Scroll Up -->
    <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->

    <script src="{{ asset('template-user/assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('template-user/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/bootstrap.min.js') }}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('template-user/assets/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('template-user/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/slick.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('template-user/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/animated.headline.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/jquery.magnific-popup.js') }}"></script>

    <!-- Date Picker -->
    <script src="{{ asset('template-user/assets/js/gijgo.min.js') }}"></script>
    <!-- Nice-select, sticky -->
    <script src="{{ asset('template-user/assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/jquery.sticky.js') }}"></script>

    <!-- counter , waypoint -->
    <script src="{{ asset('template-user/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/waypoints.min.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('template-user/assets/js/contact.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/jquery.form.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/mail-script.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('template-user/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template-user/assets/js/main.js') }}"></script>

    </body>
</html>
