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

                <ul class="nav nav-tabs text-center font-weight-bold row col-12" id="myTab" role="tablist">
                    <li class="nav-item col-4 pr-0" role="presentation">
                        <a class="nav-link active" id="member-tab" data-toggle="tab" href="#member" role="tab"
                            aria-controls="member" aria-selected="true">
                            Member
                        </a>
                    </li>
                    <li class="nav-item col-4 px-0" role="presentation">
                        <a class="nav-link" id="job-tab" data-toggle="tab" href="#job" role="tab"
                            aria-controls="job" aria-selected="false">
                            Job
                        </a>
                    </li>
                    <li class="nav-item col-4 px-0" role="presentation">
                        <a class="nav-link" id="status-tab" data-toggle="tab" href="#status" role="tab"
                            aria-controls="status" aria-selected="false">
                            Status
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="kirim-wa-tabcontent">
                    {{-- Member tab --}}
                    <div class="tab-pane fade show active" id="member" role="tabpanel" aria-labelledby="member-tab">
                        <form id="member-form">
                            @csrf
                            <input type="hidden" name="ke" value="member">
                            <input type="hidden" name="pesan" id="member-pesan">

                            <div class="form-group">
                                <label for="member">Member</label>
                                <select name="member[]" id="member-select" class="form-control" style="width: 100%;"
                                    required multiple>
                                </select>
                            </div>
                        </form>

                        <div class="float-right mt-5">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="btn--kirim-ke-member">
                                <i class="ion ion-social-whatsapp"></i>
                                <span class="btn--kirim-text">
                                    Kirim
                                </span>
                            </button>
                        </div>
                    </div>

                    {{-- Job tab --}}
                    <div class="tab-pane fade" id="job" role="tabpanel" aria-labelledby="job-tab">
                        <form id="job-form">
                            @csrf
                            <input type="hidden" name="ke" value="job">
                            <input type="hidden" name="pesan" id="job-pesan">

                            <div class="form-group">
                                <label for="job">Job</label>
                                {{ Form::select('job', $jobs, null, ['class' => 'form-control', 'id' => 'job-select', 'style' => 'width:100%;', 'required' => true, 'placeholder' => '-- Pilih Job --']) }}
                            </div>
                        </form>

                        <div class="float-right mt-5">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="btn--kirim-ke-job">
                                <i class="ion ion-social-whatsapp"></i>
                                <span class="btn--kirim-text-job">
                                    Kirim
                                </span>
                            </button>
                        </div>
                    </div>

                    {{-- Status tab --}}
                    <div class="tab-pane fade" id="status" role="tabpanel" aria-labelledby="status-tab">
                        <form id="status-form">
                            @csrf
                            <input type="hidden" name="ke" value="status">
                            <input type="hidden" name="pesan" id="status-pesan">

                            <div class="form-group">
                                <label for="status">Status</label>
                                {{ Form::select('status', $statuses, null, ['class' => 'form-control', 'id' => 'status-select', 'style' => 'width:100%;', 'required' => true, 'placeholder' => '-- Pilih Status --']) }}
                            </div>
                        </form>

                        <div class="float-right mt-5">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="btn--kirim-ke-status">
                                <i class="ion ion-social-whatsapp"></i>
                                <span class="btn--kirim-text-status">
                                    Kirim
                                </span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
