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

        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Member dalam masa tenggang</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Gender</th>
                                    <th>Job</th>
                                    <th>Status</th>
                                    <th width="15%" class="text-center">Action</th>
                                </tr>
                                @forelse ($memberMasaTenggangList as $member)
                                    <tr>
                                        <td>
                                            @if ($member->foto && file_exists(public_path('images/' . $member->foto)))
                                                <img src="{{ asset('images/' . $member->foto) }}" alt="avatar"
                                                    width="30" height="30" class="rounded-circle mr-1">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="avatar" width="30"
                                                    class="rounded-circle mr-1">
                                            @endif
                                            {{ $member->nama }}
                                        </td>
                                        <td>{{ $member->alamat }}</td>
                                        <td>{{ ucwords($member->gender) }}</td>
                                        <td>{{ $member->job }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $member->status == 1 ? 'primary' : ($member->status == 2 ? 'dark' : 'danger') }}">
                                                {{ $statuses[$member->status] }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{-- Detail --}}
                                            <a href="{{ route('member.show', $member) }}"
                                                class="btn btn-action btn-secondary mr-1" data-toggle="tooltip"
                                                title="Detail">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-secondary text-center">Empty data.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>

                            {{ $memberMasaTenggangList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
