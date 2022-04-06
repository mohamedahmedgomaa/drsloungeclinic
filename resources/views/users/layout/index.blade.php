<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>@yield('title')</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    @if(Config::get('app.locale') == "ar")
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap"
              rel="stylesheet">
    @endif

    @if(Config::get('app.locale') == "en")
    <!-- Custom styles for this template -->
        <link href="{{asset('user')}}/assets/dist/css/carousel.css" rel="stylesheet">
        <!-- Bootstrap core CSS -->
        <link href="{{asset('user')}}/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    @else
        <link href="{{asset('user')}}/assets/dist/css/carousel.rtl.css" rel="stylesheet">
        <link href="{{asset('user')}}/assets/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
        <style>
            body {
                direction: rtl;
            }

            .form-control {
                text-align: right;
                direction: rtl;
            }
        </style>
    @endif


    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        body {
            padding-bottom: 0;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }


        .services {
            font-size: 80px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-bottom: 30px;
        }

        .our_services {
            font-weight: 300;
            font-size: 17px;
            text-transform: uppercase;
            letter-spacing: 14px;
            margin-bottom: 5px;
            color: #F65F7F;
        }

        .icons {
            text-align: center;
            font-size: 25px;
        }

        .icons i {
            margin: 30px 20px 10px 20px;
        }

        .carousel-indicators [data-bs-target] {
            background-color: #000;
        }

        .navbar-dark .navbar-brand {
            color: #000;
        }
        .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .show>.nav-link {
            color: #000;
        }
        .navbar-dark .navbar-nav .nav-link {
            color: #000;
        }

        @media (max-width: 768px) {
            .services {
                font-size: 30px;
            }

            .our_services {
                font-size: 10px;
                letter-spacing: 4px;
            }

            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    @livewireStyles
</head>
<body style="color: #000">

@include('users.includes.layout.header')

<main style="min-height: 400px">

    @yield('content')

</main>
<!-- FOOTER -->
<div style="background: #000000;color:#ffffff;padding: 100px 0 30px 0">
    <footer class="container">
        <div class="row featurette" id="book-now"
        >
            <div class="col-md-6">
                <img src="{{asset('user')}}/assets/images/ClinicLogoAsset.png" alt=""
                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto"
                     style="width: 150px">
                <div class="mt-5">
                    <h5><span class="fw-bolder">{{ trans('users.email') }} :</span> <a
                            href="mailto:info@drsloungeclinic.com">info@drsloungeclinic.com</a>
                    </h5>
                    <h5><span class="fw-bolder">{{ trans('users.address') }} : </span><a target="_blank"
                                                                                         href="https://goo.gl/maps/gTRmT1KBX7a1MyH19">
                            Al
                            Yasmin, thumamah road intersection with king abdulaziz, Riyadh 13322. </a></h5>
                    <h5><span class="fw-bolder">{{ trans('users.phone') }} :</span> <a href="tel:0114097260">011 409
                            7260</a></h5>
                </div>
            </div>

            <div class="col-md-5 offset-md-1">
                <h2 style="font-size: 24px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;">
                    {{ trans('users.newsletter') }}</h2>
                <p>{{ trans('users.Sign up for subscribe out newsletter!') }}</p>

                <livewire:user.subscribe/>

                <h2 style="font-size: 24px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;margin-top: 100px">
                    {{ trans('users.followUs') }}</h2>
                <div class="icons mb-3">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-snapchat"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>


        </div>

        {{--        <p class="float-end"><a href="#">Back to top</a></p>--}}
        <div class="row text-center mt-5">
            <p>&copy; 2022. Made with love by Drslounge IT</p>
        </div>
    </footer>
</div>

<script src="{{asset('user')}}/assets/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

{{-- Subscribe Model in First Page --}}
{{--@include('users.includes.layout.models')--}}
{{-- Subscribe Model in First Page --}}


@livewireScripts

</body>
</html>
