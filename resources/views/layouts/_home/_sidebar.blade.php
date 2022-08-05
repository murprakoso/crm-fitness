<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}">
            <img src="{{ asset('logo.png') }}" alt="logo" width="30" style="margin: -5px 0 0 -20px;">
            {{ env('APP_NAME') }}
        </a>
    </div>

    {{-- <div class="sidebar-user">
        <div class="sidebar-user-picture">
            <img alt="image" src="{{ asset('dist/img/avatar/avatar-1.jpeg') }}">
        </div>
        <div class="sidebar-user-details">
            <div class="user-name">Ujang Maman</div>
            <div class="user-role">
                Administrator
            </div>
        </div>
    </div> --}}

    <ul class="sidebar-menu">
        <li class="menu-header">Home</li>
        <li class="{{ set_active(['home']) }}">
            <a href="{{ route('home') }}"><i class="ion ion-speedometer"></i><span>Home</span></a>
        </li>

        <li class="menu-header">Menu</li>

        <li class="{{ set_active(['transaksi.*']) }}">
            <a href="{{ route('transaksi.index') }}"><i class="ion ion-ios-list-outline"></i><span>Transaksi</span></a>
        </li>

        <li class="{{ set_active(['presensi.*']) }}">
            <a href="{{ route('presensi.index') }}"><i class="ion ion-android-clipboard"></i><span>Presensi</span></a>
        </li>

        <li class="{{ set_active(['member.*', 'harga.*']) }}">
            <a href="javascript:void(0);" class="has-dropdown">
                <i class="ion ion-folder"></i><span> Data</span></a>
            <ul class="menu-dropdown">
                <li class="{{ set_active(['member.*']) }}"><a href="{{ route('member.index') }}"><i
                            class="ion ion-ios-circle-outline"></i>
                        Member</a>
                </li>
                <li class="{{ set_active(['harga.*']) }}"><a href="{{ route('harga.index') }}"><i
                            class="ion ion-ios-circle-outline"></i>
                        Harga</a>
                </li>
            </ul>
        </li>

        {{-- <li class="">
            <a href="#"><i class="ion ion-folder"></i><span>Absensi</span></a>
        </li> --}}

        <li class="{{ set_active(['pesan.*']) }}">
            <a href="{{ route('pesan.index') }}"><i class="ion ion-social-whatsapp"></i><span>Pesan</span></a>
        </li>

        {{-- LOGOUT --}}
        <li>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form-sidebar').submit();">
                <i class="ion ion-log-out"></i>
                Logout
            </a>

            <form id="logout-form-sidebar" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>


    </ul>
</aside>
