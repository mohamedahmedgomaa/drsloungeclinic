@extends('users.layout.index')

@section('title', trans('users.drslounge') )

@section('content')

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

        <hr class="featurette-divider" id="book-now">

        <div class="row featurette">
            <div class="col-md-6">

                <livewire:user.form-book/>

                <div class="mt-5 mb-5 text-center">
                    <h5>{{ trans('users.Book your appointment by submitting the form, for more information contact our customer service.') }}
                        <a href="tel:0114097260">011 409 7260</a></h5>
                </div>
                <div class="mt-5 mb-5 text-center ">
                    <h5>{{ trans('users.visit us') }} : <a class="text-decoration-underline" target="_blank"
                                                           href="https://goo.gl/maps/gTRmT1KBX7a1MyH19">{{trans('users.Al Yasmin, thumamah road intersection with king abdulaziz, Riyadh 13322.')}}</a>
                    </h5>
                </div>
            </div>
            <div class="col-md-6" style="text-align: center">
                <h2 style="font-size: 90px;font-weight: 900;margin: 132px 0;">{{ trans('users.bookNow') }}</h2>
            </div>
        </div>


        <hr class="featurette-divider" id="products">

        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner text-center">
                <div class="carousel-item active mb-5">
                    <div class="row">

                        @foreach($products as $product)
                            <div class="card col-md-4 col-sm-12" style="border: none;padding: 0 50px">
                                {{ Html::image('images/products/' . $product->image, 'img', ['class' => 'card-img-top']) }}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h6 class="card-text">{{ $product->price }} SAR</h6>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('user.product',$product->id) }}" class="card-link btn btn-outline-dark">view</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item mb-5">
                    <div class="row">
                        @foreach($productsLast as $product)
                            <div class="card col-md-4 col-sm-12" style="border: none;padding: 0 50px">
                                {{ Html::image('images/products/' . $product->image, 'img', ['class' => 'card-img-top']) }}
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <h6 class="card-title">{{ $product->price }} SAR</h6>
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('user.product',$product->id) }}" class="card-link btn btn-outline-dark">view</a>
                                    <a href="#" class="card-link">Another link</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{--                <div class="carousel-item mb-5">--}}
                {{--                    <div class="row">--}}

                {{--                        <div class="card text-center col-md-3 col-sm-12">--}}
                {{--                            <img src="..." class="card-img-top" alt="...">--}}
                {{--                            <div class="card-body">--}}
                {{--                                <h5 class="card-title">Card title</h5>--}}
                {{--                                <p class="card-text">Some quick example text to build on the card title and make up the--}}
                {{--                                    bulk of the card's content.</p>--}}
                {{--                            </div>--}}
                {{--                            <ul class="list-group list-group-flush">--}}
                {{--                                <li class="list-group-item">An item</li>--}}
                {{--                                <li class="list-group-item">A second item</li>--}}
                {{--                                <li class="list-group-item">A third item</li>--}}
                {{--                            </ul>--}}
                {{--                            <div class="card-body">--}}
                {{--                                <a href="#" class="card-link">Card link</a>--}}
                {{--                                <a href="#" class="card-link">Another link</a>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}

                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <button class="carousel-control-prev mt-5" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next mt-5" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>


        <hr class="featurette-divider" id="about-us">

        <div class="row">
            <div class="col-md-7 offset-md-1 order-md-2">
                <p style="margin-top: 50px">{{ trans('users.aboutUs') }}</p>
                <h2 style="font-size: 50px">{{ trans('users.Not just a unique experience it is a lifestyle.') }}</h2>
                <p class="lead">{{ trans('users.We are Drslounge Clinic. The idea was not to establish a beauty center only, but rather to become a prestigious center that gives its customers a sense of privilege which provides high end services.') }}</p>

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

        <hr class="featurette-divider" id="services">

        <div id="accordion" class="row featurette">
            <div class="col-md-8 offset-md-2 col-sm-12" style="border: 5px outset #F65F7F;padding: 30px;">
                <h6 class="our_services" style="">
                    {{ trans('users.ourServices') }}</h6>
                <h2 class="services">{{ trans('users.services') }}</h2>

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

    <div id="our-staff"></div>

    <div class="row featurette" id="book-now"
         style="background-image: url('{{asset('user')}}/assets/images/websiteClinic22.jpg');padding: 100px 0;margin: 80px 0 10px;background-position: -800px -25px;">
        <div class="col-md-6" style="text-align: center">
            <h2 style="font-size: 90px;font-weight: 900">{{ trans('users.ourStaff') }}</h2>
        </div>

        <div class="col-md-6">
            <p class="lead">{{ trans('users.We have provided specialized medical personnel in the field of health and cosmetic care with knowledgeable skills to provide high quality cosmetic medical services and help to raise the level of cosmetic health awareness among clients.') }}</p>
        </div>
    </div>

    <div style="width: 100%;margin-bottom: 10px">
        <iframe
            src="https://maps.google.com/maps?q=Al%20Yasmin%2C%20thumamah%20road%20intersection%20with%20king%20abdulaziz%2C%20Riyadh%2013322&t=m&z=17&output=embed&iwloc=near"
            width="100%" height="400" frameborder="0" style="border:0"></iframe>
    </div>

@endsection
