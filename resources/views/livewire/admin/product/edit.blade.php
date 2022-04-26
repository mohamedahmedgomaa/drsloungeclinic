<div class="modal fade show @if ($showEditModal) d-block @endif" role="dialog" style="max-height: calc(100vh);
    overflow-y: auto; background-color: #22222255;" id="modalbody">
    <div class="modal-dialog modal-xl" id="innerbox">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('admins.edit') }}</h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <form wire:submit.prevent="update" class="form-horizontal">
                <div class="modal-body">
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
                        <div class="col-md-6">
                            <div class="form-group row mx-1">
                                {!! Form::label('status', trans('admins.status'), ['class'=>'label-control']) !!}
                                {!! Form::select('status', ['waiting' => trans('admins.waiting'),'active' => trans('admins.active'),'refused' => trans('admins.refused')], NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'status']) !!}
                                @error('status')
                                <p class="errorCountry text-center text-danger">{{ $message }}</p>
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

                        <div class="col-md-6">
                            {!! Form::label('tags', trans('admins.tags'), ['class' => 'col-md-12 label-control']) !!}
                            <div class="col-md-12">

                                @if (count($modelTags) != 0)
                                    {!! Form::select('tags[]', $modelTags, null, ['class'=>'custom-select', 'id' => 'tags', 'multiple'=>'multiple', 'wire:model.lazy'=>'tags']) !!}
                                @else
                                    <input disabled class="form-control" value="No Tags">
                                @endif
                                @error('tags')
                                <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card mt-5">
                        <div class="card-header">
                            <h4 class="form-section"><i class="fas fa-info-circle text-primary"></i>   {{ trans('admins.addProductCampaign') }}</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="card-content collpase collapse show" style="">
                            <div class="card-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                {!! Form::label('purchases_limits', trans('admins.purchases_limits'), ['class'=>'col-md-12 label-control']) !!}
                                                <div class="col-md-12">
                                                    {!! Form::number('purchases_limits', null, ['class'=>'form-control', 'wire:model.lazy'=>'purchases_limits', 'placeholder'=>trans('admins.purchases_limits')]) !!}
                                                </div>
                                            </div>
                                            @error('purchases_limits')
                                            <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                {!! Form::label('stock', trans('admins.stock'), ['class'=>'col-md-12 label-control']) !!}
                                                <div class="col-md-12">
                                                    {!! Form::number('stock', null, ['class'=>'form-control', 'placeholder'=>trans('admins.stock'), 'wire:model.lazy'=>'stock']) !!}
                                                </div>
                                            </div>
                                            @error('stock')
                                            <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            {!! Form::label('expire', trans('admins.expire'), ['class'=>'col-md-12 label-control']) !!}
                                            <div class="col-md-12">
                                                {!! Form::date('expire', null, ['class'=>'form-control', 'placeholder'=>trans('admins.expire'), 'wire:model.lazy'=>'expire']) !!}
                                            </div>
                                        </div>
                                        @error('expire')
                                        <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            {!! Form::label('discount', trans('admins.discount'), ['class'=>'col-md-12 label-control']) !!}
                                            <div class="col-md-12">
                                                {!! Form::text('discount', null, ['class'=>'form-control', 'step'=>'any', 'placeholder'=>trans('admins.discount'), 'id' => 'discount_product_campaigns', 'wire:model.lazy'=>'discount']) !!}
                                            </div>
                                        </div>
                                        @error('discount')
                                        <p class="errorCountry text-center alert alert-danger ">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button wire:loading.attr="disabled" wire:target="update,image" type="submit"
                            class="btn btn-primary edit">
                        <span class='fa fa-check'>{{ trans('admins.edit') }}</span>
                    </button>
                    <button wire:click="closemodal" type="button" class="btn btn-warning">
                        <span class='fa fa-remove'></span> {{ trans('admins.Close') }}
                    </button>
                </div>
            </form>


        </div>
    </div>
</div>
