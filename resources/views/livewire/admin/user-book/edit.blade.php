<div class="modal fade show @if ($showEditModal) d-block @endif" role="dialog" style="max-height: calc(100vh);
    overflow-y: auto; background-color: #22222255;" id="modalbody">
    <div class="modal-dialog" id="innerbox">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('interface.edit') }}</h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update"
                      class="form-horizontal">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row mx-1">
                                <label for="name" class="label-control">{{ trans('admins.name') }}</label>
                                <input wire:model.lazy="name"
                                       class="form-control" placeholder="{{ trans('admins.name') }}" name="name"
                                       type="text" id="name">
                                @error('name')
                                <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row mx-1">
                                <label for="email" class="label-control">{{ trans('admins.email') }}</label>
                                <input wire:model.lazy="email"
                                       class="form-control" placeholder="{{ trans('admins.email') }}" name="email"
                                       type="email" id="email">
                                @error('email')
                                <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group row mx-1">
                                <label for="phone" class="label-control">{{ trans('admins.phone') }}</label>
                                <input wire:model.lazy="phone"
                                       class="form-control" placeholder="{{ trans('admins.phone') }}" name="phone"
                                       type="text" id="phone">
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

                        <div class="modal-footer">
                            <button wire:loading.attr="disabled" wire:target="update" type="submit"
                                    class="btn btn-primary edit">
                                <span class='fa fa-check'>{{ trans('interface.edit') }}</span>
                            </button>
                            <button wire:click="closemodal" type="button" class="btn btn-warning">
                                <span class='fa fa-remove'></span> {{ trans('interface.close') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
