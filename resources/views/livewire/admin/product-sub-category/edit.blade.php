<div class="modal fade show @if ($showEditModal) d-block @endif" role="dialog" style="max-height: calc(100vh);
    overflow-y: auto; background-color: #22222255;" id="modalbody">
    <div class="modal-dialog" id="innerbox">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('admins.edit') }}</h4>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>
            <form wire:submit.prevent="update" class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="NameArabic" class="label-control">{{__('admins.nameEN')}}</label>
                        <input wire:model.lazy="name_ar" class="form-control" placeholder="Name Arabic" name="name_ar"
                               type="text" id="NameArabic">
                        @error('name_ar')
                        <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="NameEnglish" class="label-control">{{__('admins.nameEN')}}</label>
                        <input wire:model.lazy="name_en" class="form-control" placeholder="Name English" name="name_en"
                               type="text" id="NameEnglish">
                        @error('name_en')
                        <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_category_id" class="label-control">{{__('admins.product_categories')}}</label>
                        {!! Form::select('product_category_id', $product_categories, null, ['class'=>'form-control', 'placeholder'=>trans('admins.product_categories'),'wire:model.lazy'=>'product_category_id']) !!}
                        @error('product_category_id')
                        <p class="errorCountry text-center text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image" class="label-control">{{__('admins.image')}}</label>
                        <input type="file" wire:model.lazy="image" class="form-control" id="image" name="image"/>
                        @error('image')
                        <p class="errorCountry text-center text-danger ">{{ $message }}</p>
                        @enderror
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
