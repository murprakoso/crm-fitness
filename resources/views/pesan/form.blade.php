@extends('layouts.home')

@php
$formTitle = !empty($pesan) ? 'Ubah' : 'Tambah';
@endphp
@section('title', $formTitle . ' Pesan')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Data Pesan</h4>
                    </div>
                    <div class="card-body">

                        @include('partials.flash', ['errors' => $errors])

                        @if (!empty($pesan))
                            {!! Form::model($pesan, ['url' => ['pesan', $pesan->id], 'method' => 'PUT']) !!}
                            {!! Form::hidden('id') !!}
                        @else
                            {!! Form::open(['url' => 'pesan']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('ke', 'Pengiriman ke') !!}
                            <button type="button" class="btn btn-sm btn-link" data-container="body" data-toggle="popover"
                                data-placement="right"
                                data-content="Kirim pesan ke status, job atau gender dengan status yang dipilih. Dapat dikosongkan.">
                                <i class="ion ion-ios-help"></i>
                            </button>

                            <div class="form-control border">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kirimke" id="status"
                                        value="status"
                                        {{ !empty($pesan) ? ($pesan->ke == 'status' ? 'checked' : '') : '' }}>
                                    <label class="form-check-label" for="status">Status</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kirimke" id="job"
                                        value="job" {{ !empty($pesan) ? ($pesan->ke == 'job' ? 'checked' : '') : '' }}>
                                    <label class="form-check-label" for="job">Job</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="kirimke" id="gender"
                                        value="gender"
                                        {{ !empty($pesan) ? ($pesan->ke == 'gender' ? 'checked' : '') : '' }}>
                                    <label class="form-check-label" for="gender">Gender</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- ke status --}}
                            <div id="ke-status" class="d-none">
                                {!! Form::label('status', 'Status') !!}
                                {{ Form::select('status', $statuses, null, ['class' => 'form-control', 'placeholder' => '-- Pilih Status --']) }}
                            </div>
                            {{-- ke job --}}
                            <div id="ke-job" class="d-none">
                                {!! Form::label('job', 'Job') !!}
                                {{ Form::select('job', $jobs, null, ['class' => 'form-control', 'placeholder' => '-- Pilih Job --']) }}
                            </div>
                            {{-- ke gender --}}
                            <div id="ke-gender" class="d-none">
                                {!! Form::label('gender', 'Gender') !!}
                                {{ Form::select('gender', $genders, null, ['class' => 'form-control', 'placeholder' => '-- Pilih Gender --']) }}
                            </div>
                        </div>

                        <hr>
                        <div class="form-group">
                            {!! Form::label('keterangan', 'Keterangan') !!}
                            {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pesan', 'Pesan') !!}
                            {!! Form::textarea('pesan', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Isi Pesan']) !!}
                        </div>
                        {{-- <div class="form-group">
                            {!! Form::label('status-select', 'Status (Opsional)') !!}
                            <button type="button" class="btn btn-sm btn-link" data-container="body" data-toggle="popover"
                                data-placement="right"
                                data-content="Kirim pesan ke member dengan status yang dipilih. Dapat dikosongkan.">
                                <i class="ion ion-ios-help"></i>
                            </button>
                            {{ Form::select('status', $statuses, null, ['class' => 'form-control', 'id' => 'status-select', 'style' => 'width:100%;', 'placeholder' => '-- Pilih Status --']) }}
                        </div> --}}

                        <button class="btn btn-primary" type="submit">
                            {{ $formTitle }}
                        </button>
                        <a class="btn btn-outline-secondary" href="{{ route('pesan.index') }}">Kembali</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('css_style')
    <style>
        .table tr>td {
            vertical-align: middle;
        }
    </style>
@endpush

@push('js_script')
    <script>
        $(function() {
            $('#ke').on('change', function() {
                alert(this.value);
            });

            // radio button
            $('input[name="kirimke"]').on('change', function(e) {
                let kirimkeValue = $(this).val()
                pengirimanKe(kirimkeValue)
            });

            // on edit check selected radio button
            let selectedOption = $('input[name="kirimke"]:checked').val();
            if (selectedOption) {
                pengirimanKe(selectedOption)
            }

            async function pengirimanKe(selectedOption) {
                if (selectedOption === 'status') {
                    // ke status
                    $('#ke-status').removeClass('d-none')
                    $('#ke-job').addClass('d-none')
                    $('#ke-gender').addClass('d-none')
                } else if (selectedOption === 'job') {
                    // ke job
                    $('#ke-job').removeClass('d-none')
                    $('#ke-status').addClass('d-none')
                    $('#ke-gender').addClass('d-none')
                } else {
                    // ke gender
                    $('#ke-gender').removeClass('d-none')
                    $('#ke-status').addClass('d-none')
                    $('#ke-job').addClass('d-none')
                }
            }

        })
    </script>
@endpush
