@extends('layouts.home')

@section('title', 'Home')

@section('content')
    <section class="section">
        {{-- <h1 class="section-header">
            <div>@yield('title')</div>
        </h1> --}}

        <div class="card card-dark">
            <div class="card-header">
                <h4>SISTEM INFORMASI PENGELOLAAN MEMBER FITNESS AM GYM PONTIANAK</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-primary">
                        <i class="ion ion-ios-stopwatch"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Masa Tenggang</h4>
                        </div>
                        <div class="card-body">
                            10
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
                            <h4>Member Aktif</h4>
                        </div>
                        <div class="card-body">
                            42
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-sm-3">
                    <div class="card-icon bg-warning">
                        <i class="ion ion-bookmark"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Member Terdaftar</h4>
                        </div>
                        <div class="card-body">
                            1,201
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
                            1,201
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
