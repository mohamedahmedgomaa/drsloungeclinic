<div class="card-content collapse show">
    <div class="card-body">
        <form wire:submit.prevent="create">
            <div class="form-body">
                <h4 class="form-section">
                    <i class="fas fa-info-circle text-primary"></i>
                    {{ trans('admins.addUserBook') }}
                </h4>
                <div id="validation-errors"></div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="name" class="label-control">{{ trans('admins.name') }}</label>
                            <input wire:model.lazy="name"
                                   class="form-control" placeholder="{{ trans('admins.name') }}" name="name" type="text" id="name">
                            @error('name')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="email" class="label-control">{{ trans('admins.email') }}</label>
                            <input wire:model.lazy="email"
                                   class="form-control" placeholder="{{ trans('admins.email') }}" name="email" type="email" id="email">
                            @error('email')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="phone" class="label-control">{{ trans('admins.phone') }}</label>
                            <input wire:model.lazy="phone"
                                   class="form-control" placeholder="{{ trans('admins.phone') }}" name="phone" type="text" id="phone">
                            @error('phone')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="service" class="label-control">{{ trans('admins.service') }}</label>
                            {!! Form::select('service', ['1' => 'service', '2' => 'service2'], null, ["wire:model.lazy"=>"service",'class'=>'form-control', 'placeholder'=>trans('admins.service'), 'id'=>'service']) !!}
                            <p class="errorCity text-center text-danger hidden"></p>
                            @error('service')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                </div>

            </div>

            <div class="form-actions right">
                <button wire:loading.attr="disabled" wire:target="create" type="submit" class="btn btn-primary">
                    <i class="la la-check"></i> {{ trans('admins.save') }}
                </button>
            </div>
        </form>
    </div>

</div>
