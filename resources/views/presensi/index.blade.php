@extends('layouts.home')

@section('title', 'Presensi')

@section('content')
    <section class="section">
        <h1 class="section-header">
            <div>@yield('title')</div>
        </h1>

        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        {{-- Form presensi --}}
                        {{ Form::open(['route' => 'presensi.store']) }}
                        <div class="input-group mb-3">
                            <select name="member" class="form-control" aria-describedby="button-addon2" required></select>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="button-addon2">
                                    <i class="ion ion-android-clipboard"></i>&nbsp;
                                    Hadir
                                </button>
                            </div>
                        </div>
                        {{ Form::close() }}

                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Keterangan</th>
                                    <th>Action</th>
                                </tr>
                                @php $i = 0; @endphp
                                @forelse ($presensis as $presensi)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td class="font-weight-bold">
                                            @if ($presensi->member->foto && file_exists(public_path('images/' . $presensi->member->foto)))
                                                <img src="{{ asset('images/' . $presensi->member->foto) }}" alt="avatar"
                                                    width="30" height="30" class="rounded-circle mr-1">
                                            @else
                                                <img src="{{ asset('images/default.png') }}" alt="avatar" width="30"
                                                    class="rounded-circle mr-1">
                                            @endif
                                            {{ $presensi->member->nama }}
                                        </td>
                                        <td>{{ date_id($presensi->created_at) }}</td>
                                        <td>{{ time_id($presensi->created_at) }}</td>
                                        <td>
                                            <span class="badge badge-info">{{ $presensi->keterangan }}</span>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                title="Delete" data-url="{{ route('presensi.destroy', $presensi) }}">
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
                            {{ $presensis->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection


@push('embed_modal')
    @include('layouts._modal-delete')
@endpush

@include('vendor.select2.select2')
@include('vendor.toastr.toastr')

@push('css_style')
    <style>
        .select2-selection__rendered {
            line-height: 45px !important;
        }

        .select2-selection__arrow {
            height: 0px !important;
        }

        /* set height */
        .select2-container--bootstrap4 .select2-selection--single {
            height: calc(1.5em + 0.75rem + 13px) !important;
        }

        /* set line-height placeholder */
        .select2-container--bootstrap4 .select2-selection--single .select2-selection__placeholder {
            line-height: 45px;
            color: #574b90;
        }

        /* set clear btn */
        .select2-container--bootstrap4 .select2-selection__clear {
            margin-top: 1rem !important;
        }
    </style>
@endpush


@push('js_script')
    <script>
        $(function() {
            // User/Member
            $('[name=member]').select2({
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
