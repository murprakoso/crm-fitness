@extends('layouts.home')

@php
$formTitle = !empty($member) ? 'Ubah' : 'Tambah';
@endphp

@section('title', $formTitle . ' Member')

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

                        @include('partials.flash', ['errors' => $errors])

                        @if (!empty($member))
                            {!! Form::model($member, ['url' => ['member', $member->id], 'method' => 'PUT', 'files' => true]) !!}
                            {!! Form::hidden('id') !!}
                            {!! Form::hidden('old_image', $member->foto) !!}
                        @else
                            {!! Form::open(['route' => 'member.store', 'files' => true]) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('alamat', 'Alamat') !!}
                            {!! Form::text('alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['pria' => 'Pria', 'wanita' => 'Wanita'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('no_hp', 'No.HP') !!}
                            {!! Form::text('no_hp', null, ['class' => 'form-control', 'placeholder' => 'No.HP']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('foto', 'Foto') !!}
                            @if (!empty($member->foto) && file_exists(public_path('images/' . $member->foto)))
                                <img class="img-thumbnail d-block my-1 foto--preview" style="width: 20%"
                                    src="{{ asset('images/' . $member->foto) }}">
                            @else
                                <img class="img-thumbnail d-block my-1 foto--preview" style="width: 20%"
                                    src="{{ asset('images/default.png') }}">
                            @endif
                            {!! Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('job', 'Job') !!}
                            {!! Form::text('job', null, ['class' => 'form-control', 'placeholder' => 'Job']) !!}
                        </div>

                        <button class="btn btn-primary" type="submit">
                            {{ $formTitle }}
                        </button>
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

@include('vendor.datepicker.datepicker')
@include('vendor.toastr.toastr')
@include('vendor.select2.select2')

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

            $('[name=tanggal_daftar]').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true,
            });

            $('[name=harga]').select2({
                theme: "bootstrap4",
                placeholder: ' -- Pilih Harga --',
                allowClear: true,
                tags: false,
                ajax: {
                    url: "{{ route('harga.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.harga} (${item.keterangan})`,
                                    id: item.harga
                                }
                            })
                        };
                    }
                }
            });


            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('.foto--preview').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('[name=foto]').change(function() {
                readURL(this);
            });

        })
    </script>
@endpush
