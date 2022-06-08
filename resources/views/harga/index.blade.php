@extends('layouts.home')

@section('title', 'Harga')

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
                        <div class="float-right">
                            <a href="{{ route('harga.create') }}" class="btn btn-primary">Tambah Harga</a>
                        </div>
                        <h4>DATA HARGA</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Gender</th>
                                    <th>Nama/Keterangan</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                                @php $i = 0; @endphp
                                @forelse ($dataHarga as $harga)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $harga->gender }}</td>
                                        <td class="text-primary">{{ $harga->keterangan }}</td>
                                        <td>{{ rupiah($harga->harga) }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"
                                                href="{{ route('harga.edit', $harga->id) }}">
                                                <i class="ion ion-edit"></i>
                                            </a>
                                            <a class="btn btn-danger btn-action btn--delete" data-toggle="tooltip"
                                                title="Delete" data-url="{{ route('harga.destroy', $harga->id) }}">
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
