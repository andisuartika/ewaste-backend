@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Detail Validasi Transaksi</title>
@endsection

@section('validasi-tabungan', 'side-menu--active')

@section('title', 'Detail Validasi Transaksi')

@section('subcontent')
    
    <!-- BEGIN: Data List -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Detail Transaksi - {{ $kode }}
    </h2>
        <!-- BEGIN: Datatable -->
        <div class="intro-y datatable-wrapper box p-5 mt-5">
            <div class="flex flex-col lg:flex-row py-3">
                <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                    <div class="font-normal text-gray-600">Petugas</div>
                    <div class="font-semibold">{{ $perjalanan->user()->get()->implode('name') }}</div>
                </div>
                <div class="text-right ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                    <div class="font-normal text-gray-600">Tanggal</div>
                    <div class="font-semibold">{{ $perjalanan->waktuTugas}}</div>
                </div>
            </div>
            @if ($totalMasuk != null)
            <div class="overflow-x-auto mt-5">
                <div class="font-semibold">TRANSAKSI MASUK</div>
                <table class="table mt-2">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border-b-2  whitespace-no-wrap">NASABAH</th>
                            <th class="border-b-2 text-center   whitespace-no-wrap">ORGANIK</th>
                            <th class="border-b-2 text-center  whitespace-no-wrap">PLASTIK</th>
                            <th class="border-b-2 text-center  whitespace-no-wrap">KERTAS</th>
                            <th class="border-b-2 text-center  whitespace-no-wrap">LOGAM/BESI</th>
                            <th class="border-b-2 text-center  whitespace-no-wrap">PECAH BELAH</th>
                            <th class="border-b-2  whitespace-no-wrap">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $organik = 0;
                            $plastik = 0;
                            $kertas = 0;
                            $logam = 0;
                            $kaca = 0;
                        @endphp
                        @foreach ($transaksiMasuk as $t )
                        @php
                            $organik += $t->items[0]->kuantitas;
                            $plastik += $t->items[1]->kuantitas;
                            $kertas += $t->items[2]->kuantitas;
                            $logam += $t->items[3]->kuantitas;
                            $kaca += $t->items[4]->kuantitas;
                        @endphp
                        <tr>
                            <td class="border-b">
                                <div class="flex sm:justify-left">
                                        <div class="font-medium whitespace-no-wrap">{{ $t->nasabah()->get()->implode('name') }}</div>
                                </div>
                            </td>
                            @foreach ($t->items as $item )
                            <td class="border-b text-center">{{ $item->kuantitas }} Kg</td>
                            @endforeach
                            <td class="border-b">
                                Rp.{{ $t->total }}
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-200 text-gray-700">
                            <td class="border-b font-semibold">Total Sampah: {{ $organik+$plastik+$kertas+$logam+$kaca }} Kg</td>
                            <td class="border-b font-semibold text-center">{{ $organik}} Kg</td>
                            <td class="border-b font-semibold text-center">{{ $plastik}} Kg</td>
                            <td class="border-b font-semibold text-center">{{ $kertas}} Kg</td>
                            <td class="border-b font-semibold text-center">{{ $logam}} Kg</td>
                            <td class="border-b font-semibold text-center">{{ $kaca}} Kg</td>
                            <td class="border-b font-semibold">Rp.{{ $totalMasuk}}</td>
                        </tr>
                        
                    </tfoot>
                </table>
            </div>
            @endif

            @if ($totalIurans != null)
                
            {{-- TRANSAKSI IURNAS --}}
            <div class="overflow-x-auto mt-5">
                <div class="font-semibold">TRANSAKSI IURANS</div>
                <table class="table mt-2">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border-b-2  whitespace-no-wrap">NASABAH</th>
                            <th class="border-b-2 text-center  whitespace-no-wrap">SAMPAH CAMPURAN</th>
                            <th class="border-b-2 whitespace-no-wrap">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $campuran = 0;
                        @endphp
                        @foreach ($transaksiIurans as $t )
                        @php
                            $campuran += $t->items[0]->kuantitas;
                        @endphp
                        <tr>
                            <td class="border-b">
                                <div class="flex sm:justify-left">
                                        <div class="font-medium whitespace-no-wrap">{{ $t->nasabah()->get()->implode('name') }}</div>
                                </div>
                            </td>
                            @foreach ($t->items as $item )
                            <td class="border-b text-center">{{ $item->kuantitas }} Kg</td>
                            @endforeach
                            <td class="border-b">
                                Rp.{{ $t->total }}
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-gray-200 text-gray-700">
                            <td class="border-b font-semibold">Total Sampah </td>
                            <td class="border-b font-semibold text-center"> {{ $campuran }} Kg</td>
                            <td class="border-b font-semibold">Rp.{{ $totalIurans}}</td>
                        </tr>
                        
                    </tfoot>
                </table>
            </div>
            @endif
            @if (!isset($perjalanan->waktuSelesai))
                <div class="flex flex-wrap justify-end lg:flex-no-wrap items-center text-right py-5 mt-5">
                    <button  class="flex items-center  button button--xl bg-gray-200 text-gray-600 mr-2" disabled>
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Tangguhkan
                    </button>
                    <div class="text-center"> 
                        <button class="flex items-center  button bg-gray-200 text-gray-600" disabled>
                            <i data-feather="check-square" class="w-4 h-4 mr-2"  ></i>Diterima
                        </button> 
                    </div>   
                </div>
            @else
                <div class="flex flex-wrap justify-end lg:flex-no-wrap items-center text-right py-5 mt-5">
                    <a href="javascript:;" data-toggle="modal" data-target="#modal-tangguhkan" class="flex items-center  button button--xl bg-theme-6 text-white mr-2">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Tangguhkan
                    </a>
                    <div class="modal" id="modal-tangguhkan">
                        <div class="modal__content">
                                <form action="{{ route('updateValidasi', $perjalanan->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="form-group">
                                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                        <h2 class="font-medium text-base mr-auto">
                                            Tambahkan Keterangan
                                        </h2>
                                    </div>
                                    <input type="hidden" name="ditangguhkan" id="ditangguhkan" value="DITANGGUHKAN">
                                    <div class="p-5 grid grid-cols-12">
                                        <div class="col-span-12"> 
                                            <label>Keterangan</label> 
                                            <input type="text" name="keterangan" id="keterangan" class="input w-full border mt-2 flex-1" placeholder="Alasan ditangguhkan"> 
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200">
                                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                                    <button type="submit"  class="button w-20 bg-theme-1 text-white">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-center"> 
                        <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview" class="flex items-center  button bg-theme-1 text-white">
                            <i data-feather="check-square" class="w-4 h-4 mr-2"  ></i>Diterima
                        </a> 
                    </div>
                    <div class="modal" id="delete-modal-preview">

                        <div class="modal__content">
                            <form action="{{ route('updateValidasi', $perjalanan->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="p-5 text-center"> <i data-feather="alert-circle" class="w-16 h-16 text-theme-1 mx-auto mt-3"></i>
                                    <div class="text-3xl mt-5">Apakah anda yakin?</div>
                                    <div class="text-gray-600 mt-2">Semua transaksi diterima dan poin akan masuk ke nasabah</div>
                                </div>
                                <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Batal</button> 
                                <button type="submit" class="button w-24 bg-theme-1 text-white">Yakin</button> </div>
                            </form>
                        </div>
                    </div>    
                </div>
            @endif
        </div>
        <!-- END: Datatable -->
        

    <!-- END: Data List -->

@endsection

