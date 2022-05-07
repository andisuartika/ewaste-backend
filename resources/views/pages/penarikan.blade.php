@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Penarikan Saldo</title>
@endsection

@section('penarikan-saldo', 'side-menu--active')

@section('title', 'Penarikan Saldo')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Penarikan Saldo</h2>
        
    </div>
    <!-- BEGIN: Datatable -->
    @if ($transaksiPoinCount != null)
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">NASABAH</th>
                    <th class="border-b-2 whitespace-no-wrap">BANK</th>
                    <th class="border-b-2 whitespace-no-wrap">NAMA</th>
                    <th class="border-b-2 whitespace-no-wrap">JUMLAH</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                    <th class="border-b-2 whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksiPoin as $tr)
                    
                
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $tr->user()->get()->implode('name') }}</div>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $tr->user()->get()->implode('email') }}</div>
                        </td>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $tr->bank()->get()->implode('nama') }} | {{ $tr->nomor }}</div>
                        </td>
                        <td class="border-b">{{ $tr->nama }}</td>
                        <td class="border-b">Rp.{{ $tr->jumlah }}</td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center text-theme-6">
                                <i data-feather="clock" class="w-4 h-4 mr-2"></i> {{ $tr->status }}
                            </div>
                        </td>
                        <td class="border-b w-auto flex">
                            <a href="javascript:;" data-toggle="modal" data-target="#modal-tangguhkan" class="flex items-center  button button--xl bg-theme-6 text-white mr-2">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Tangguhkan
                            </a>
                            <div class="modal" id="modal-tangguhkan">
                                <div class="modal__content">
                                        <form action="{{ route('poinStore', $tr->id) }}" method="POST" enctype="multipart/form-data">
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
                                <a href="javascript:;" data-toggle="modal" data-target="#modal-store" class="flex items-center  button bg-theme-1 text-white">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"  ></i>Selesai
                                </a> 
                            </div>
                            <div class="modal" id="modal-store">
                                
                                <div class="modal__content">
                                    <form action="{{ route('poinStore', $tr->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="p-5 text-center"> <i data-feather="alert-circle" class="w-16 h-16 text-theme-1 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Apakah anda yakin?</div>
                                            <div class="text-gray-600 mt-2">Pastikan anda sudah melakukan transfer ke rekening yang sudah ditentukan!</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Batal</button> 
                                        <button type="submit" class="button w-24 bg-theme-1 text-white">Yakin</button> </div>
                                    </form>
                                </div>
                            </div> 
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if ($allTransaksiCount != null)
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">NASABAH</th>
                    <th class="border-b-2 whitespace-no-wrap">BANK</th>
                    <th class="border-b-2 whitespace-no-wrap">NAMA</th>
                    <th class="border-b-2 whitespace-no-wrap">JUMLAH</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allTransaksi as $tr)
                    
                
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $tr->user()->get()->implode('name') }}</div>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $tr->user()->get()->implode('email') }}</div>
                        </td>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">{{ $tr->bank()->get()->implode('nama') }} | {{ $tr->nomor }}</div>
                        </td>
                        <td class="border-b">{{ $tr->nama }}</td>
                        <td class="border-b">Rp.{{ $tr->jumlah }}</td>
                        <td class="w-40 border-b">
                            @if ($tr->status == 'BERHASIL')
                                <div class="flex items-center sm:justify-center text-theme-9">
                                    <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $tr->status }}
                                </div>
                            @else
                            <div class="flex items-center sm:justify-center text-theme-6">
                                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> {{ $tr->status }}
                            </div>
                            @endif
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>
    @endif
    <!-- END: Datatable -->
@endsection