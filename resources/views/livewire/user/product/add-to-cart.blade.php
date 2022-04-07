<div class="row ml-2 mr-2">
    @if (session()->has('message'))
        <div class="alert alert-success" style="padding-left: 30px;margin: 0 12px 12px 12px;">
            {{ session('message') }}<a href="{{ route('user.cart') }}" class="btn btn-primary">{{ trans('users.viewCart') }}</a>
        </div>
    @endif
    <div class="col-12 product-description border-product pl-2 pr-2">

        <div class="mb-3 pl-3" style="padding-left: 20px">
            {!! Form::label('qty', trans('users.qty'), ['class' => 'form-label'] ) !!}
            {!! Form::number('qty', null, ['class' => 'form-control', 'placeholder' => trans('users.qty'), 'wire:model' => 'qty', 'min'=> '1']) !!}
            @error('qty')
            <p class="text-center text-danger ">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="product-buttons" style="padding-left: 30px">
{{--        <livewire:customer-product.cart.add-to-basket-button :wire:key="$product->id"--}}
{{--                                                             :productId="$product->id"/>--}}
                <a wire:loading.attr="disabled" wire:click="add" href="javascript:void(0)"
                   class="btn btn-success w-100">{{ trans('users.addToCart') }}</a>
    </div>
</div>

