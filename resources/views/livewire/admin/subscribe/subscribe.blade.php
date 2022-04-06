@section('title', trans('admins.subscribe'))

<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"
                            id="row-separator-colored-controls">{{ trans('admins.subscribe') }}</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <h4 class="form-section">
                                <i class="fas fa-info-circle text-primary"></i>
                                {{ trans('admins.subscribe') }}
                            </h4>
                            <div class="mb-3 row ">
                                <label for="Search" class="form-label col-md-1">Search</label>
                                <input wire:model="search"
                                       name="search" type="search" class="form-control col-md-11" id="Search">
                            </div>
                            <div class="table-responsive">
                                <table class="table text-center" id="countryTable">
                                    <thead class="bg-info white">
                                    <tr>
                                        <th>#</th>
                                        <th>
                                            <div wire:click="sortBy('name')">{{ trans('admins.name') }}
                                                @if ($sortField !== 'name')
                                                @elseif($sortAsc)
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc)
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                        <th>
                                            <div wire:click="sortBy('email')">{{ trans('admins.email') }}
                                                @if ($sortField !== 'email')
                                                @elseif($sortAsc)
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc)
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                        <th>
                                            <div wire:click="sortBy('phone')">{{ trans('admins.phone') }}
                                                @if ($sortField !== 'phone')
                                                @elseif($sortAsc)
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc)
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                        <th>
                                            <div wire:click="sortBy('subscribe_status')">{{ trans('admins.subscribe_status') }}
                                                @if ($sortField !== 'subscribe_status')
                                                @elseif($sortAsc)
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc)
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                        <th>
                                            <div wire:click="sortBy('user_subscribe')">{{ trans('admins.user_subscribe') }}
                                                @if ($sortField !== 'user_subscribe')
                                                @elseif($sortAsc)
                                                    <i class="la la-dot-circle-o success font-medium-1 mr-1"></i>
                                                @elseif(!$sortAsc)
                                                    <i class="la la-dot-circle-o danger font-medium-1 mr-1"></i>
                                                @endif
                                            </div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr class="item{!! $item->id !!}">
                                            <td>{{ $items->firstItem()+$loop->index }}</td>
                                            <td>{!! $item->name !!}</td>
                                            <td>{!! $item->email !!}</td>
                                            <td>{!! $item->phone !!}</td>
                                            <td>{!! $item->subscribe_status !!}</td>
                                            <td>{!! $item->user_subscribe !!}</td>
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
