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
                        <div class="float-left">
                            <h4> Daftar Transaksi</h4>
                        </div>
                        <div class="float-right">

                            <form method="get" action="" class="d-inline">
                                <div class="input-group">
                                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary mr-2">Tambah
                                        Transaksi</a>
                                    {{-- Search --}}
                                    <input type="text" name="q" class="form-control"
                                        placeholder="Nama/Tgl/Tipe/Jenis/Harga.." value="{{ request()->get('q') }}">
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
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Tipe Member</th>
                                    <th>Jenis Member</th>
                                    <th>Harga</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                @php $i = 0; @endphp
                                @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $transaksi->member->nama }}</td>
                                        <td class="text-primary">
                                            {{ date_id($transaksi->tanggal_daftar) }}
                                        </td>
                                        <td>{{ ucwords($transaksi->tipe_member) }}</td>
                                        <td>
                                            <span
                                                class="badge badge-{{ $transaksi->jenis_member == 'gym' ? 'dark' : 'light border' }}">
                                                {{ ucwords($transaksi->jenis_member) }}
                                            </span>
                                        </td>
                                        <td>{{ rupiah($transaksi->harga) }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('transaksi.edit', $transaksi->id) }}">
                                                <i class="ion ion-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                title="Delete" data-url="{{ route('transaksi.destroy', $transaksi->id) }}">
                                                <i class="ion ion-trash-b"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-secondary text-center">Empty data.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </table>
                        </div>

                        {{ $transaksis->links() }}
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
