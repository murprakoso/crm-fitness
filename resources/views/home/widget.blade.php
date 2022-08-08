<div class="row">
    {{-- widget --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="row">
            <div class="col-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-ios-bookmarks"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Terdaftar</h4>
                        </div>
                        <div class="card-body">
                            {{ $memberTerdaftar }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-danger">
                        <i class="ion ion-android-contacts"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Aktif (Tetap)</h4>
                        </div>
                        <div class="card-body">
                            {{ $memberAktif }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-warning">
                        <i class="ion ion-ios-stopwatch"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Masa Tenggang</h4>
                        </div>
                        <div class="card-body">
                            {{ $memberMasaTenggang }}
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-dark">
                        <i class="ion ion-ios-stopwatch"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Tidak Aktif</h4>
                        </div>
                        <div class="card-body">
                            {{ $memberTidakAktif }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card card-sm-3">
                    <div class="card-icon bg-success">
                        <i class="ion ion-ios-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Harian</h4>
                        </div>
                        <div class="card-body">
                            {{ $memberHarian }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- grafik pendaftaran member --}}
    <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Grafik Pendaftaran Member Per-Bulan, Tahun {{ date_id(date('Y-m-d'), 'Y') }}</h4>
            </div>
            <div class="card-body">
                <canvas id="chart1"></canvas>
            </div>
        </div>
    </div>
</div>
