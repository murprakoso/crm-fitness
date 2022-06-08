{{-- @push('css_style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"
        integrity="sha256-zaSoHBhwFdle0scfGEFUCwggPN7F+ip9XRglo8IWb4w=" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-theme@0.1.0-beta.10/dist/select2-bootstrap.min.css"
        integrity="sha256-nbyata2PJRjImhByQzik2ot6gSHSU4Cqdz5bNYL2zcU=" crossorigin="anonymous">
@endpush
@push('js_script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"
        integrity="sha256-9yRP/2EFlblE92vzCA10469Ctd0jT48HnmmMw5rJZrA=" crossorigin="anonymous"></script>
@endpush --}}


@push('css_style')
    <link rel="stylesheet" href="{{ asset('dist/modules/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('js_script')
    <script src="{{ asset('dist/modules/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/modules/select2/js/i18n/' . config('app.locale') . '.js') }}"></script>
@endpush
