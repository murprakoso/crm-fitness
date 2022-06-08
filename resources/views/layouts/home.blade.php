<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
        name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Home')</title>

    <link rel="icon" href="data:,">

    <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">

    @stack('css_style')

    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/skins/darksidebar.css') }}">

    {{-- jquery --}}
    <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">

                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="ion ion-navicon-round"></i></a></li>
                        {{-- <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="ion ion-search"></i></a></li> --}}
                    </ul>
                    {{-- <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn" type="submit"><i class="ion ion-search"></i></button>
                    </div> --}}
                </div>


                <ul class="navbar-nav navbar-right">
                    {{-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg beep"><i
                                class="ion ion-ios-bell-outline"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">View All</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <img alt="image" src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}"
                                        class="rounded-circle dropdown-item-img">
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <img alt="image" src="../dist/img/avatar/avatar-2.jpeg"
                                        class="rounded-circle dropdown-item-img">
                                    <div class="dropdown-item-desc">
                                        <b>Ujang Maman</b> has moved task <b>Fix bug footer</b> to <b>Progress</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <img alt="image" src="../dist/img/avatar/avatar-3.jpeg"
                                        class="rounded-circle dropdown-item-img">
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b> has moved task <b>Fix bug sidebar</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <img alt="image" src="../dist/img/avatar/avatar-4.jpeg"
                                        class="rounded-circle dropdown-item-img">
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b> has moved task <b>Fix bug navbar</b> to <b>Done</b>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <img alt="image" src="../dist/img/avatar/avatar-5.jpeg"
                                        class="rounded-circle dropdown-item-img">
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b> has moved task <b>Add logo</b> to <b>Done</b>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li> --}}


                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg">
                            <i class="ion ion-android-person d-lg-none"></i>
                            <div class="d-sm-none d-lg-inline-block">{{ auth()->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="profile" class="dropdown-item has-icon">
                                <i class="ion ion-android-person"></i> Profile
                            </a>

                            {{-- <a href="#" class="dropdown-item has-icon">
                                <i class="ion ion-log-out"></i> Logout
                            </a> --}}

                            <a class="dropdown-item has-icon" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ion ion-log-out"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>


            </nav>

            <div class="main-sidebar">
                @include('layouts._home._sidebar')
            </div>
            <div class="main-content">

                @yield('content')

            </div>


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a
                        href="https://multinity.com/">Multinity</a>
                </div>
                <div class="footer-right"></div>
            </footer>
        </div>
    </div>

    @stack('embed_modal')

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

    @stack('js_script')

</body>

</html>
