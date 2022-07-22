@push('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.11.4/css/dataTables.bootstrap4.min.css"
        integrity="sha256-lDWLG10paq84N0F/7818mEj3YW5d6LCSBmIj2LirkYo=" crossorigin="anonymous">
    <style>
        div.dataTables_wrapper div.dataTables_processing {
            box-shadow: 0 .15rem 1.75rem 0 rgba(58, 59, 69, .15) !important;
            color: #4e73df;
            z-index: 1;
        }
    </style>
@endpush

@push('script')
    {{-- DataTable --}}
    <script src="https://cdn.jsdelivr.net/npm/datatables.net@1.11.4/js/jquery.dataTables.min.js"
        integrity="sha256-hMOOju/zavxcwBsZt0hWn5kBaKk6QOfAKiAUgCJvUi0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/datatables.net-bs4@1.11.4/js/dataTables.bootstrap4.min.js"
        integrity="sha256-2MzaecCGkwO775PvRJkqMTd4sR6cuRiQlkT2iUeCsSU=" crossorigin="anonymous"></script>
@endpush
