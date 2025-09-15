<div class="modal fade" id="modal-delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Guest <i class="fas fa-trash"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus guest ini?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-dark btn-block btn-sm" data-dismiss="modal">
                        GAJADI!
                    </button>
                    <button type="submit" class="btn btn-danger btn-block btn-sm">
                        Ya!<i class="ml-1 fa fa-trash"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
