<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('template-admin/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template-admin/dist/assets/modules/fontawesome/css/all.min.css') }}">


    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="{{ asset('template-admin/dist/assets/img/logo.png') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('template-admin/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('template-admin/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template-admin/dist/assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-3">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('template-admin/dist/assets/img/logo.png') }}" alt="logo"
                                width="100" class="shadow-light rounded-circle">PERTAL
                        </div>

                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible show fade mb-2">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('error') }}
                            </div>
                        </div>
                    @elseif (session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade mb-2">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                </button>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif

                        <div class="card card-error">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('postLogin') }}" method="post" class="needs-validation"
                                    novalidate="">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            masukkan email kamu
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            {{-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> --}}
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            masukkan password kamu
                                        </div>
                                    </div>

                                    {{-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> --}}
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </form>
                                {{-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div> --}}

                            </div>
                        </div>
                        {{-- <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="auth-register.html">Create One</a>
            </div> --}}
                        {{-- <div class="simple-footer">
              Copyright &copy; Pertal 2024
            </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('template-admin/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/js/stisla.js') }}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('script')

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('template-admin/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template-admin/dist/assets/js/custom.js') }}"></script>
</body>

</html>
