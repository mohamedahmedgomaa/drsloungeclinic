<header>
    <style>
        .navbarMobile {
            display: none;
        }
        @media (max-width: 768px) {
            .navbarMobile {
                display: block;
            }
            .navbarWeb {
                display: none;
            }
            /*body {*/
            /*    padding-top: 0;*/
            /*}*/
        }
    </style>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white navbarWeb" style="color: #000">
        <div class="container-fluid">
            {{--            <a class="btn btn-block" href="{{ url('/') }}"><h3></h3></a>--}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0 navbarCenter">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                           style="text-decoration: underline;color: #f65f7f;font-weight: bold"
                           href="{{ url('/') }}">{{ trans('users.home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-block" style="text-decoration: underline;color: #f65f7f;font-weight: bold"
                           href="#about-us">{{ trans('users.aboutUs') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-block" style="text-decoration: underline;color: #f65f7f;font-weight: bold"
                           href="#book-now">{{ trans('users.bookNow') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-block" style="text-decoration: underline;color: #f65f7f;font-weight: bold"
                           href="#services">{{ trans('users.services') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-block" style="text-decoration: underline;color: #f65f7f;font-weight: bold"
                           href="#our-staff">{{ trans('users.ourStaff') }}</a>
                    </li>

                </ul>
                <ul class="d-flex mb-2 mb-md-0 navbar-nav">
                    @if(Config::get('app.locale') == "ar")
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ url('en') }}">{{ trans('users.en') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-outline-dark" href="{{ url('ar') }}">{{ trans('users.ar') }}</a>
                        </li>
                    @endif
                    <li class="nav-item basketMobile">
                        <livewire:user.product.basket-button/>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{--     NavBar Mobile --}}
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-white navbarMobile">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">{{ trans('users.home') }}</a>

            <div class="d-flex">
                @if(Config::get('app.locale') == "ar")
                        <a class="btn btn-outline-dark" href="{{ url('en') }}">{{ trans('users.en') }}</a>
                @else
                        <a class="btn btn-outline-dark" href="{{ url('ar') }}">{{ trans('users.ar') }}</a>
                @endif
                <livewire:user.product.basket-button/>
            </div>
        </div>
    </nav>
</header>
