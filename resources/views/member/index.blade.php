@extends('layouts.home')

@section('title', 'Member')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-secondary"><i class="ion ion-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <h4>DATA MEMBER</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Nama</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Tanggal Masa Member</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}" alt="avatar" width="30"
                                            class="rounded-circle mr-1">
                                        Create a mobile app
                                    </td>
                                    <td>2018-01-20</td>
                                    <td>2018-01-20</td>
                                    <td>
                                        <div class="badge badge-success">Tetap</div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-action btn-secondary mr-1">Detail</a>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                class="ion ion-edit"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i
                                                class="ion ion-trash-b"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}" alt="avatar" width="30"
                                            class="rounded-circle mr-1">
                                        Redesign homepage
                                    </td>
                                    <td>2018-04-10</td>
                                    <td>2018-04-10</td>
                                    <td>
                                        <div class="badge badge-info">Harian</div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-action btn-secondary mr-1">Detail</a>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                class="ion ion-edit"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i
                                                class="ion ion-trash-b"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}" alt="avatar" width="30"
                                            class="rounded-circle mr-1">
                                        Backup database
                                    </td>
                                    <td>2018-01-29</td>
                                    <td>2018-01-29</td>
                                    <td>
                                        <div class="badge badge-dark">Tidak aktif</div>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-action btn-secondary mr-1">Detail</a>
                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i
                                                class="ion ion-edit"></i></a>
                                        <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i
                                                class="ion ion-trash-b"></i></a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
