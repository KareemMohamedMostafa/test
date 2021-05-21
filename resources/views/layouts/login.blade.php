<!doctype html>

<html class="no-js " lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="description" content="It is really appropriate system for Doctors, Dentist, Hospitals, Health clinics, Surgeons and Medical organization">

    <title>Medical Appointments System</title>

    <link rel="icon" href="favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/authentication.css') }}" />

    <link rel="stylesheet" href="{{ URL::asset('css/color_skins.css') }}" />

</head>

<body class="theme-cyan authentication sidebar-collapse">

    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">

        <div class="container">

            <div class="navbar-translate n_logo">

                <a class="navbar-brand" href="" title="system">Medical Appointments System</a>

                <button class="navbar-toggler" type="button"> <span class="navbar-toggler-bar bar1"></span> <span class="navbar-toggler-bar bar2"></span> <span class="navbar-toggler-bar bar3"></span> </button>

            </div>

            <div class="navbar-collapse">

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link" title="Like us on Facebook" href="https://www.facebook.com/solucionessistenet" target="_blank"> <i class="zmdi zmdi-facebook"></i>

                            <p class="d-lg-none d-xl-none">Facebook</p>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" title="Follow us on Instagram" href="https://www.linkedin.com/company/solucionessistenet" target="_blank"> <i class="zmdi zmdi-linkedin"></i>

                            <p class="d-lg-none d-xl-none">LinkedIn</p>

                        </a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    <div class="page-header">

        <div class="page-header-image" style="background-image:url('images/login.jpg')"></div>

        <div class="container">

            <div class="col-md-12 content-center">

                <div class="logo-container"> <img src="{{ URL::asset('images/logo.png') }}" width="300"> </div>

                <div class="card-plain">

                    <div class="header">

                        @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif

                        @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif

                        @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif

                    </div>

                    @yield('content')

                </div>

            </div>

        </div>

    </div>

    <script src="{{ URL::asset('bundles/libscripts.bundle.js') }}"></script>

    <script src="{{ URL::asset('bundles/vendorscripts.bundle.js') }}"></script>

    <script>
        $(".navbar-toggler").on('click', function() {

            $("html").toggleClass("nav-open");

        });

        $('.form-control').on("focus", function() {

            $(this).parent('.input-group').addClass("input-group-focus");

        }).on("blur", function() {

            $(this).parent(".input-group").removeClass("input-group-focus");

        });
    </script>

</body>

</html>