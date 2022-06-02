@extends('layouts.home')

@section('title', 'Transaksi')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        {{-- content --}}
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Pendaftaran Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            {{-- TAB:Menu --}}
                            <div class="col-12 col-sm-12 col-md-4">
                                <ul class="nav nav-pills flex-column" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="member_tetap-tab4" data-toggle="tab"
                                            href="#member_tetap" role="tab" aria-controls="home" aria-selected="true">
                                            Member Tetap
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="member_harian-tab4" data-toggle="tab"
                                            href="#member_harian" role="tab" aria-controls="profile" aria-selected="false">
                                            Harian
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="perpanjang-tab4" data-toggle="tab" href="#perpanjang"
                                            role="tab" aria-controls="contact" aria-selected="false">
                                            Perpanjang Member Baru
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            {{-- TAB:Content --}}
                            <div class="col-12 col-sm-12 col-md-8">
                                <div class="tab-content" id="myTab2Content">
                                    <div class="tab-pane fade show active" id="member_tetap" role="tabpanel"
                                        aria-labelledby="member_tetap-tab4">

                                        <span class="text-body">Member Tetap</span>
                                        <hr>
                                        <form action="#" method="post">

                                            <div class="form-group">
                                                <label> Tanggal Transaksi</label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Nama Member</label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>

                                            <button class="btn btn-primary">Simpan</button>
                                        </form>

                                    </div>
                                    <div class="tab-pane fade" id="member_harian" role="tabpanel"
                                        aria-labelledby="member_harian-tab4">

                                        <span class="text-body">Member Harian</span>
                                        <hr>
                                        <form action="#" method="post">

                                            <div class="form-group">
                                                <label> Tanggal Transaksi</label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Nama Member</label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>

                                            <button class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="perpanjang" role="tabpanel"
                                        aria-labelledby="perpanjang-tab4">

                                        <span class="text-body"> Perpanjang Member Baru</span>
                                        <hr>
                                        <form action="#" method="post">

                                            <div class="form-group">
                                                <label> Tanggal Transaksi</label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Nama </label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Masa Member </label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label> Harga </label>
                                                <input type="text" name="title" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    Please fill in the title
                                                </div>
                                            </div>

                                            <button class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
