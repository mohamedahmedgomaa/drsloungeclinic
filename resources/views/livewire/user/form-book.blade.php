<div>
    <div class="toastrMsg">
        @if (session()->has('message'))
            <div class="alert alert-success message">
                {{ session('message') }}
                <button type="button" class="close btn btn-outline-success" data-dismiss="alert">×</button>
            </div>
        @endif
    </div>

    {!! Form::open(['url' => '#', 'wire:submit.prevent' => "bookNow",'method' => 'post']) !!}

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
    <div class="mb-3">
        {!! Form::label('service', trans('users.service'), ['class' => 'form-label']) !!}<span
            style="color: red;font-size: 20px;">*</span>
        {!! Form::select('service', ['laser' => trans('users.laser'), 'dermatology' => trans('users.dermatology'), 'body_contouring' => trans('users.body_contouring')], null, ["wire:model.lazy"=>"service",'class'=>'form-control custom-select form-select', 'placeholder'=>trans('users.selectService'), 'id'=>'service']) !!}
        @error('service')
        <p class="errorCountry text-center text-danger ">{{ $message }}</p>
        @enderror
    </div>
    <div class="mb-3">
        {!! Form::submit(trans('users.submit'), ['class' => 'btn btn-primary w-100 mt-3' , 'style' => 'background:#f65f7f;border:#f65f7f;font-size:26px']) !!}
    </div>
    {!! Form::close() !!}

</div>


@section('page-script')
    <script>
            window.livewire.on('alert_remove', () => {
                setTimeout(function () {
                    $(".toastrMsg").fadeOut('fast');
                }, 3000); // 3 secs
            });
        $(function () {
            Livewire.on('addSelect2', function () {
                $('#chosenFilters').select2().on('change', function () {
                @this.set('chosen_filters', $(this).val());
                });
            });

            $('.select2').on('change', function () {
                if ($(this).attr("name") === 'service') {
                @this.set('service', $(this).val());
                }
            })
        });

    </script>
@endsection
