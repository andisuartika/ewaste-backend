<div>
    <!-- BEGIN: Users Layout -->
    @if ($perjalanans->count() != null)
    <h2 class="intro-y text-lg font-medium mt-10">Validasi Transaksi</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        @foreach ($perjalanans as $perjalanan )
        
        <div class="intro-y col-span-12 md:col-span-6">
            <div class="box">
                <div class="flex flex-col lg:flex-row  p-5">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left mt-3 lg:mt-0">
                        <div class="font-semibold">{{ $perjalanan->kode }}</div>
                        <div class="font-normal text-gray-600">{{ $perjalanan->keterangan }}</div>
                    </div>
                    <div class="flex -ml-2 lg:ml-0 lg:justify-end mt-3 lg:mt-0">
                        <p href="" class="font-medium text-gray-600">{{ $perjalanan->waktuTugas }}</p> 
                    </div>
                </div>
                <div class="px-5 border-b border-gray-200 pb-3">
                    <div class="lg:ml-2 lg:mr-auto text-center lg:text-left lg:mt-0">
                        <div class="font-semibold">{{ $perjalanan->user()->get()->implode('name') }} ({{ $perjalanan->user()->get()->implode('roles') }})</div>
                        <div class="font-normal text-sm">{{ $perjalanan->status }}</div>
                    </div>
                </div>
                <div class="flex flex-wrap justify-end lg:flex-no-wrap items-center text-right p-5">
                    <a href="{{ route('detailValidasi',$perjalanan->id) }}" class="flex items-center  button button--sm text-gray-700 border border-gray-300 mr-2">
                        <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Detail</a>
                    <div class="dropdown relative"> <button class="flex items-center  dropdown-toggle button button--sm bg-theme-1 text-white">
                        <i data-feather="settings" class="w-4 h-4 mr-2"></i>Aksi</button>
                        <div class="dropdown-box mt-10 absolute w-48 top-0 left-0 z-20">
                            <div class="dropdown-box__content box p-2"> 
                                <a href="{{ $perjalanan->id }}" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> 
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Konfirmasi
                                </a> 
                                <a href="" class="flex items-center  p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> 
                                    <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> Tangguhkan
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
    @endif
    <!-- END: Users Layout -->

    <!-- BEGIN: Data List -->
    <h2 class="intro-y text-lg font-medium mt-10">
        Daftar Transaksi
    </h2>
    <div wire:ignore class=" datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2  whitespace-no-wrap">PETUGAS</th>
                    <th class="border-b-2  whitespace-no-wrap">NASABAH</th>
                    <th class="border-b-2 text-center  whitespace-no-wrap">KODE PERJALANAN</th>
                    <th class="border-b-2  whitespace-no-wrap">JUMLAH</th>
                    <th class="border-b-2  whitespace-no-wrap">TANGGAL</th>
                    <th class="border-b-2  whitespace-no-wrap">JENIS TRANSAKSI</th>
                    <th class="border-b-2  text-center whitespace-no-wrap">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allTransaksi as $transaksi )
                <tr>
                    <td class="border-b">
                        <div class="flex sm:justify-left">
                                <div class="font-medium whitespace-no-wrap @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">{{ $transaksi->petugas()->get()->implode('name') }}</div>
                        </div>
                    </td>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-left">
                            <div class="font-medium whitespace-no-wrap @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">{{ $transaksi->nasabah()->get()->implode('name') }}</div>                               
                        </div>
                    </td>
                    <td class="border-b text-center @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">{{ $transaksi->perjalanan()->get()->implode('kode') }}</td>
                    <td class="border-b @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">Rp.{{ $transaksi->total }}</td>
                    <td class="border-b @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">{{ $transaksi->created_at }}</td>
                    <td class="border-b @if ($transaksi->jenisTransaksi == "TRANSAKSI IURANS") text-theme-6 @endif">{{ $transaksi->jenisTransaksi }}</td>
                    <td class="w-40 border-b">
                        @if ($transaksi->status == 'PENDING')
                            <div class="flex items-center sm:justify-center text-theme-1">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Pending
                            </div>
                        @elseif ($transaksi->status == 'BERHASIL')
                        <div class="flex items-center sm:justify-center text-theme-9">
                            <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Selesai
                        </div>
                        @elseif ($transaksi->status == 'DITANGGUHKAN')
                            <div class="flex items-center sm:justify-center text-theme-6">
                                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> Ditangguhkan
                            </div>
                        @endif
                    </td>
                    
                </tr>
                @endforeach   
            </tbody>
        </table>
        
    </div>

    <!-- END: Data List -->
</div>
