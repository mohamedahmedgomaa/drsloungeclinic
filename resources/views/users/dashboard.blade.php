@extends('users.layout.index')

@section('title', trans('users.drslounge') )

@section('content')

    {{--    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">--}}
    {{--        <div class="carousel-inner">--}}
    {{--            <div class="carousel-item active">--}}
    {{--                <img src="{{asset('user')}}/assets/images/websiteClinic.jpg">--}}

    {{--                --}}{{--                <div class="container">--}}
    {{--                --}}{{--                    <div class="carousel-caption text-start">--}}
    {{--                --}}{{--                        <h1>Example headline.</h1>--}}
    {{--                --}}{{--                        <p>Some representative placeholder content for the first slide of the carousel.</p>--}}
    {{--                --}}{{--                        <p><a class="btn btn-lg btn-primary" href="#">Sign up today</a></p>--}}
    {{--                --}}{{--                    </div>--}}
    {{--                --}}{{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </div>--}}

    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing" id="about-us">

        <div class="row mt-5">

            <div class="col-md-4">
                <img src="{{asset('user')}}/assets/images/ClinicLogo.png" width="100%" height="100%" alt=""
                     class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">

            </div>
            <div class="col-md-7 offset-md-1 order-md-2">
                <h6 style="margin-top: 50px;color:#f65f7f">{{ trans('users.aboutUs') }}</h6>
                <h4>{{ trans('users.Drslounge clinic specialized in laser, non-surgical body contorting and dermatology, "Feel different” is our slogan at Drslounge clinic , we always strive to provide our customers with the highest standards of quality by providing the latest technology equipment.') }}</h4>
            </div>
        </div>

        <hr class="featurette-divider" id="book-now">

        <div class="row featurette">
            <div class="col-md-6" style="text-align: center">
                <h2 style="font-size: 90px;font-weight: 900;margin: 132px 0;">{{ trans('users.bookNow') }}</h2>
            </div>

            <div class="col-md-6">

                <livewire:user.form-book/>

                <div class="mt-5 mb-5 text-center">
                    <h5>{{ trans('users.Book your appointment by submitting the form, for more information contact our customer service.') }}
                        <a href="tel:0114097260">011<span class="p-1"></span>409<span class="p-1"></span>7260</a></h5>
                </div>
                <div class="mt-5 mb-5 text-center ">
                    <h5>{{ trans('users.visit us') }} : <a class="text-decoration-underline" target="_blank"
                                                           href="https://goo.gl/maps/gTRmT1KBX7a1MyH19">{{trans('users.Al Yasmin, thumamah road intersection with king abdulaziz, Riyadh 13322.')}}</a>
                    </h5>
                </div>
            </div>
        </div>


        <hr class="featurette-divider" id="products">

        <div class="row text-center">
            @foreach($products as $product)
                <div class="card col-lg-3 col-md-4 col-sm-12" style="border: none;padding: 0 5px">
                    {{ Html::image('images/products/' . $product->image, 'img', ['class' => 'card-img-top']) }}
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <h6 class="card-text">{{ $product->price }} SAR</h6>
                        {{--                        <p class="card-text">{{ $product->description }}</p>--}}
                    </div>
                    <div class="card-body">
                        <livewire:user.add-to-cart :wire:key="$product->id" :productId="$product->id"/>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    <hr class="featurette-divider" id="services">

    <div class="container">

        <div class="row text-center">
            <h1 class="mb-5"><strong>{{ trans('users.ourServices') }}</strong></h1>
            @foreach($ourServices as $ourService)
                <div class="card col-md-4 col-sm-12" style="border: none;padding: 0 5px">
                    {{ Html::image('images/ourServices/' . $ourService->image, 'img', ['class' => 'card-img-top']) }}
                    <div class="card-body">
                        <h4 class="card-title">{{ $ourService->name }}</h4>
                        <hp class="card-text">{{ $ourService->description }}</hp>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


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
