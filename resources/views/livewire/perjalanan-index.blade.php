<div> 

    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <div class="flex px-5 py-5 justify-between  sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base">Tambah Tugas Perjalanan</h2>
            </div> 
            <div class="mt-3">
                <div  class="sm:grid grid-cols-3 gap-2">
                    <input type="hidden" wire:model="id_perjalanan">
                    <div class="relative mt-2">
                        @if($id_perjalanan)
                            <div class="pl-3">
                                <div class="col-span-12 sm:col-span-6 mt-3">
                                    <label>Petugas</label>
                                    <input type="text" id="petugas" name="petugas" class="input w-full border mt-2 flex-1"  value="{{ $nama_petugas }}" disabled>
                                </div>
                            </div>
                        @else
                        <div class="pl-3">
                            <div class="mt-3"> <label>Petugas</label>
                                <div wire:ignore class="mt-2"> 
                                    <select wire:model="petugas" id="select2"  name="petugas" class="select2 hover:bg-theme-3 block w-full border mt-2">
                                        <option value="">Pilih Petugas </option>
                                        @foreach ($users as $user)
                                            @if ($user->id == $petugas) 
                                                <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                            @endif   
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        </div>
                        @endif
                         
                    </div>
                    <div class="relative mt-2">
                        <div class="pl-3">
                            <div class="mt-3"> <label>Waktu Tugas</label>
                                <div class="relative w-56 mt-2">
                                    <div wire:ignore class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600"> <i data-feather="calendar" class="w-4 h-4"></i> 
                                    </div> 
                                    <input wire:model.lazy="dateTime" data-timepicker="true" type="datetime-local" name="dateTime" class="input  w-full pl-12 border" placeholder="MM/DD/YYYY AT 00:00" value="{{ $dateTime }}" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative mt-2">
                        <div class="pl-3">
                            <div class="col-span-12 sm:col-span-6 mt-2">
                                <label>Keterangan</label>
                                <input wire:model="keterangan" type="text" id="keterangan" name="keterangan" class="input w-full border mt-2 flex-1" placeholder="keterangan" value="{{ $keterangan }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right mt-5">
                <a href="" wire:click="resetInput" type="button" class="button w-24 border text-gray-700 mr-1">Reset</a>
                <button wire:click="store" class="button w-24 bg-theme-1 text-white">Simpan</button>
            </div>
        </div>
        <!-- END: Form Layout -->
    </div>
   
    
    <!-- BEGIN: Data List -->
    <div wire:ignore class="datatable-wrapper box p-5 mt-5">
        <table id="perjalanan-tables" class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2  whitespace-no-wrap">PETUGAS</th>
                    <th class="border-b-2  whitespace-no-wrap">WAKTU TUGAS</th>
                    <th class="border-b-2  whitespace-no-wrap">WAKTU SELESAI</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                    <th class="border-b-2  text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task )
                <tr>
                    <td class="border-b">
                        <div class="flex sm:justify-left">
                            <div class="intro-x w-10 h-10 image-fit">
                                <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                            </div>
                            <div class="ml-3">
                                <div class="font-medium whitespace-no-wrap">{{ $task->user()->get()->implode('name') }}</div>
                                <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $task->user()->get()->implode('noHp') }}</div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center border-b">
                        <div class="flex sm:justify-left">
                            <div class="font-medium whitespace-no-wrap">{{ $task->waktuTugas }}</div>                               
                        </div>
                    </td>
                    <td class="border-b">{{ $task->waktuSelesai }}</td>
                    <td class="w-40 border-b">
                        @if ($task->status == 'DIJADWALKAN')
                            <div class="flex items-center sm:justify-center text-theme-1">
                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Masih dijadwalkan
                            </div>
                        @elseif ($task->status == 'DIKERJAKAN')
                            <div class="flex items-center sm:justify-center text-theme-3">
                                <i data-feather="truck" class="w-4 h-4 mr-2"></i> Sedang dikerjakan
                            </div>
                        @elseif ($task->status == 'DIBATALKAN')
                            <div class="flex items-center sm:justify-center text-theme-6">
                                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i> Batal
                            </div>
                        @else
                            <div class="flex items-center sm:justify-center text-theme-9">
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Selesai
                            </div>
                        @endif
                    </td>
                    <td class="border-b">
                        <div class="flex sm:justify-center items-center">
                            <a href="javascript:;" data-toggle="modal" data-target="#{{ $task->kode }}" class="tooltip flex text-theme-1 items-center mr-3" title="Detail Nasabah">
                                <span wire:ignore>
                                    <i data-feather="file-text" class="w-4 h-4 mr-1"></i>
                                </span>
                            </a>
                            <!-- BEGIN: Header & Footer Modal -->
                            <div class="modal" id="{{ $task->kode }}">
                                <div class="modal__content">
                                        
                                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200 text-theme-1">
                                        <h2 class="font-medium text-base mr-auto">Detail Tugas Perjalanan</h2>
                                        @if ($task->status == 'DIJADWALKAN')
                                            <div class="button border items-center text-gray-700 hidden sm:flex"> 
                                                <i data-feather="file-text" class="w-4 h-4 mr-2"></i>Masih dijadwalkan
                                            </div>
                                        @elseif ($task->status == 'DIKERJAKAN')
                                            <div class="button border items-center text-gray-700 hidden sm:flex text-theme-3"> 
                                                <i data-feather="truck" class="w-4 h-4 mr-2"></i>Sedang dikerjakan
                                            </div>
                                        @elseif ($task->status == 'DIBATALKAN')
                                            <div class="button border items-center text-gray-700 hidden sm:flex text-theme-6""> 
                                                <i data-feather="x-circle" class="w-4 h-4 mr-2"></i>Batal
                                            </div>
                                        @else
                                            <div class="button border items-center text-gray-700 text-theme-9 hidden sm:flex"> 
                                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Selesai
                                            </div>
                                        @endif
                                        
                                        
                                    </div>
                                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                                        <div class="col-span-12 mb-3">
                                            <h2 class="font-medium text-base mr-auto">Kode Perjalanan : {{ $task->kode }}</h2>
                                        </div>
                                        <div class="col-span-12 mb-3"> 
                                            <div class="flex sm:justify-left">
                                                <div class="intro-x w-10 h-10 image-fit">
                                                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                                                </div>
                                                <div class="ml-3">
                                                    <div class="font-medium whitespace-no-wrap">{{ $task->user()->get()->implode('name') }}</div>
                                                    <div class="text-gray-600 text-xs whitespace-no-wrap">{{ $task->user()->get()->implode('noHp') }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6"> 
                                            <label>Waktu Tugas</label> 
                                            <div class="relative">
                                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                    <i data-feather="clock" class="w-4 h-4 mr-1"></i>
                                                </div> <input type="text" class="input pl-12 w-full border col-span-4" value="{{ $task->waktuTugas }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-span-12 sm:col-span-6"> 
                                            <label>Waktu Selesai</label> 
                                            <div class="relative">
                                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">
                                                    <i data-feather="check-circle" class="w-4 h-4 mr-1"></i>
                                                </div> <input type="text" class="input pl-12 w-full border col-span-4" value="{{ $task->waktuSelesai }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-span-12"> 
                                            <label>Keterangan</label> <input type="text" class="input w-full border mt-2 flex-1" value="{{ $task->keterangan }}" disabled> 
                                        </div>
                                    </div>
                                    <div class="px-5 py-3 text-right border-t border-gray-200"> 
                                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Close</button> 
                                    </div>

                                </div>
                            </div>
                                
                            <!-- END: Header & Footer Modal -->
                            <a wire:click="edit({{ $task->id }})" class="tooltip flex text-theme-9 items-center mr-3" title="Edit Nasabah">
                                <span wire:ignore>
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i>
                                </span>
                            </a>
                            
                            <a wire:click="delete_id({{ $task->id }})" class="tooltip flex text-theme-6 items-center mr-3 elete-confirm" onclick="validateForm()" title="Hapus Nasabah">
                                <span wire:ignore>
                                    <span wire:ignore><i data-feather="trash-2" class="w-4 h-4 mr-1"></i></span>
                                </span>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
        
    </div>

    <!-- END: Data List -->
</div> 
@livewireScripts
<script>

        function validateForm() {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Yakin Hapus Tugas Perjalanan?',
                text: 'Data Tugas Perjalanan akan dihapus permanen!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    @this.call('delete');
                } else {
                    swal("Data tidak dihapus!");
                }
            });
        
    }
</script>


    {{-- SELECT2 --}}
<script>
            
        $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            @this.petugas  = $(this).val();
            
        });
    });
</script>

<script>
        window.addEventListener('closeModal', event =>{
            $('#header-footer-modal-preview').modal('hide');
        });

    window.addEventListener('swal:modalCreate', event => {
        swal({
        title: "Success!",
        text: "Tugas Perjalanan Berhasil ditambahkan!",
        icon: "success",
        });
    });

    window.addEventListener('swal:modalUpdate', event => {
        swal({
        title: "Success!",
        text: "Tugas Perjalanan Berhasil diubah!",
        icon: "success",
        });
    });

    window.addEventListener('swal:modalDelete', event => {
    swal({
      title: "Success!",
      text: "Tugas Perjalanan Berhasil dihapus!",
      icon: "success",
    });
  });
</script>