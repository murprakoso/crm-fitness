@push('css_style')
    <link rel="stylesheet" href="{{ asset('dist/modules/toastr/build/toastr.min.css') }}">
@endpush
@push('js_script')
    <script src="{{ asset('dist/modules/toastr/build/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": false
            }
            toastr.success("{{ session('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": false
            }
            toastr.error("{{ session('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.options = {
                "closeButton": true,
                "progressBar": false
            }
            toastr.info("{{ session('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.options = {
                "closeButton": true,
                "progressBar": false
            }
            toastr.warning("{{ session('warning') }}");
        @endif
    </script>
@endpush
