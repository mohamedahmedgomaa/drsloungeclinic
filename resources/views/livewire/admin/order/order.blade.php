@section('title', trans('admins.orders'))

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="row-separator-colored-controls">{{ trans('admins.orders') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="card-content collapse show">
                        <div class="card-body">
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ Session::get('success')}}</strong>
                                </div>
                            @endif
                            <h4 class="card-section">
                                <i class="fas fa-info-circle text-primary"></i>
                                {{ trans('admins.currentOrders') }}
                            </h4>
                            <div class="mb-2 row">
                                <div class="col-12">
                                    <label for="Search" class="form-label">{{ __('admins.search') }}</label>
                                    <input wire:model="search" name="search" type="search" class="form-control"
                                           id="Search">
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table text-center" id="countryTable">
                                    <thead class="bg-info white">
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <div wire:click="sortBy('name','ar')">{{ trans('admins.name') }}
                                                @if ($sortField !== 'name')

                                                @elseif($sortAsc && $lang == 'ar')
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc && $lang == 'ar')
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                        <th>{{ trans('admins.email') }}</th>
                                        <th>{{ trans('admins.phone') }}</th>
                                        <th>{{ trans('admins.orderStatus') }} </th>
                                        <th>{{ trans('admins.platform') }} </th>
                                        <th>{{ trans('admins.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($items as $item)
                                        <tr class="item{!! $item->id !!}">
                                            <td>{{ $items->firstItem()+$loop->index }}</td>
                                            <td>{!! $item->name !!}</td>
                                            <td>{!! $item->email !!}</td>
                                            <td>{!! $item->phone !!}</td>
                                            <td>{!! $item->orderStatus->name !!}</td>
                                            <td>{!! $item->platform !!}</td>
                                            <td>
                                                <button wire:click="show({{ $item->id }})"
                                                        class="edit-modal btn btn-info">
                                                        <span
                                                            class="fa fa-eye"></span>
                                                </button>
{{--                                                <button wire:click="delete({{ $item->id }})"--}}
{{--                                                        class="delete-modal btn btn-danger">--}}
{{--                                                        <span--}}
{{--                                                            class="fa fa-trash"></span>--}}
{{--                                                </button>--}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-12 text-center m-2">
                                    {{ $items->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('livewire.admin.order.show')

            @include('livewire.admin.order.delete')
            <script>
                window.addEventListener('click', function (e) {
                    if (document.getElementById('modalbody').contains(e.target)) {
                        if (document.getElementById('innerbox').contains(e.target)) {
                        } else {
                            Livewire.emit('closemodel')
                        }
                    }
                });
            </script>
            <script>
                window.addEventListener('click', function (e) {
                    if (document.getElementById('modalbodydel').contains(e.target)) {
                        if (document.getElementById('innerboxdel').contains(e.target)) {
                        } else {
                            Livewire.emit('closemodel')
                        }
                    }
                });
            </script>
        </div>
    </div>
</section>

