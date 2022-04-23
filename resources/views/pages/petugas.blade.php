@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Petugas</title>
@endsection
@section('pengguna', 'side-menu--active')
@section('petugas', 'side-menu--active')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Petugas Sampah</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Add New User</button>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Add Group
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Send Message
                        </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600">Menampilkan 1 sampai 10 dari {{ $petugasCount }} petugas</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Users Layout -->
        @foreach ($petugas as $user)
        <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
            <div class="box">
                <div class="flex items-start px-5 pt-5">
                    <div class="w-full flex flex-col lg:flex-row items-center">
                        <div class="w-16 h-16 image-fit">
                            <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-md" src="{{ asset('dist/images/profile-1.jpg') }}">
                        </div>
                        <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                            <a href="" class="font-medium uppercase">{{ $user->name }}</a>
                            <div class="text-gray-600 text-xs capitalize">{{ $user->roles }}</div>
                        </div>
                    </div>
                </div>
                <div class="text-center lg:text-left p-5">
                    <div>{{ $user->alamat }}</div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5">
                        <i data-feather="mail" class="w-3 h-3 mr-2"></i>{{ $user->email }}
                    </div>
                    <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1">
                        <i data-feather="phone" class="w-3 h-3 mr-2"></i>{{ $user->noHp }}
                    </div>
                </div>
                <div class="text-center lg:text-right p-5 border-t border-gray-200 flex justify-end">
                    <button class="button text-white flex items-center justify-center bg-theme-6 mr-2"><i data-feather="user-x" class="w-4 h-4 mr-2"></i>Hapus</button>
                    <a href="{{ route('detailPetugas', $user->id) }}">
                        <button class="button flex items-center justify-center bg-gray-200 text-gray-600 mr-2"><i data-feather="user" class="w-4 h-4 mr-2"></i>Detail</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
        
        
        <!-- END: Users Layout -->
        <!-- BEGIN: Pagination -->
        {{-- <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
            <ul class="pagination">
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">1</a>
                </li>
                <li>
                    <a class="pagination__link pagination__link--active" href="">2</a>
                </li>
                <li>
                    <a class="pagination__link" href="">3</a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-right"></i>
                    </a>
                </li>
            </ul>
            <select class="w-20 input box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div> --}}
        <!-- END: Pagination -->
    </div>
@endsection