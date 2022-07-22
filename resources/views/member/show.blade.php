@extends('layouts.home')

@section('title', 'Detail Member')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>DATA MEMBER</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- DATA MEMBER --}}
                            <div class="col-lg-5">
                                @if (!empty($member))
                                    {!! Form::model($member, ['url' => '#', 'method' => 'PUT']) !!}
                                @endif

                                <div class="form-group">
                                    {!! Form::label('nama', 'Nama') !!}
                                    {!! Form::text('nama', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('alamat', 'Alamat') !!}
                                    {!! Form::textarea('alamat', null, ['class' => 'form-control', 'rows' => '2', 'readonly' => true]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('gender', 'Gender') !!}
                                    {!! Form::text('gender', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('no_hp', 'No.HP') !!}
                                    {!! Form::text('no_hp', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('foto', 'Foto') !!}
                                    @if ($member->foto && file_exists(public_path('images/' . $member->foto)))
                                        <img class="img-thumbnail d-block my-1 foto--preview" style="width: 50%"
                                            src="{{ asset('images/' . $member->foto) }}">
                                    @else
                                        <img class="img-thumbnail d-block my-1 foto--preview" style="width: 50%"
                                            src="{{ asset('images/default.png') }}">
                                    @endif
                                </div>

                                <div class="form-group">
                                    {!! Form::label('job', 'Job') !!}
                                    {!! Form::text('job', null, ['class' => 'form-control', 'readonly' => true]) !!}
                                </div>

                                {!! Form::close() !!}
                            </div>

                            {{-- TABEL TRANSAKSI --}}
                            <div class="col-lg-7">
                                <label for="#" class="text-secondary font-weight-bold">Tabel Transaksi</label>

                                <a href="{{ url('/transaksi/create?member=' . $member->id) }}" class="float-right">
                                    <i class="fa fa-plus"></i>
                                    Tambah Transaksi
                                </a>
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Masa Tenggang</th>
                                            <th>Harga</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($member->transaksis as $key => $transaksi)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>
                                                    {{ date_id($transaksi->tanggal_daftar) }}
                                                </td>
                                                <td>
                                                    {{ date_id($transaksi->masa_tenggang) }}
                                                </td>
                                                <td>{{ rupiah($transaksi->harga) }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                        title="Delete"
                                                        data-url="{{ route('transaksi.destroy', $transaksi->id) }}">
                                                        <i class="ion ion-trash-b"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">
                                                    <div class="alert alert-warning">
                                                        Tidak ada data.
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                {{-- {{ $member->transaksis->links() }} --}}
                            </div>
                        </div>

                        <a class="btn btn-outline-secondary" href="{{ route('member.index') }}">Kembali</a>
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
