@extends('layouts.home')

@section('title', 'Pesan')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">

                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <a href="{{ route('device.index') }}" class="btn btn-primary">Device</a>
                            <a href="{{ route('pesan.create') }}" class="btn btn-primary">Tambah Pesan</a>
                        </div>
                        <h4>Data Pesan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>#</th>
                                        <th>Keterangan</th>
                                        <th>Isi Pesan</th>
                                        <th class="text-center" style="width: 20%;">Action</th>
                                    </tr>

                                    @php $i = 0; @endphp
                                    @forelse ($pesans as $pesan)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $pesan->keterangan }}</td>
                                            <td>{{ $pesan->pesan }}</td>
                                            <td class="text-center">
                                                <span class="btn--pesan"></span>

                                                <div class="btn-group dropup mr-1 btn--pesan-wa">
                                                    <button type="button" class="btn btn-success btn-action dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="ion ion-social-whatsapp"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item btn--kirim-pesan-wa" href="#"
                                                            data-pesan="{{ $pesan->pesan }}" data-ke="semua">
                                                            Kirim ke semua member
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item btn--kirim-pesan-wa" href="#"
                                                            data-pesan="{{ $pesan->pesan }}" data-ke="masa-tenggang">
                                                            Dalam masa tenggang
                                                        </a>
                                                    </div>
                                                </div>

                                                {{-- <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Kirim ke semua member" href="#">
                                                    Kirim ke semua member
                                                </a> --}}

                                                <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Edit" href="{{ route('pesan.edit', $pesan) }}">
                                                    <i class="ion ion-edit"></i>
                                                </a>

                                                <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                    title="Delete" data-url="{{ route('pesan.destroy', $pesan) }}">
                                                    <i class="ion ion-trash-b"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-secondary text-center">Empty data.</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </table>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- modal --}}
@push('embed_modal')
    @include('layouts._modal-delete')
@endpush

{{-- style --}}
@push('css_style')
    <style>
        .table tr>td {
            vertical-align: middle;
        }
    </style>
@endpush

@include('vendor.toastr.toastr')

{{-- script --}}
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

            // $('.btn--pesan').html(
            //     `<button class="btn btn-success btn-action" disabled>Mengirim...</button> `
            // )
            // $('.btn--pesan-wa').hide();

            /** Kirim wa */
            $('.btn--kirim-pesan-wa').click(function(e) {
                let pesan = $(this).data('pesan');
                let ke = $(this).data('ke');

                $.ajax({
                    url: "{{ route('whatsapp.send') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        pesan,
                        ke
                    },
                    beforeSend: function() {
                        $('.btn--pesan').html(
                            `<button class="btn btn-success btn-action mr-1" disabled>Mengirim...</button> `
                        )
                        $('.btn--pesan-wa').hide();
                    },
                    success: function(response) {
                        console.log(response)
                        $('.btn--pesan-wa').show();
                        $('.btn--pesan').html('');
                        toastr.success(response.message);
                    },
                    error: function(error) {
                        console.log(error)
                        // $('.btn--pesan-wa').show();
                        toastr.warning(error.responseJSON.message);
                    },
                    complete: function() {
                        $('.btn--pesan').html('');
                        $('.btn--pesan-wa').show();
                    }
                });
            })

        })
    </script>
@endpush
