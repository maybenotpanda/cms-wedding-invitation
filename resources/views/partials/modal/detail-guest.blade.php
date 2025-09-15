<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data <i class="fas fa-rocket"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Tamu Undangan" />
                    </div>
                    <div class="form-group">
                        <label for="type">Jenis Tamu Undangan</label>
                        <select class="form-control" name="type">
                            <option value="">-- Pilih Jenis --</option>
                            <option value="Keluarga">Keluarga</option>
                            <option value="Teman">Teman</option>
                            <option value="VIP">VIP</option>
                            <option value="Basic">Basic</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="slug">Link</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug"
                            style="color:#0073ef;" disabled />
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark btn-block">Save <i class="ml-1 fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
