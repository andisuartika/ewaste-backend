<!-- BEGIN: Header & Footer Modal -->
<div class="modal" id="header-footer-modal-preview">
    <div class="modal__content">
        {{-- <form wire:submit.prevent="store"> --}}
            <input type="hidden" name="id" wire:model="id_perjalanan" value="{{ $id_perjalanan }}">
            <div class="form-group">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">
                        Tugas Perjalanan {{ $petugas }}
                    </h2>
                </div>                      
                <div class="p-5">
                    <div class="mt-3"> <label>Petugas</label>
                        <div wire:ignore class="mt-2"> 
                            <select id="select2"  name="petugas" class="select2 hover:bg-theme-3 block w-full border mt-2">
                                <option value="">Pilih Petugas</option>
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
                <div class="p-5">
                    <div class="mt-3"> <label>Waktu Tugas</label>
                        <div class="relative w-56">
                            <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600"> <i data-feather="calendar" class="w-4 h-4"></i> 
                            </div> 
                            <input wire:model.lazy="dateTime" data-timepicker="true" type="datetime-local" name="dateTime" class="input pl-12 border" placeholder="MM/DD/YYYY AT 00:00" >
                        </div>
                    </div>
                </div>
                <div class="p-5">
                    <div class="col-span-12 sm:col-span-6">
                        <label>Keterangan</label>
                        <input wire:model="keterangan" type="text" id="keterangan" name="keterangan" class="input w-full border mt-2 flex-1" placeholder="keterangan" value="{{ $keterangan }}" required>
                    </div>
                </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button wire:click="resetInput" type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">Batal</button>
                <button wire:click="store" class="button w-20 bg-theme-1 text-white">Kirim</button>
            </div>
        {{-- </form> --}}
    </div>
</div>
     
<!-- END: Header & Footer Modal -->
