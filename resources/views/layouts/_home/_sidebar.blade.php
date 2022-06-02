<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
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

        <li class="menu-header">Components</li>

        <li class="{{ set_active(['transaksi.index']) }}">
            <a href="{{ route('transaksi.index') }}"><i class="ion ion-folder"></i><span>Transaksi</span></a>
        </li>

        <li class="{{ set_active(['member.index']) }}">
            <a href="javascript:void(0);" class="has-dropdown">
                <i class="ion ion-folder"></i><span> Data</span></a>
            <ul class="menu-dropdown">
                <li class="{{ set_active(['member.index']) }}"><a href="{{ route('member.index') }}"><i
                            class="ion ion-ios-circle-outline"></i>
                        Member</a>
                </li>
            </ul>
        </li>

        <li class="">
            <a href="#"><i class="ion ion-folder"></i><span>Laporan</span></a>
        </li>
        <li class="{{ set_active(['pesan.index']) }}">
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
