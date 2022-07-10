@extends('layouts.home')

@section('title', 'Transaksi')

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
                        <h4> Pendaftaran Member</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <form action="{{ route('transaksi.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label> Nama</label>
                                        <select name="nama" class="form-control" required style="width: 100%;">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Tanggal Transaksi/Daftar</label>
                                        <input type="text" name="tanggal_daftar" class="form-control" required
                                            autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label> Tipe Member</label>
                                        <select name="member" class="form-control" required>
                                            <option value="">-- Pilih Tipe Member --</option>
                                            <option value="harian">Harian</option>
                                            <option value="tetap">Tetap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Jenis Member</label>
                                        <select name="jenis_member" class="form-control" required>
                                            <option value="">-- Pilih Jenis Member --</option>
                                            <option value="Cardio">Cardio</option>
                                            <option value="Gym">Gym</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label> Harga</label>
                                        <select name="harga" class="form-control" required style="width: 100%;">
                                        </select>
                                    </div>


                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
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
                                    text: `${item.harga} (${item.keterangan})`,
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
        })
    </script>
@endpush
