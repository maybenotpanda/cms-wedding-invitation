<div class="modal fade" id="modal-add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></i>Add Guest Invitation <i class="fas fa-rocket"></i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('invitation.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div id="form-container">
                        <div class="single-form">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" placeholder="Nama Tamu Undangan" name="name[]">
                            </div>
                            <div class="form-group">
                                <label for="type">Jenis Tamu Undangan</label>
                                <select class="form-control" name="type[]">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="Keluarga">Keluarga</option>
                                    <option value="Teman">Teman</option>
                                    <option value="VIP">VIP</option>
                                    <option value="Basic">Basic</option>
                                </select>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="is_gift[0]" value="1">
                                <label class="form-check-label">Sembunyikan Gift</label>
                            </div>
                            <button type="button" class="btn btn-danger btn-sm btn-block removeRow mb-2">
                                Hapus
                            </button>
                        </div>
                    </div>
                    <button type="button" class="btn btn-outline-secondary btn-sm btn-block mb-2" id="addRow">
                        Tambah Lebih Banyak ++
                    </button>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-block btn-sm" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" name="request" class="btn btn-dark btn-block btn-sm">
                        Invitation<i class="ml-1 fa fa-save"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
