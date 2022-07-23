@extends('layouts.home')

@php
$formTitle = empty($transaksi) ? 'Simpan' : 'Ubah';
@endphp

@section('title', $formTitle . ' Transaksi')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        {{-- content --}}
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Transaksi Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">

                                @if (empty($transaksi))
                                    {!! Form::open(['route' => 'transaksi.store']) !!}
                                @else
                                    {!! Form::open(['route' => ['transaksi.update', 'transaksi' => $transaksi], 'method' => 'PUT']) !!}
                                @endif

                                <div class="form-group">
                                    <label> Nama</label>
                                    <select name="nama" class="form-control" required style="width: 100%;">
                                        @if (!empty(request()->get('member')) || !empty($member))
                                            <option value="{{ $member->id }}" selected>
                                                {{ $member->nama }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> Tanggal Transaksi/Daftar</label>
                                    @php
                                        $tglSelected = !empty($transaksi) ? date('d/m/Y', strtotime($transaksi->tanggal_daftar)) : null;
                                    @endphp
                                    {{ Form::text('tanggal_daftar', $tglSelected, ['class' => 'form-control', 'placeholder' => 'd/m/Y', 'required' => true, 'autocomplete' => 'off']) }}
                                </div>
                                <div class="form-group">
                                    <label> Tipe Member</label>
                                    @php $selectedMember = (!empty(old('member')) ? old('member') : !empty($transaksi)) ? $transaksi->tipe_member : ''; @endphp
                                    {{ Form::select('member', ['harian' => 'Harian', 'tetap' => 'Tetap'], $selectedMember, ['placeholder' => '-- Pilih Tipe Member --', 'class' => 'form-control', 'required' => true]) }}
                                </div>
                                <div class="form-group">
                                    <label> Jenis Member</label>
                                    @php $selectedJM = (!empty(old('jenis_member')) ? old('jenis_member') : !empty($transaksi)) ? $transaksi->jenis_member : ''; @endphp
                                    {{ Form::select('jenis_member', ['cardio' => 'Cardio', 'gym' => 'Gym'], $selectedJM, ['placeholder' => '-- Pilih Jenis Member --', 'class' => 'form-control', 'required' => true]) }}
                                </div>
                                <div class="form-group">
                                    <label> Harga</label>
                                    @php
                                        $hargaSelected = !empty($transaksi) ? [$transaksi->harga => $transaksi->harga] : [];
                                    @endphp
                                    {{ Form::select('harga', $hargaSelected, null, ['class' => 'form-control', 'style' => 'width:100%;', 'required' => true]) }}
                                </div>


                                <button type="submit" class="btn btn-primary">
                                    {{ $formTitle }}
                                </button>
                                <a class="btn btn-outline-secondary" href="{{ route('transaksi.index') }}">Kembali</a>

                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@include('vendor.datepicker.datepicker')
@include('vendor.select2.select2')
@include('vendor.toastr.toastr')
@push('js_script')
    <script>
        $(function() {
            const capitalize = s => (s && s[0].toUpperCase() + s.slice(1)) || ""

            // Tanggal Daftar
            $('[name=tanggal_daftar]').datepicker({
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: "TRUE",
            });

            // Harga
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
                                    text: `${item.harga} (${capitalize(item.gender)} - ${item.keterangan})`,
                                    id: item.harga
                                }
                            })
                        };
                    }
                }
            });

            // User/Member
            $('[name=nama]').select2({
                theme: "bootstrap4",
                placeholder: ' -- Pilih Member --',
                allowClear: true,
                tags: false,
                ajax: {
                    url: "{{ route('member.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: `${item.nama}`,
                                    id: item.id,
                                    // tanggal_daftar: item.tanggal_daftar,
                                    // masa_tenggang: item.masa_tenggang
                                }
                            })
                        };
                    }
                }
            });

            // $('[name=nama]').val(40).trigger('change');
        })
    </script>
@endpush
