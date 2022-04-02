{{--*************************************
    Delete Tag (Ajax) Html Model
    *************************************--}}


<div
    class="modal fade show @if ($showDeleteModal) d-block @endif" role="dialog" id="modalbodydel" style=" background-color: #22222255;">
    <div class="modal-dialog"  id="innerboxdel">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Delete </h4>
                <button wire:click="closemodal"
                        type="button" class="close" >&times;</button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="destroy"
                      class="form-horizontal">
                    <div class="deleteContent">
                        {{ trans('admins.sureWantDelete') }} <span class="country-name"></span> ?
                        <span class="d-none country-id"></span>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger delete">
                            <span class='fa fa-trash'> Delete</span>
                        </button>
                        <button wire:click="closemodal"
                                type="button" class="btn btn-warning">
                            <span class='fa fa-remove'></span> {{ trans('interface.close') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
