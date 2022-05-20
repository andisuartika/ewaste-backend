<!-- BEGIN: Mobile Menu -->
<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="w-6" src="{{ asset('dist/images/ewaste.svg') }}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler">
            <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i>
        </a>
    </div>
    <ul class="border-t border-theme-24 py-5 hidden">
        <li>
            <a href="{{ route('dashboard') }}" class="menu @yield('dashboard')">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu @yield('pengguna')">
                <div class="menu__icon"> <i data-feather="users"></i> </div>
                <div class="menu__title"> Pengguna <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('nasabah') }}" class="menu @yield('nasabah')">
                        <div class="menu__icon"> <i data-feather="user"></i> </div>
                        <div class="menu__title"> Nasabah </div>
                    </a>
                </li>
                <li>
                    <a href="@yield('petugas')" class="menu @yield('petugas')">
                        <div class="menu__icon"> <i data-feather="user-check"></i> </div>
                        <div class="menu__title"> Petugas </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('sampah') }}" class="menu @yield('sampah')">
                <div class="menu__icon"> <i data-feather="trash-2"></i> </div>
                <div class="menu__title"> Sampah </div>
            </a>
        </li>
        <li>
            <a href="{{ route('tugas-perjalanan') }}" class="menu @yield('tugas-perjalanan')">
                <div class="menu__icon"> <i data-feather="truck"></i> </div>
                <div class="menu__title"> Tugas Perjalanan </div>
            </a>
        </li>
        <li>
            <a href="{{ route('validasi-tabungan') }}" class="menu @yield('validasi-tabungan')">
                <div class="menu__icon"> <i data-feather="check-circle"></i> </div>
                <div class="menu__title"> Validasi Tabungan </div>
            </a>
        </li>
        <li>
            <a href="{{ route('pembayaran-iurans') }}" class="menu @yield('pembayaran-iurans')">
                <div class="menu__icon"> <i data-feather="dollar-sign"></i> </div>
                <div class="menu__title"> Pembayaran Iuran </div>
            </a>
        </li>
        <li>
            <a href="{{ route('penarikan-saldo') }}" class="menu @yield('penarikan-saldo')">
                <div class="menu__icon"> <i data-feather="award"></i> </div>
                <div class="menu__title"> Penarikan Saldo </div>
            </a>
        </li>
        <li>
            <a href="{{ route('grafik-laporan') }}" class="menu @yield('grafik-laporan')">
                <div class="menu__icon"> <i data-feather="bar-chart-2"></i> </div>
                <div class="menu__title"> Grafik Laporan </div>
            </a>
        </li>
        <li class="nav__devider my-6"></li>
        <li>
            <a href="{{ route('artikel') }}" class="menu @yield('artikel')">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title"> Artikel </div>
            </a>
        </li>
        <li>
            <a href="{{ route('push-notif') }}" class="menu @yield('push-notifikasi')">
                <div class="menu__icon"> <i data-feather="bell"></i> </div>
                <div class="menu__title"> Push Notifikasi </div>
            </a>
        </li>
        <li>
            <a href="{{ route('banner') }}" class="menu @yield('banner')">
                <div class="menu__icon"> <i data-feather="image"></i> </div>
                <div class="menu__title"> Banner</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu @yield('tentang-aplikasi')">
                <div class="menu__icon"> <i data-feather="settings"></i> </div>
                <div class="menu__title"> Tentang Aplikasi <i data-feather="chevron-down" class="menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{ route('tentang-aplikasi') }}" class="menu @yield('tentang-aplikasi')">
                        <div class="menu__icon"> <i data-feather="info"></i> </div>
                        <div class="menu__title"> Tentang Aplikasi </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('panduan-aplikasi') }}" class="menu @yield('panduan-aplikasi')">
                        <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="menu__title"> Panduan Aplikasi </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('snk-aplikasi') }}" class="menu @yield('snk-aplikasi')">
                        <div class="menu__icon"> <i data-feather="alert-circle"></i> </div>
                        <div class="menu__title"> S&K Aplikasi </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('kontak') }}" class="menu @yield('kontak')">
                        <div class="menu__icon"> <i data-feather="link"></i> </div>
                        <div class="menu__title"> Kontak </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
<!-- END: Mobile Menu -->