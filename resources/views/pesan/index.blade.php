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
                        <table class="table table-striped table-hover table-responsive-sm">
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
                                                <a class="dropdown-item btn--kirim-pesan" href="#"
                                                    data-pesan="{{ $pesan->pesan }}" data-ke="member">
                                                    Kirim ke ++
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item btn--kirim-pesan-wa" href="#"
                                                    data-pesan="{{ $pesan->pesan }}" data-ke="semua">
                                                    Kirim ke semua member
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item btn--kirim-pesan-wa" href="#"
                                                    data-pesan="{{ $pesan->pesan }}" data-ke="masa-tenggang">
                                                    Dalam masa tenggang
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item btn--on-develop" href="#"
                                                    data-pesan="{{ $pesan->pesan }}" data-ke="mahasiswa">
                                                    Job: Mahasiswa
                                                </a>
                                            </div>
                                        </div>

                                        {{-- <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                    title="Kirim ke semua member" href="#">
                                                    Kirim ke semua member
                                                </a> --}}

                                        <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                            href="{{ route('pesan.edit', $pesan) }}">
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
    </section>
@endsection

{{-- modal --}}
@push('embed_modal')
    @include('layouts._modal-delete')
    @include('pesan._modal')
@endpush

@include('vendor.select2.select2')
{{-- @include('vendor.select2.style') --}}
@include('vendor.toastr.toastr')

@push('css_style')
    <style>
        .select2-selection--multiple .select2-search__field {
            width: 100% !important;
            margin-left: .3rem !important;
        }
    </style>
@endpush

{{-- script --}}
@push('js_script')
    <script>
        $(function() {
            /** Kirim pesan ke beberapa member */
            $('.btn--kirim-pesan').click(function() {
                $('#kirim-pesan-modal').modal('show')
                let pesan = $(this).data('pesan');
                $('#member-pesan').val(pesan)
            })

            $('#btn--kirim-ke-member').click(function() {
                let formData = $('#member-form').serialize()
                let pesanSelect = $('#member-select').val()
                // validate on empty select member
                if (pesanSelect == '') {
                    return toastr.error('Silahkan pilih member.');
                }

                $.ajax({
                    url: "{{ route('whatsapp.send') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        $('#btn--kirim-ke-member').attr('disabled', true)
                        $('.btn--kirim-text').text('Mengirim..');
                    },
                    success: function(response) {
                        console.log(response)
                        $('#btn--kirim-ke-member').attr('disabled', false)
                        $('.btn--kirim-text').text('Kirim');
                        if (response.success === false) {
                            return toastr.error(response.message);
                        }
                        toastr.success(response.message);
                    },
                    error: function(error) {
                        console.log(error)
                        toastr.warning(error.responseJSON.message);
                    },
                    complete: function() {
                        $('#btn--kirim-ke-member').attr('disabled', false)
                        $('.btn--kirim-text').text('Kirim');
                    }
                });
            })

            $('#kirim-pesan-modal').on('show.bs.modal', function() {
                console.log('opened')
                $('#member-select').select2({
                    dropdownParent: $("#kirim-pesan-modal"),
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
                })
            })

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

            /** on develop */
            $('.btn--on-develop').click(function() {
                toastr.warning('Masih dalam pengembangan.')
            })

        })
    </script>
@endpush
