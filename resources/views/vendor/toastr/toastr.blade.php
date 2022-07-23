@push('css_style')
    <link rel="stylesheet" href="{{ asset('dist/modules/toastr/build/toastr.min.css') }}">
@endpush
@push('js_script')
    <script src="{{ asset('dist/modules/toastr/build/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": false,
            "positionClass": "toast-bottom-right"
        }

        @if (Session::has('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endpush
