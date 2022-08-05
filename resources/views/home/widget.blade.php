<div class="col-lg-3 col-md-6 col-12">
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
<div class="col-lg-3 col-md-6 col-12">
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
<div class="col-lg-3 col-md-6 col-12">
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
</div>
<div class="col-lg-3 col-md-6 col-12">
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
