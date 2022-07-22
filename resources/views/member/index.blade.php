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
                        <div class="float-left">
                            <h4>DATA MEMBER ({{ $countMembers }})</h4>
                        </div>
                        <div class="float-right">

                            <form method="get" action="" class="d-inline">
                                <div class="input-group">
                                    <a href="{{ route('member.create') }}" class="btn btn-primary mr-2">Tambah Member</a>

                                    {{-- Search --}}
                                    <input type="text" name="q" class="form-control"
                                        placeholder="Nama/Gender/Job.." value="{{ request()->get('q') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-secondary"><i
                                                class="ion ion-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>

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
                                @forelse ($members as $member)
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
                                            <a href="{{ route('member.show', $member) }}"
                                                class="btn btn-action btn-secondary mr-1" data-toggle="tooltip"
                                                title="Detail">
                                                <i class="fa fa-info-circle"></i>
                                            </a>

                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('member.edit', $member) }}">
                                                <i class="ion ion-edit"></i>
                                            </a>

                                            <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                title="Delete" data-url="{{ route('member.destroy', $member->id) }}">
                                                <i class="ion ion-trash-b"></i>
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

                            {{ $members->links('vendor.pagination.bootstrap-4') }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@push('embed_modal')
    @include('layouts._modal-delete')
@endpush

@include('vendor.toastr.toastr')

@push('css_style')
    <style>
        .table tr>td {
            vertical-align: middle;
        }

        .custom-select select {
            height: 30px;
            line-height: 1.2;
            font-size: 12px;
        }
    </style>
@endpush
@push('js_script')
    <script>
        $(function() {
            /** Delete */
            $("body").on("click", ".btn--delete", function() {
                let url = $(this).data('url')
                $('#formDelete').attr('action', url)
                $('#confirmDeleteModal').modal('show')

                $('#confirmDeleteModal').on('hidden.bs.modal', function(e) {
                    $('#formDelete').attr('action', '#')
                });
            })

        })
    </script>
@endpush
