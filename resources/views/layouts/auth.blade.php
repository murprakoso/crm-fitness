<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    {{-- <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            Stisla
                        </div>

                        @yield('content')

                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>

    {{-- popper --}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    {{-- tooltip --}}
    <script src="https://cdn.jsdelivr.net/npm/tooltip@1.6.1/dist/Tooltip.min.js"
        integrity="sha256-/2poGFhTQg18AM3yNkzNogZLCMiiI6ZEj/UJW4mrDdM=" crossorigin="anonymous"></script>

    <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>


    <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
    <script src="{{ asset('dist/js/sa-functions.js') }}"></script>

    <script src="{{ asset('dist/js/scripts.js') }}"></script>
</body>

</html>
