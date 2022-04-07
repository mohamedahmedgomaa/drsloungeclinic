<div class="row">
    @if (session()->has('message'))
        <div class="alert alert-success" style="">
            {{ session('message') }}
        </div>
    @else
        <a wire:loading.attr="disabled" wire:click="add" href="javascript:void(0)"
           class="card-link btn btn-outline-danger w-100">{{ trans('users.addToCart') }}</a>
    @endif


</div>

