<div class="modal fade" id="kirim-pesan-modal" tabindex="-1" aria-labelledby="kirim-pesan-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kirim-pesan-modalLabel">Kirim Pesan Ke</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="member-form">
                    @csrf
                    <input type="hidden" name="ke" value="member">
                    <input type="hidden" name="pesan" id="member-pesan">

                    <div class="form-group">
                        <label for="member">Member</label>
                        {{-- <input type="text" class="form-control" id="member" required> --}}
                        {{-- <select name="member[]" id="member-select" class="form-control" style="width: 100%;" required
                            multiple>
                        </select> --}}
                        <select name="member[]" id="member-select" class="form-control" style="width: 100%;" required
                            multiple>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="btn--kirim-ke-member">
                    <i class="ion ion-social-whatsapp"></i>
                    <span class="btn--kirim-text">
                        Kirim
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
