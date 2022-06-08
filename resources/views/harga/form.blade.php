@extends('layouts.home')

@php
$formTitle = !empty($harga) ? 'Ubah' : 'Tambah';
@endphp

@section('title', $formTitle . ' Harga')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <div class="float-right">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-secondary"><i class="ion ion-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}

                        <h4>@yield('title')</h4>
                    </div>
                    <div class="card-body">

                        @include('partials.flash', ['errors' => $errors])

                        @if (!empty($harga))
                            {!! Form::model($harga, ['url' => ['harga', $harga->id], 'method' => 'PUT']) !!}
                            {!! Form::hidden('id') !!}
                        @else
                            {!! Form::open(['url' => 'harga']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::label('gender', 'Gender') !!}
                            {!! Form::select('gender', ['pria' => 'Pria', 'wanita' => 'Wanita'], null, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('keterangan', 'Keterangan') !!}
                            {!! Form::text('keterangan', null, ['class' => 'form-control', 'placeholder' => 'Keterangan']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('harga', 'Harga') !!}
                            {!! Form::text('harga', null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
                        </div>

                        <button class="btn btn-primary" type="submit">
                            {{ $formTitle }}
                        </button>
                        <a class="btn btn-outline-secondary" href="{{ route('harga.index') }}">Kembali</a>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
