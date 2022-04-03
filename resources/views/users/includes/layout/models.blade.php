<!-- Modal -->
@if(session('subscribe_not_show') != 'not_show')
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <img src="{{asset('user')}}/assets/images/modelsub.jpg" class="img-fluid" alt="modelsub"
                     style="height: 300px;width: 100%;" data-bs-dismiss="modal" aria-label="Close">
                <div class="modal-body">
                    <livewire:user.model-subscribe/>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#myModal").modal("show");
        });
    </script>
@endif
