@push('style')
    {{-- <link href="{{ asset('dist/modules/datatables-buttons/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-buttons-bs4@2.2.2/css/buttons.bootstrap4.min.css"
        integrity="sha256-+MADGjy02FhABjfLmz7G3cU7QmqPGLfN7+8j/2UBd4k=" crossorigin="anonymous">
    <style>
        .dt-button-collection {
            /* width: auto !important; */
            width: 108px !important;
        }

        .dt-button-collection .dt-button {
            min-width: auto !important;
        }
    </style>
@endpush


@push('script')
    <script src="{{ asset('dist/modules/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/modules/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/modules/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dist/modules/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dist/modules/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dist/modules/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/modules/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dist/modules/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush
