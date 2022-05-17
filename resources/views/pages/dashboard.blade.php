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
                    <h2 class="text-lg font-medium truncate mr-5">Laporan Transaksi</h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-gray-700">
                        <i data-feather="calendar" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" data-daterange="true" class="datepicker input w-full sm:w-56 box pl-10">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-theme-20 text-lg xl:text-xl font-bold">{{ Str::rupiah($trBulanIni) }}</div>
                                <div class="text-gray-600">Bulan ini</div>
                            </div>
                            @if ($trBulanLalu != null)    
                            <div class="w-px h-12 border border-r border-dashed border-gray-300 mx-4 xl:mx-6"></div>
                            <div>
                                <div class="text-gray-600 text-lg xl:text-xl font-medium">{{ Str::rupiah($trBulanLalu) }}</div>
                                <div class="text-gray-600">Bulan lalu</div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="report-chart">
                        <div id="transaksi" style="min-width: 310px; height: 400px; max-width: 600px;" class="mt-6"></div>
                    </div>
                </div>
            </div>
            <!-- END: Sales Report -->
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 lg:col-span-6 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Sampah Masuk</h2>
                    <a href="" class="ml-auto text-theme-1 truncate">See all</a>
                </div>
                <div class="intro-y box p-5 mt-5">
                    <div class="flex flex-col xl:flex-row xl:items-center">
                        <div class="flex">
                            <div>
                                <div class="text-theme-20 text-lg xl:text-xl font-bold">{{ $sampahCount }} Kg</div>
                                <div class="text-gray-600">Total Sampah</div>
                            </div>
                        </div>
                    </div>
                    <div id="sampah" class="mt-6" style="min-width: 310px; height: 400px; max-width: 600px;"></div>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            
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
                                        <img alt="{{ $transaksi->Nasabah()->get()->implode('name') }}" src="{{ asset('dist/images/profile-1.jpg') }}">
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

                <!-- BEGIN: Weekly Best Sellers -->
                <div class="col-span-12 md:col-span-6 xl:col-span-4 xxl:col-span-12 mt-3 xxl:mt-3">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Sampah Minggu ini
                        </h2>
                    </div>
                    <div class="mt-5">
                        @foreach ($sampahMinggu as $s)
                            <div class="intro-y">
                                <div class="box px-4 py-4 mb-3 flex items-center zoom-in">
                                    <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                        <img alt="{{ $s['sampah'][0]->nama }}" src="{{ asset('dist/images/profile-1.jpg') }}">
                                    </div>
                                    <div class="ml-4 mr-auto">
                                        <div class="font-medium">{{ $s['sampah'][0]->nama }}</div>
                                        <div class="text-gray-600 text-xs">{{ $s['sampah'][0]->kategori()->get()->implode('nama') }}</div>
                                    </div>
                                    <div class="py-1 px-2 rounded-full text-xs bg-theme-9 text-white cursor-pointer font-medium">{{ $s['value'] }}Kg</div>
                                </div>
                            </div>
                        @endforeach
                        <a href="" class="intro-y w-full block text-center rounded-md py-4 border border-dotted border-theme-15 text-theme-16">View More</a> 
                    </div>
                </div>
                <!-- END: Weekly Best Sellers -->              
                
            </div>
        </div>
    </div>
@endsection
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var sampah = <?php echo json_encode($sampah)?>;
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('sampah', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title:{
                text:''
            },
            tooltip: {
                backgroundColor: '#fff',
                borderColor: 'black',
                borderRadius: 8,
                borderWidth: 0,
                zIndex: 11,
                formatter: function() {
                    return `<b>${this.key} (${this.percentage.toFixed(2)}%)</b><br> Jumlah ${this.y}Kg`;
                }
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            legend: {
                layout: 'horizontal',
                itemMarginTop: 20,
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    innerSize: '80%',
                    showInLegend: true,
                    colors: ['#36AE7C', '#187498', '#F9D923', '#EB5353', '#5F7161']
                }
            },
            series: [{
                name: 'Sampah',
                colorByPoint: true,
                data: sampah
            }],
            credits:{
                enabled:false,
            }
        });

        Highcharts.chart('transaksi', {
            chart: {
                type: 'spline'
            },
            title: {
                text: ''
            },

            yAxis: {
                title: false
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                    'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                accessibility: {
                    description: 'Months of the year'
                },
                
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            legend: {
                align: 'center',
                verticalAlign: 'bottom',
                x: 0,
                y: 0
            },
            plotOptions: {
                series: {
                    marker: {
                        enabled: false
                    },
                    cursor: 'pointer',
                }
            },

            series: [{
                name: 'Tabungan',
                data: [1500000, 2000000, 2150000, 2500000, 2350000, 2100000, 2650000, 2700000,2900000, 3150000, 3300000, 3500000],
                color: '#36AE7C', 
            }, {
                name: 'Iuran',
                data: [1000000, 1250000, 1500000, 1350000, 1250000, 1150000, 1500000, 2050000,1950000, 1450000, 1800000, 2250000,],
                color: '#5F7161',
                dashStyle: 'ShortDot'
            },],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'vertical',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits:{
                enabled:false,
            }

            });
    });

   
</script>
     
    