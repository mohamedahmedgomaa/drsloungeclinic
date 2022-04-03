<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Carousel Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">


    <!-- Bootstrap core CSS -->
    <link href="{{asset('user')}}/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <style>
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


    <!-- Custom styles for this template -->
    <link href="{{asset('user')}}/assets/dist/css/carousel.css" rel="stylesheet">

    @livewireStyles
</head>
<body style="color: #000">

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">DrsLounge Clinic</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#book-now">Book Now</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('user')}}/assets/images/websiteClinic.jpg">

                {{--                <div class="container">--}}
                {{--                    <div class="carousel-caption text-start">--}}
                {{--                        <h1>Example headline.</h1>--}}
                {{--                        <p>Some representative placeholder content for the first slide of the carousel.</p>--}}
                {{--                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>

        </div>

    </div>


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

        <hr class="featurette-divider">

        <div class="row featurette" id="book-now">
            <div class="col-md-6">

                <livewire:user.form-book/>

                <div class="mt-5 mb-5 text-center">
                    <h5>Book your appointment by submitting the form, for more information contact our customer service
                        <a href="tel:0114097260">011 409 7260</a> .</h5>
                </div>
                <div class="mt-5 mb-5 text-center ">
                    <h5>visit us : <a class="text-decoration-underline" target="_blank"
                                      href="https://goo.gl/maps/gTRmT1KBX7a1MyH19">Al Yasmin, thumamah road intersection
                            with king abdulaziz, Riyadh 13322.</a></h5>
                </div>
            </div>
            <div class="col-md-6" style="text-align: center">
                <h2 style="font-size: 90px;font-weight: 900;margin: 132px 0;">BOOK NOW</h2>
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row">
            <div class="col-md-7 offset-md-1 order-md-2">
                <p style="margin-top: 50px">ABOUT US</p>
                <h2 style="font-size: 50px">Not just a unique experience it is a lifestyle.</h2>
                <p class="lead">We are Drslounge Clinic. The idea was not to establish a beauty center only, but rather
                    to become a prestigious center that gives its customers a sense of
                    privilege which provides high end services.</p>

            </div>
            <div class="col-md-4 order-md-1">
                {{--                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500"--}}
                {{--                     height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500"--}}
                {{--                     preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>--}}
                {{--                    <rect width="100%" height="100%" fill="#eee"/>--}}
                {{--                    <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text>--}}
                {{--                </svg>--}}
                <img src="{{asset('user')}}/assets/images/ClinicLogo.png" width="100%" height="100%" alt=""
                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">

            </div>
        </div>

        <hr class="featurette-divider">

        <div id="accordion" class="row featurette">
            <div class="col-md-8 offset-md-2 col-sm-12" style="border: 5px outset #F65F7F;padding: 30px;">
                <h6 class="our_services" style="">
                    OUR SERVICES </h6>
                <h2 class="services">SERVICES</h2>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
                            Splendor X
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p>Perfect for all skin colors: Splendor X is suitable for all skin tones that are light,
                                dark
                                and sunny and it is the first device in the world that allows sessions to be conducted
                                directly with the presence of (tan) without the need to wait for long days until the
                                skin
                                returns to normal before sunning</p>
                            <h4>Fewer sessions and more effectiveness without frills</h4>
                            <p>It uses square laser technology to ensure you receive an effective, comfortable, fast and
                                safe hair removal treatment unlike any other device eve</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
                            WITHOUT PAIN OR BURN
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p>Splendor X features Dual Cooling System (DCS): a feature that combines cooled air with a
                                cooling head to protect your skin and ensure a comfortable treatment unlike stinging gas
                                cooling.</p>
                            <p>Square laser feature: Square laser technology protects you from repeated burns and
                                guarantees
                                you larger treatment areas, which makes you do not need longer sessions and saves you
                                from
                                frills sessions, with Splendor you will find greater effectiveness and guaranteed
                                results</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
                            Carbon Laser
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            It is one of the techniques used to peel the skin, clean it, which enhance freshness and
                            produce
                            Collagen in safe way
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
                            Treatments used by Carbon Laser
                        </a>
                    </div>
                    <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p>Carbon laser treats many different skin problems, including:</p>
                            <ul>
                                <li>Winkler</li>
                                <li>Large pores</li>
                                <li>Skin pigmentation</li>
                                <li>Scares</li>
                                <li>acne scars</li>
                                <li>Viral warts</li>
                                <li>Stretch marks</li>
                                <li>Brown spots and freckles</li>
                                <li>Pigmentation and melasma</li>
                                <li>Laser tattoo removal</li>
                            </ul>
                            <p>A laser removes tattoos by breaking up the pigment colors using high-powered beams of
                                light</p>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFive">
                            Fractional
                        </a>
                    </div>
                    <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p>It helps in tightening the skin, stimulating collagen to
                                rejuvenate, tighten the skin, treat pigmentation, and more.</p>
                            <ul>
                                <li>Hide the effects of acne scars</li>
                                <li>Treating scars and pits resulting from any injury, surgery or cosmetic surgery that
                                    was performed earlier.
                                </li>
                                <li>Treating drooping eyelids.</li>
                                <li>Peeling the face to remove dead skin,renew the face for fresher skin layer.</li>
                                <li>Reducing the degree of pigmentation, discoloration of the skin, and dark and brown
                                    spots that appear on the skin
                                </li>
                                <li>Fractional laser helps in treating the pregnancy mask, which is a change in the
                                    mother’s chromosomes during pregnancy, where sometimes causes the appearance of dark
                                    spots on her face.
                                </li>
                                <li>Reduce the effects of sunburn on the face</li>
                                <li>Reduce the effects of stretch marks in the body.</li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header">
                        <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseSex">
                            Filler
                        </a>
                    </div>
                    <div id="collapseSex" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <p>It helps in tightening the skin, stimulating collagen to
                                rejuvenate, tighten the skin, treat pigmentation, and more.</p>
                            <ul>
                                <li>Hide the effects of acne scars</li>
                                <li>Treating scars and pits resulting from any injury, surgery or cosmetic surgery that
                                    was performed earlier.
                                </li>
                                <li>Treating drooping eyelids.</li>
                                <li>Peeling the face to remove dead skin,renew the face for fresher skin layer.</li>
                                <li>Reducing the degree of pigmentation, discoloration of the skin, and dark and brown
                                    spots that appear on the skin
                                </li>
                                <li>Fractional laser helps in treating the pregnancy mask, which is a change in the
                                    mother’s chromosomes during pregnancy, where sometimes causes the appearance of dark
                                    spots on her face.
                                </li>
                                <li>Reduce the effects of sunburn on the face</li>
                                <li>Reduce the effects of stretch marks in the body.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div><!-- /.container -->


    <div class="row featurette" id="book-now"
         style="background-image: url('{{asset('user')}}/assets/images/websiteClinic22.jpg');padding: 100px 0;margin: 80px 0;background-position: -800px -25px;">
        <div class="col-md-6" style="text-align: center">
            <h2 style="font-size: 90px;font-weight: 900">Our Staff</h2>
        </div>

        <div class="col-md-6">
            <p class="lead">We have provided specialized medical personnel in the field of health and cosmetic care with
                knowledgeable skills to provide high quality cosmetic medical services and help to raise the level
                of cosmetic health awareness among clients.</p>
        </div>
    </div>

    <div style="width: 100%;margin-bottom: 100px">
        <iframe
            src="https://maps.google.com/maps?q=Al%20Yasmin%2C%20thumamah%20road%20intersection%20with%20king%20abdulaziz%2C%20Riyadh%2013322&t=m&z=17&output=embed&iwloc=near"
            width="100%" height="400" frameborder="0" style="border:0"></iframe>
    </div>

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
                        <h5><span class="fw-bolder">Email :</span> <a href="mailto:info@drsloungeclinic.com">info@drsloungeclinic.com</a>
                        </h5>
                        <h5><span class="fw-bolder">Address : </span><a target="_blank"
                                                                        href="https://goo.gl/maps/gTRmT1KBX7a1MyH19"> Al
                                Yasmin, thumamah road intersection with king abdulaziz, Riyadh 13322. </a></h5>
                        <h5><span class="fw-bolder">Phone :</span> <a href="tel:0114097260">011 409 7260</a></h5>
                    </div>
                </div>

                <div class="col-md-5 offset-md-1">
                    <h2 style="font-size: 24px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;">
                        NEWSLETTER</h2>
                    <p>Sign up for subscribe out newsletter!</p>

                    <livewire:user.subscribe/>

                    <h2 style="font-size: 24px;font-weight: 300;text-transform: uppercase;letter-spacing: 4px;margin-top: 100px">
                        FOLLOW US</h2>
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
</main>




<script src="{{asset('user')}}/assets/dist/js/bootstrap.bundle.min.js"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@include('users.includes.layout.models')

@livewireScripts

</body>
</html>
