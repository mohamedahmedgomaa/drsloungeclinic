<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            @if(Cart::count() != 0)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">{{ trans('users.cart') }}
                                - {{ Cart::count() }} {{ trans('users.services') }}</h5>
                        </div>
                        @foreach($this->basket as $product)

                            <div class="card-body">
                                <!-- Single item -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                        <!-- Image -->
                                        <div class="bg-image hover-overlay hover-zoom ripple rounded"
                                             data-mdb-ripple-color="light">
                                            <a href="{!! URL::route('user.product', $product->id) !!}">
                                                {!! Html::image('images/products/'.$product->options->image, $product->name, ['class'=>'w-100']) !!}
                                            </a>

                                        </div>
                                        <!-- Image -->
                                    </div>

                                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                        <!-- Data -->
                                        <p><strong><a
                                                    href="{!! URL::route('user.product', $product->id) !!}">{!! $product->name !!}</a></strong>
                                        </p>
                                        <p>
                                            <strong>{{ $product->price }} SAR</strong>
                                            @if($product->options->price_before_discount != null)
                                                <span
                                                    class="text-danger text-decoration-line-through h6">{{ $product->options->price_before_discount }} SAR</span>
                                            @endif
                                        </p>
                                        <button type="button" wire:click="remove('{{ $product->rowId }}')"
                                                class="btn btn-danger btn-sm me-1 mb-2"
                                                data-mdb-toggle="tooltip" wire:loading.attr="disabled"
                                                title="Remove item">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    {{--                                    <button type="button" class="btn btn-danger btn-sm mb-2" data-mdb-toggle="tooltip"--}}
                                    {{--                                            title="Move to the wish list">--}}
                                    {{--                                        <i class="fas fa-heart"></i>--}}
                                    {{--                                    </button>--}}
                                    <!-- Data -->
                                    </div>

                                    <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                        <!-- Quantity -->
                                        <div class="d-flex mb-4" style="max-width: 300px">
                                            <button class="btn btn-primary px-3 me-2" wire:loading.attr="disabled"
                                                    wire:click="decrease('{{ $product->rowId }}', {{ $product->qty }})"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                            <div class="form-outline">
                                                <input id="form1" min="0" value="{{ $product->qty }}" type="number"
                                                       disabled="disabled"
                                                       class="form-control" style="min-width: 50px;"/>
                                                <label class="form-label"
                                                       for="form1">{{ trans('users.quantity') }}</label>
                                            </div>

                                            <button class="btn btn-primary px-3 ms-2" wire:loading.attr="disabled"
                                                    wire:click="increase('{{ $product->rowId }}', {{ $product->qty }})"
                                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                        <!-- Quantity -->

                                        <!-- Price -->
                                        <p class="text-start text-md-center">
                                            <strong>{{ $product->qty * $product->price }} SAR</strong>
                                        </p>
                                        <!-- Price -->
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header py-3">
                            <h5 class="mb-0">{{ trans('users.bookAppointment') }}</h5>
                        </div>
                        <div class="card-body">

                            <div>
                                @if (session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif
                            </div>

                            {!! Form::open(['url' => '#', 'wire:submit.prevent' => "bookCart",'method' => 'post']) !!}

                            <div class="mb-3">
                                {!! Form::label('name', trans('users.name'), ['class' => 'form-label']) !!}<span
                                    style="color: red;font-size: 20px;">*</span>
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('users.name'),  'wire:model' => 'name']) !!}
                                @error('name')
                                <p class="text-center text-danger ">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                {!! Form::label('phone', trans('users.phone'), ['class' => 'form-label']) !!}<span
                                    style="color: red;font-size: 20px;">*</span>
                                {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('users.phone'), 'wire:model' => 'phone']) !!}
                                @error('phone')
                                <p class="text-center text-danger ">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                {!! Form::label('email', trans('users.email'), ['class' => 'form-label'] ) !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('users.email'), 'wire:model' => 'email']) !!}
                                @error('email')
                                <p class="text-center text-danger ">{{ $message }}</p>
                                @enderror
                            </div>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item d-flex justify-content-between align-items-center px-0"></li>
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                    <div>
                                        <strong>{{ trans('users.totalAmount') }}</strong>
                                    </div>
                                    <span><strong>{{ Cart::subTotal() }} SAR</strong></span>
                                </li>
                            </ul>
                            <div class="mb-3">
                                {!! Form::submit(trans('users.submit'), ['class' => 'btn btn-primary w-100 mt-3','wire:loading.attr'=>"disabled" ,'wire:target'=>"bookCart"]) !!}
                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger">{{ trans('users.cartEmpty') }}</div>
            @endif
        </div>
    </div>
</section>

