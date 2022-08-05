@extends('layouts.home')

@php
$formTitle = !empty($pesans) ? 'Ubah' : 'Tambah';
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
                            {!! Form::label('keterangan', 'Keterangan') !!}
                            {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('pesan', 'Pesan') !!}
                            {!! Form::textarea('pesan', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Isi Pesan']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status (Opsional)') !!}
                            <button type="button" class="btn btn-sm btn-link" data-container="body" data-toggle="popover"
                                data-placement="right"
                                data-content="Kirim pesan ke member dengan status yang dipilih. Dapat dikosongkan.">
                                <i class="ion ion-ios-help"></i>
                            </button>
                            {{ Form::select('status', $statuses, null, ['class' => 'form-control', 'id' => 'status-select', 'style' => 'width:100%;', 'placeholder' => '-- Pilih Status --']) }}
                        </div>

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
