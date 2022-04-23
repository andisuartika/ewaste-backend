@extends('../layouts/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layouts/components/mobile-menu')
    <div class="flex ">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav bg-theme-3">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="ewaste logo" class="w-6" src="{{ asset('dist/images/ewaste.svg') }}" alt="ewaste-logo">
                <span class="hidden xl:block text-white text-lg ml-3 font-medium">E-WASTE</span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="{{ route('dashboard') }}" class="side-menu @yield('dashboard')">
                        <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                        <div class="side-menu__title"> Dashboard </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu @yield('pengguna')">
                        <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                        <div class="side-menu__title"> Pengguna <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('nasabah') }}" class="side-menu @yield('nasabah')">
                                <div class="side-menu__icon"> <i data-feather="user"></i> </div>
                                <div class="side-menu__title"> Nasabah </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('petugas') }}" class="side-menu @yield('petugas')">
                                <div class="side-menu__icon"> <i data-feather="user-check"></i> </div>
                                <div class="side-menu__title"> Petugas </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="@yield('sampah')" class="side-menu @yield('sampah')">
                        <div class="side-menu__icon"> <i data-feather="trash-2"></i> </div>
                        <div class="side-menu__title"> Sampah </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('tugas-perjalanan') }}" class="side-menu @yield('tugas-perjalanan')">
                        <div class="side-menu__icon"> <i data-feather="truck"></i> </div>
                        <div class="side-menu__title"> Tugas Perjalanan </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('validasi-tabungan') }}" class="side-menu @yield('validasi-tabungan')">
                        <div class="side-menu__icon"> <i data-feather="check-circle"></i> </div>
                        <div class="side-menu__title"> Validasi Tabungab </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('penarikan-saldo') }}" class="side-menu @yield('penarikan-saldo')">
                        <div class="side-menu__icon"> <i data-feather="dollar-sign"></i> </div>
                        <div class="side-menu__title"> Penarikan Saldo </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('grapik-laporan') }}" class="side-menu @yield('grapik-laporan')">
                        <div class="side-menu__icon"> <i data-feather="bar-chart-2"></i> </div>
                        <div class="side-menu__title"> Grapik Laporan </div>
                    </a>
                </li>
                <li class="side-nav__devider my-6"></li>
                <li>
                    <a href="{{ route('push-notif') }}" class="side-menu @yield('push-notifikasi')">
                        <div class="side-menu__icon"> <i data-feather="bell"></i> </div>
                        <div class="side-menu__title"> Push Notifikasi </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('banner') }}" class="side-menu @yield('banner')">
                        <div class="side-menu__icon"> <i data-feather="image"></i> </div>
                        <div class="side-menu__title"> Banner</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu @yield('tentang-aplikasi')">
                        <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                        <div class="side-menu__title"> Tentang Aplikasi <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="{{ route('tentang-aplikasi') }}" class="side-menu @yield('tentang-aplikasi')">
                                <div class="side-menu__icon"> <i data-feather="info"></i> </div>
                                <div class="side-menu__title"> Tentang Aplikasi </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('panduan-aplikasi') }}" class="side-menu @yield('panduan-aplikasi')">
                                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                                <div class="side-menu__title"> Panduan Aplikasi </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('snk-aplikasi') }}" class="side-menu @yield('snk-aplikasi')">
                                <div class="side-menu__icon"> <i data-feather="alert-circle"></i> </div>
                                <div class="side-menu__title"> S&K Aplikasi </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kontak') }}" class="side-menu @yield('kontak')">
                                <div class="side-menu__icon"> <i data-feather="link"></i> </div>
                                <div class="side-menu__title"> Kontak </div>
                            </a>
                        </li>
                    </ul>
                </li>              
            </ul>
        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layouts/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection