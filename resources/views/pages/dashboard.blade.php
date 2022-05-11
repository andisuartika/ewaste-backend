@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Dashboard</title>
@endsection

@section('dashboard', 'side-menu--active')
@section('title', 'Dashboard')

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Laporan Bulan ini</h2>
                    <a href="" class="ml-auto flex text-theme-1">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Refresh Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="download" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="35% Lebih rendah dari bulan lalu">
                                            35% <i data-feather="chevron-down" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $sampahMasuk }} <b class="text-lg">kg</b></div>
                                <div class="text-base text-gray-600 mt-1">Sampah Masuk</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="upload" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="25% Lebih banyak dari bulan lalu">
                                            25% <i data-feather="chevron-up" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $sampahKeluar }} <b class="text-lg">kg</b></div>
                                <div class="text-base text-gray-600 mt-1">Sampah Keluar</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="20% Lebih banyak dari bulan lalu">
                                            20% <i data-feather="chevron-up" class="w-4 h-4"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $nasabah }} <b class="text-lg">Pengguna</b></div>
                                <div class="text-base text-gray-600 mt-1">Nasabah Aktif</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user-check" class="report-box__icon text-theme-6"></i>
                                    
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $petugas }} <b class="text-lg">Petugas</b></div>
                                <div class="text-base text-gray-600 mt-1">Petugas Sampah</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Sales Report</h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" data-daterange="true" class="datepicker input w-full sm:w-56 box pl-10">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-theme-20 text-lg xl:text-xl font-bold">$15,000</div>
                                <div class="text-gray-600">This Month</div>
                            </div>
                            <div class="w-px h-12 border border-r border-dashed border-gray-300 mx-4 xl:mx-6"></div>
                            <div>
                                <div class="text-gray-600 text-lg xl:text-xl font-medium">$10,000</div>
                                <div class="text-gray-600">Last Month</div>
                            </div>
                        </div>
                        <div class="dropdown relative xl:ml-auto mt-5 xl:mt-0">
                            <button class="dropdown-toggle button font-normal border text-white relative flex items-center text-gray-700">
                                Filter by Category <i data-feather="chevron-down" class="w-4 h-4 ml-2"></i> 
                            </button>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 xl:right-0 z-20">
                                <div class="dropdown-box__content box p-2 overflow-y-auto h-32">
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">PC & Laptop</a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Smartphone</a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Electronic</a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Photography</a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Sport</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="report-chart">
                        <canvas id="report-line-chart" height="160" class="mt-6"></canvas>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Weekly Top Seller</h2>
                    <a href="" class="ml-auto text-theme-1 truncate">See all</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-pie-chart" height="280"></canvas>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div> 
                            <span class="truncate">17 - 30 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">62%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div> 
                            <span class="truncate">31 - 50 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">33%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div> 
                            <span class="truncate">>= 50 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">10%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <!-- BEGIN: Sales Report -->
            <div class="col-span-12 sm:col-span-6 lg:col-span-3 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Sales Report</h2>
                    <a href="" class="ml-auto text-theme-1 truncate">See all</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <canvas class="mt-3" id="report-donut-chart" height="280"></canvas>
                    <div class="mt-8">
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div> 
                            <span class="truncate">17 - 30 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">62%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div> 
                            <span class="truncate">31 - 50 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">33%</span>
                        </div>
                        <div class="flex items-center mt-4">
                            <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div> 
                            <span class="truncate">>= 50 Years old</span>
                            <div class="h-px flex-1 border border-r border-dashed border-gray-300 mx-3 xl:hidden"></div>
                            <span class="font-medium xl:ml-auto">10%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            
            <!-- BEGIN: General Report -->
            <div class="col-span-12 grid grid-cols-12 gap-6 mt-8">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">Target Sales</div>
                                <div class="text-gray-600 mt-1">300 Sales</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <canvas id="report-donut-chart-1" width="90" height="90"></canvas>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">20%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Social Media</div>
                            <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer ml-auto truncate">320 Followers</div>
                        </div>
                        <div class="mt-4">
                            <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate">New Products</div>
                                <div class="text-gray-600 mt-1">1450 Products</div>
                            </div>
                            <div class="flex-none ml-auto relative">
                                <canvas id="report-donut-chart-2" width="90" height="90"></canvas>
                                <div class="font-medium absolute w-full h-full flex items-center justify-center top-0 left-0">45%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-5 zoom-in">
                        <div class="flex">
                            <div class="text-lg font-medium truncate mr-3">Posted Ads</div>
                            <div class="py-1 px-2 rounded-full text-xs bg-gray-200 text-gray-600 cursor-pointer ml-auto truncate">180 Campaign</div>
                        </div>
                        <div class="mt-4">
                            <canvas class="simple-line-chart-1 -ml-1" height="60"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            
        </div>
        <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
            <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">Transaksi Terakhir</h2>
                    </div>
                    <div class="mt-5">
                        @foreach ($latestTransaksi as $transaksi)
                            <div class="intro-x">
                                <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                        <img alt="Midone Laravel Admin Dashboard Starter Kit" src="{{ asset('dist/images/profile-1.jpg') }}">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $transaksi->Nasabah()->get()->implode('name') }}</div>
                                        <div class="text-gray-600 text-xs">{{ $transaksi->created_at }}</div>
                                    </div>
                                    <div class="text-theme-9">+{{ $transaksi->items->count('kuantitas') }}Kg</div>
                                </div>
                            </div>
                        @endforeach
                        <a href="{{ route('validasi-tabungan') }}" class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-theme-15 text-theme-16">View More</a>
                    </div>
                </div>
                <!-- END: Transactions -->
                <!-- BEGIN: Tugas Perjalanan -->
                <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-auto">Tugas Perjalanan</h2>
                        <button data-carousel="important-notes" data-target="prev" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700 mr-2">
                            <i data-feather="chevron-left" class="w-4 h-4"></i>
                        </button>
                        <button data-carousel="important-notes" data-target="next" class="slick-navigator button px-2 border border-gray-400 flex items-center text-gray-700">
                            <i data-feather="chevron-right" class="w-4 h-4"></i>
                        </button>
                    </div>
                    <div class="mt-5 intro-x">
                        <div class="slick-carousel box zoom-in" id="important-notes">
                            @foreach ($tugasPerjalanan as $tugas)
                            <div class="p-5">
                                <div class="text-base font-medium truncate">{{ $tugas->user()->get()->implode('name') }}</div>
                                <div class="text-gray-500 mt-1">{{ $tugas->waktuTugas }}</div>
                                <div class="text-gray-600 text-justify mt-1">{{ $tugas->keterangan }}</div>
                                <div class="font-medium flex mt-5">
                                    <a href="{{ route('tugas-perjalanan') }}"><button type="button" class="button button--sm bg-gray-200 text-gray-600">Detial</button></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                            
                        </div>
                    </div>
                </div>
                <!-- END: Tugas Perjalanan -->
                
            </div>
        </div>
    </div>
@endsection