<div class="modal fade show @if ($showEditModal) d-block @endif" role="dialog" style="max-height: calc(100vh);
    overflow-y: auto; background-color: #22222255;" id="modalbody">
    <div class="modal-dialog modal-xl" id="innerbox">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header text-center">
                <div>
                    <h4 class="modal-title">{{ trans('admins.showDetails') }} : {{ $this->name }}</h4>
                </div>
                <button wire:click="closemodal" type="button" class="close">&times;</button>
            </div>

            <div class="row mt-3">
                <div class="col-5 offset-1">
                    <h5>{{ trans('admins.email') }} : <a href="mailto:{{ $this->email }}">{{ $this->email }}</a></h5>
                </div>
                <div class="col-5 offset-1">
                    <h5>{{ trans('admins.phone') }} : <a href="tel:{{ $this->phone }}">{{ $this->phone }}</a></h5>
                </div>
                <div class="col-5 offset-1">
                    <h5> {{ trans('admins.platform') }} : {{ $this->platform }}</h5>
                </div>
                <div class="col-5 offset-1">
                    <h5> {{ trans('admins.total') }} : {{ $this->total }} SAR</h5>
                </div>
            </div>


            <div class="row mt-3">
                <div class="col-11 offset-1">
                    <form wire:submit.prevent="updateStatus" class="form-horizontal">

                        <div class="col-md-10">
                            <div class="form-group row mx-1">
                                {!! Form::label('order_status_id', trans('admins.orderStatuses'), ['class'=>'label-control']) !!}
                                {!! Form::select('order_status_id', $orderStatuses, NULL, ['class'=>'form-control', 'placeholder'=>trans('admins.pleaseSelect'), 'wire:model.lazy'=>'order_status_id']) !!}
                                @error('order_status_id')
                                <p class="errorCountry text-center text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button wire:loading.attr="disabled" wire:target="updateStatus" type="submit"
                                class="btn btn-primary edit">
                            <span class='fa fa-check'>{{ trans('admins.edit') }}</span>
                        </button>
                    </form>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">{{ trans('admins.orderDetails') }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>{{ trans('admins.nameArabic') }}</th>
                                    <th>{{ trans('admins.nameEnglish') }}</th>
                                    <th>{{ trans('admins.price') }}</th>
                                    <th>{{ trans('admins.image') }}</th>
                                    <th>{{ trans('admins.qty') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($this->orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $orderDetail->id }}</td>
                                        <td>{{ $orderDetail->product_name_ar }}</td>
                                        <td>{{ $orderDetail->product_name_en }}</td>
                                        <td>{{ $orderDetail->price }}</td>
                                        <td>{{ Html::image('images/products/' . $orderDetail->image, 'img', ['class' => 'img-fluid', 'width' => 50]) }}</td>
                                        <td>{{ $orderDetail->qty }}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>


        </div>
    </div>
</div>
