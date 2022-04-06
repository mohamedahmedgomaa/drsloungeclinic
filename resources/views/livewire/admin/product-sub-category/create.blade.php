<div class="card-content collapse show">
    <div class="card-body">
        <form wire:submit.prevent="create">
            <div class="form-body">
                <h4 class="form-section">
                    <i class="fas fa-info-circle text-primary"></i>
                    {{ trans('admins.addProductSubCategories') }}
                </h4>
                <div id="validation-errors"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row mx-1">
                            {!! Form::label('product_category_id', trans('admins.product_categories'), ['class'=>'label-control']) !!}
                            {!! Form::select('product_category_id', $product_categories, NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'product_category_id']) !!}
                            @error('product_category_id')
                            <p class="errorCountry text-center text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="NameArabic" class="label-control">{{trans('admins.nameArabic')}}</label>
                            <input wire:model.lazy="name_ar" class="form-control"
                                   placeholder="{{trans('admins.nameArabic')}}"
                                   name="name_ar" type="text" id="NameArabic">
                            @error('name_ar')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="NameEnglish" class="label-control">{{trans('admins.nameEnglish')}}</label>
                            <input wire:model.lazy="name_en" class="form-control"
                                   placeholder="{{trans('admins.nameEnglish')}}"
                                   name="name_en" type="text" id="NameEnglish">
                            @error('name_en')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group row mx-1">
                            <label for="image" class="label-control">{{__('admins.image')}}</label>
                            <input type="file" wire:model.lazy="image" class="form-control" id="image" name="image"/>
                            @error('image')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-actions right">
                <button wire:loading.attr="disabled" wire:target="create,image" type="submit" class="btn btn-primary">
                    <i class="la la-check"></i> {{ trans('admins.save') }}
                </button>
            </div>
        </form>
    </div>

</div>
