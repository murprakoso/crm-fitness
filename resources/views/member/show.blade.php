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

                        @if (!empty($member))
                            {!! Form::model($member, ['url' => '#', 'method' => 'PUT']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('tanggal_daftar', 'Tanggal Daftar') !!}
                            {!! Form::text('tanggal_daftar', date('d M Y', strtotime($member->tanggal_daftar)), ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('masa_tenggang', 'Masa Tenggang') !!}
                            {!! Form::text('masa_tenggang', date('d M Y', strtotime($member->masa_tenggang)), ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('alamat', 'Alamat') !!}
                            {!! Form::text('alamat', null, ['class' => 'form-control', 'readonly' => true]) !!}
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
                                <img class="img-thumbnail d-block my-1 foto--preview" style="width: 20%"
                                    src="{{ asset('images/' . $member->foto) }}">
                            @else
                                <img class="img-thumbnail d-block my-1 foto--preview" style="width: 20%"
                                    src="{{ asset('images/default.png') }}">
                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('job', 'Job') !!}
                            {!! Form::text('job', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('harga', 'Harga') !!}
                            {!! Form::text('harga', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('jenis_member', 'Jenis Member') !!}
                            {!! Form::text('jenis_member', null, ['class' => 'form-control', 'readonly' => true]) !!}
                        </div>

                        <a class="btn btn-outline-secondary" href="{{ route('member.index') }}">Kembali</a>

                        {!! Form::close() !!}

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
