<div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2  whitespace-no-wrap">NASABAH</th>
                    <th class="border-b-2  whitespace-no-wrap">EMAIL</th>
                    <th class="border-b-2  whitespace-no-wrap">NO HANPHONE</th>
                    <th class="border-b-2 whitespace-no-wrap">IURAN SAMPAH</th>
                    <th class="border-b-2 whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>
                    <td class="border-b">
                        <div class="flex sm:justify-left">
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                            </div>
                            <div class="ml-3">
                                <div class="font-medium whitespace-no-wrap">{{ $user->name }}</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $user->alamat }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-left">
                            <div class="font-medium whitespace-no-wrap">{{ $user->email }}</div>                               
                        </div>
                    </td>
                    <td class="border-b">{{ $user->noHp }}</td>
                    <td class="w-40 border-b">
                        {{ Str::rupiah($user->iurans) }}
                    </td>
                    <td class="border-b">
                        <a href="javascript:;" data-toggle="modal" data-target="#{{ $user->id }}">
                            <span wire:ignore>
                                <button class="button w-32 mr-2 mb-2 flex items-center justify-center bg-theme-1 text-white"> 
                                    <i data-feather="dollar-sign" class="w-4 h-4 mr-2"></i> Bayar 
                                </button>
                            </span>
                        </a>
                    </td>
                    <div class="modal" id="{{ $user->id }}">
                        <div class="modal__content">
                            <form action="{{ route('pembayaranStore', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                        <h2 class="font-medium text-base mr-auto">
                                            Masukkan Jumlah Pembayaran
                                        </h2>
                                    </div>
                                                   
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="px-5 mt-5 flex">
                                        <div class="mr-auto">Nasabah</div>
                                        <div class="font-semibold">{{ $user->name }}</div>
                                    </div>
                                    <div class="px-5 flex">
                                        <div class="mr-auto">Total Iurans</div>
                                        <div class="font-semibold">{{ Str::rupiah($user->iurans) }}</div>
                                    </div>
                                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                        <div class="col-span-12 sm:col-span-12">
                                            <label>Jumlah Pembayaran</label>
                                            <input type="number" id="jumlah" name="jumlah" class="input w-full border mt-2 flex-1" placeholder="Rp.">
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200">
                                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                                    <button type="submit" class="button w-20 bg-theme-1 text-white">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
</div>

