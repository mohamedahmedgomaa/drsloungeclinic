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
        {!! Form::email('email', null, ['class' => 'form-control w-100', 'placeholder' => 'Enter Your Email', 'wire:model' => 'email']) !!}
        {!! Form::submit('Subscribe', ['class' => 'btn btn-outline-danger w-100 mt-4']) !!}
    </div>
    @error('email')
    <p class="text-center text-danger ">{{ $message }}</p>
    @enderror

    {!! Form::close() !!}
    <div class="input-group mb-2 mt-4 text-center">
        {!! Form::checkbox('subscribe_not_show', 'not_show', false, ['class' => 'mt-2', 'wire:model' => 'subscribe_not_show', 'data-bs-dismiss' => 'modal', 'aria-label' => 'Close']) !!}
        <label class="mt-1" style="margin-left: 10px">Do not show this popup again</label>
    </div>
</div>
