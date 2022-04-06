<div class="card-content collapse show">
    <div class="card-body">
        <form wire:submit.prevent="create">
            <div class="form-body">
                <h4 class="form-section">
                    <i class="fas fa-info-circle text-primary"></i>
                    {{ trans('admins.addProduct') }}
                </h4>

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

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="DescriptionArabic" class="label-control">{{trans('admins.descriptionArabic')}}</label>
                            <input wire:model.lazy="description_ar" class="form-control"
                                   placeholder="{{trans('admins.descriptionArabic')}}"
                                   name="description_ar" type="text" id="DescriptionArabic">
                            @error('description_ar')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="DescriptionEnglish" class="label-control">{{trans('admins.descriptionEnglish')}}</label>
                            <input wire:model.lazy="description_en" class="form-control"
                                   placeholder="{{trans('admins.descriptionEnglish')}}"
                                   name="description_en" type="text" id="DescriptionEnglish">
                            @error('description_en')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="Price" class="label-control">{{trans('admins.price')}}</label>
                            <input wire:model.lazy="price" class="form-control"
                                   placeholder="{{trans('admins.price')}}"
                                   name="price" type="number" id="Price">
                            @error('price')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            <label for="qty" class="label-control">{{trans('admins.qty')}}</label>
                            <input wire:model.lazy="qty" class="form-control"
                                   placeholder="{{trans('admins.qty')}}"
                                   name="qty" type="number" id="qty">
                            @error('qty')
                            <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            {!! Form::label('product_category_id', trans('admins.product_categories'), ['class'=>'label-control']) !!}
                            {!! Form::select('product_category_id', $product_categories, NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'product_category_id']) !!}
                            @error('product_category_id')
                            <p class="errorCountry text-center text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            {!! Form::label('product_sub_category_id', trans('admins.product_sub_categories'), ['class'=>'label-control']) !!}
                            {!! Form::select('product_sub_category_id', $product_sub_categories, NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'product_sub_category_id']) !!}
                            @error('product_sub_category_id')
                            <p class="errorCountry text-center text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row mx-1">
                            {!! Form::label('product_sub_sub_category_id', trans('admins.product_sub_sub_categories'), ['class'=>'label-control']) !!}
                            {!! Form::select('product_sub_sub_category_id', $product_sub_sub_categories, NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'product_sub_sub_category_id']) !!}
                            @error('product_sub_sub_category_id')
                            <p class="errorCountry text-center text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6" wire:ignore>
                        {!! Form::label('tags', trans('admins.tags'), ['class' => 'col-md-12 label-control']) !!}
                        <div class="col-md-12">

                            @if (count($modelTags) != 0)
                                {!! Form::select('tags[]', $modelTags, null, ['class'=>'select2 custom-select select3', 'id' => 'tags', 'multiple'=>'multiple']) !!}
                            @else
                                <input disabled class="form-control" value="No Tags">
                            @endif
                            @error('tags')
                            <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
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
@section('page-script')
    <script>
        $(function () {
            Livewire.on('addSelect2',function () {
                $('#chosenFilters').select2().on('change',function () {
                @this.set('chosen_filters', $(this).val());
                });
            });

            $('.select2').on('change', function () {
                if ($(this).attr("name") === 'tags') {
                @this.set('tags', $(this).val());
                }
                if ($(this).attr("name") === 'currency_id') {
                @this.set('currency_id', $(this).val());
                }
                if ($(this).attr("name") === 'brand_id') {
                @this.set('brand_id', $(this).val());
                }
            })
        });

        $(function () {
            $('.select3').on('change',function () {
                if ($(this).attr("name") === 'tags') {
                @this.set('tags', $(this).val());
                }
            })
        })

    </script>
@endsection
