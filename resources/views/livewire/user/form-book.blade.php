<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    {!! Form::open(['url' => '#', 'wire:submit.prevent' => "registration",'method' => 'post']) !!}
    <div class="mb-3">
        {!! Form::label('email', trans('users.email'), ['class' => 'form-label'] ) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('users.email'), 'wire:model' => 'email']) !!}
        @error('email')
        <p class="text-center text-danger ">{{ $message }}</p>
        @enderror

    </div>
    <div class="mb-3">
        {!! Form::label('phone', trans('users.phone'), ['class' => 'form-label']) !!}
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('users.phone'), 'wire:model' => 'phone']) !!}
        @error('phone')
        <p class="text-center text-danger ">{{ $message }}</p>
        @enderror

    </div>
    <div class="mb-3">
        {!! Form::label('name', trans('users.name'), ['class' => 'form-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('users.name'),  'wire:model' => 'name']) !!}
        @error('name')
        <p class="text-center text-danger ">{{ $message }}</p>
        @enderror

    </div>
    <div class="mb-3">
        {!! Form::label('service', trans('users.service'), ['class' => 'form-label']) !!}
        {!! Form::select('service', ['1' => 'service', '2' => 'service2'], null, ["wire:model.lazy"=>"service",'class'=>'form-control', 'placeholder'=>trans('admins.service'), 'id'=>'service']) !!}
        @error('service')
        <p class="errorCountry text-center text-danger ">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        {!! Form::submit('submit', ['class' => 'btn btn-primary w-100 mt-3']) !!}
    </div>
    {!! Form::close() !!}


</div>
