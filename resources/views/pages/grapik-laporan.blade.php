@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Grafik Laporan</title>
@endsection
@section('grafik-laporan', 'side-menu--active')

@section('title', 'Grafik Laporan')

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Grafik Laporan</h2>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Sampah Chart -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Grafik Sampah Campuran dan Terpilah</h2>
                </div>
                <div class="p-5" id="vertical-bar-chart">
                    <div class="preview">
                        <div id="chart1" class="mt-6" style="min-width: 310px; height: 350px; max-width: 600px;"></div>
                    </div>
                </div>
            </div>
            <!-- END: Sampah Bar Chart -->
            <!-- BEGIN: Tabungan Iuran Chart -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Grafik Sampah</h2>
                </div>
                <div class="p-5" id="horizontal-bar-chart">
                    <div class="preview">
                        <div id="chart3" class="mt-6" style="min-width: 310px; height: 350px; max-width: 600px;"></div>
                    </div>
                </div>
            </div>
            <!-- END: Tabungan Iuran Chart -->

        </div>
        <div class="col-span-12 lg:col-span-6">
            <!-- BEGIN: Tabungan Iuran Chart -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Grafik Iuran dan Tabungan</h2>
                </div>
                <div class="p-5" id="horizontal-bar-chart">
                    <div class="preview">
                        <div id="chart2" class="mt-6" style="min-width: 310px; height: 350px; max-width: 600px;"></div>
                    </div>
                </div>
            </div>
            <!-- END: Tabungan Iuran Chart -->
            <!-- BEGIN: Line Chart -->
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Grafik Nasabah</h2>
                </div>
                <div class="p-5" id="horizontal-bar-chart">
                    <div class="preview">
                        <div id="chart4" class="mt-6" style="min-width: 310px; height: 350px; max-width: 600px;"></div>
                    </div>
                </div>
            </div>
            <!-- END: Line Chart -->
            
        </div>
    </div>    
@endsection

<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    var sampahCampuran = <?php echo json_encode($sampahCampuran)?>;
    var sampahTerpilah = <?php echo json_encode($sampahTerpilah)?>;
    var dataTabungan = <?php echo json_encode($dataTabungan)?>;
    var dataIurans = <?php echo json_encode($dataIurans)?>;
    var sampah = <?php echo json_encode($sampah)?>;
    var dataUsers = <?php echo json_encode($dataUsers)?>;
    document.addEventListener('DOMContentLoaded', function () {
        const chart = Highcharts.chart('chart1', {
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
                    showInLegend: true,
                    colors: ['#36AE7C', '#187498', '#F9D923', '#EB5353', '#5F7161']
                }
            },
            series: [{
                name: 'Sampah',
                colorByPoint: true,
                data:[ {
                    name: 'Sampah Terpilah',
                    y : sampahTerpilah
                },
                {
                    name: 'Sampah Campuran',
                    y : sampahCampuran
                },]
            }],
            credits:{
                enabled:false,
            }
        });


        Highcharts.chart('chart2', {
            chart: {
                type: 'column'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'May',
                    'Jun',
                    'Jul',
                    'Aug',
                    'Sep',
                    'Oct',
                    'Nov',
                    'Dec'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Tabungan',
                data: dataTabungan,
                color: '#36AE7C',

            }, {
                name: 'Iuran',
                data:dataIurans,
                color: '#187498'

            }],
            credits:{
                enabled:false,
            }
        });

        Highcharts.chart('chart3', {
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
                    innerSize: '75%',
                    showInLegend: true,
                    colors: ['#36AE7C', '#187498', '#F9D923', '#EB5353', '#5F7161']
                }
            },
            series: [{
                name: 'Sampah',
                colorByPoint: true,
                data:[
                    {
                        name: 'Organik',
                        y : sampah[0]
                    },
                    {
                        name: 'Plastik',
                        y : sampah[1]
                    },
                    {
                        name: 'Kertas',
                        y : sampah[2]
                    },
                    {
                        name: 'Besi & Logam',
                        y : sampah[3]
                    },
                    {
                        name: 'Pecah Belah',
                        y : sampah[4]
                    },
                ]
            }],
            credits:{
                enabled:false,
            }
        });

        Highcharts.chart('chart4', {
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
                name: 'Nasabah',
                data: dataUsers,
                color: '#36AE7C', 
            }],

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