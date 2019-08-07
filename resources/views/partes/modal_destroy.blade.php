<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify" role="document">
        <div class="modal-content text-center">
            <div class="modal-header d-flex justify-content-center red accent-2">
                <h3 class="heading">Estas seguro?</h3>
            </div>
            <div class="modal-body">
                <i class="poulet-cross-icon fas fa-times fa animated rotateIn"></i>
                <p></p>
            </div>
            <div class="modal-footer flex-center">
                <form id="formModal" action="" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Si</button>
                    <button class="btn btn-outline-info" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
