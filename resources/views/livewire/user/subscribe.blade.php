<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    {!! Form::open(['url' => '#', 'wire:submit.prevent' => "subscribe",'method' => 'post']) !!}
    <div class="input-group mb-3">
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('users.email'), 'wire:model' => 'email']) !!}
        {!! Form::submit(trans('users.subscribe'), ['class' => 'btn btn-outline-danger']) !!}
    </div>
    @error('email')
    <p class="text-center text-danger ">{{ $message }}</p>
    @enderror
    {!! Form::close() !!}
</div>
