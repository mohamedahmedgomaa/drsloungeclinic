<div class="row text-center">
    <div class="col-12 divAlertSuccess">
        @if (session()->has('message'))

            <script>
                livewire.on('add', () => {
                    Command: toastr["success"]("{{ session('message') }}")

                    toastr.options = {
                        "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                });
            </script>
        @endif
    </div>

    @foreach($products as $product)
        <div class="card col-lg-3 col-md-4 col-sm-12" style="border: none;padding: 0 5px">
            {{ Html::image('images/products/' . $product->image, 'img', ['class' => 'card-img-top']) }}
            <div class="card-body">
                <h3 class="card-title"><a class="text-dark" href="{!! URL::route('user.product', $product->id) !!}">{{ $product->name }}</a></h3>
                @if($product->productCampaigns()->where('status', 'active')->first() != null)
                    <h5 class="card-text">{{ $product->countDiscount() }} SAR
                        <span
                            class="text-danger text-decoration-line-through h6">{{ $product->price }} SAR</span>
                    </h5>
                @else
                    <h5 class="card-text">{{ $product->price }} SAR</h5>
                @endif
            </div>
            <div class="card-body">
                {{--                <livewire:user.add-to-cart :wire:key="$product->id" :productId="$product->id"/>--}}
                <div class="row">
                    <a wire:loading.attr="disabled" wire:click="add({{ $product->id }})" href="javascript:void(0)"
                       class="card-link btn btn-outline-danger w-100">{{ trans('users.addToCart') }}</a>

                </div>
            </div>
        </div>
    @endforeach

</div>
