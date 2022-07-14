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
                            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Tipe Member</th>
                                    <th>Jenis Member</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                                @php $i = 0; @endphp
                                @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $transaksi->member->nama }}</td>
                                        <td class="text-primary">
                                            {{ date('d, F Y', strtotime($transaksi->tanggal_daftar)) }}</td>
                                        <td>{{ ucwords($transaksi->tipe_member) }}</td>
                                        <td>{{ ucwords($transaksi->jenis_member) }}</td>
                                        <td>{{ rupiah($transaksi->harga) }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('transaksi.edit', $transaksi->id) }}">
                                                <i class="ion ion-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                title="Delete"
                                                data-url="{{ route('transaksi.destroy', $transaksi->id) }}">
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
