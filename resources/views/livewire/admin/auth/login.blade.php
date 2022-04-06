<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div>
        @if (session()->has('message_error'))
            <div class="alert alert-success">
                {{ session('message_error') }}
            </div>
        @endif
    </div>

    {!! Form::open(['url' => '#', 'wire:submit.prevent' => "login",'method' => 'post']) !!}
    <img class="mb-4" src="{{asset('user')}}/assets/images/ClinicLogo.png" alt="" width="200" height="150">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
{{--        {!! Form::label('email', trans('admins.email'), ['for' => 'floatingInput'] ) !!}--}}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => trans('admins.email'), 'wire:model' => 'email', 'id' => 'floatingInput']) !!}
        <label for="floatingInput">Email address</label>
        @error('email')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-floating">
{{--        {!! Form::label('password', trans('admins.password'), ['for' => 'floatingPassword'] ) !!}--}}
        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => trans('admins.password'), 'wire:model' => 'password', 'id' => 'floatingPassword']) !!}
        <label for="floatingPassword">Password</label>
        @error('password')
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me" wire:model="remember"> Remember me
        </label>
    </div>

    <div class="mb-3">
        {!! Form::submit('submit', ['class' => 'w-100 btn btn-lg btn-primary']) !!}
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
    </div>
    {!! Form::close() !!}

</div>
