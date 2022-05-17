 <div wire:ignore.self class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                {{-- <form wire:submit.prevent="store"> --}}
                    <div class="form-group">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                Nasabah Baru
                            </h2>
                        </div>
                        
                            <input type="hidden" name="id" wire:model="id_nasabah" value="{{ $id_nasabah }}">
                        
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-6">
                                <label>Email</label>
                                <input wire:model="email" type="email" id="email" name="email" class="input w-full border mt-2 flex-1 @error('email') border border-theme-6 @enderror" value="{{ $email }}" placeholder="example@gmail.com" required>
                                @error('email')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-span-12 sm:col-span-6">
                                <label>Password</label>
                                <input wire:model="password" type="password" id="password" name="password" class="input w-full border mt-2 flex-1 @error('password') border border-theme-6 @enderror"   placeholder="********" required @if ($id_nasabah != null) disabled @endif >
                                @error('password')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label>Nama</label>
                                <input wire:model="name" type="text" id="name" name="name" class="input w-full border mt-2 flex-1 @error('name') border border-theme-6 @enderror"   value="{{ $name }}" placeholder="Nama Nasabah">
                                @error('name')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <label>No Hp</label> 
                                <input wire:model="noHp" type="number" id="noHp" name="noHp" class="input w-full border mt-2 flex-1 @error('noHp') border border-theme-6 @enderror" placeholder="08123xxx" value="{{ $noHp }}">
                                @error('noHp')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-span-12 sm:col-span-12">
                                <label>Alamat</label>
                                <input wire:model="alamat" type="text" id="alamat" name="alamat" class="input w-full border mt-2 flex-1 @error('alamat') border border-theme-6 @enderror" placeholder="Jalan.xxx" value="{{ $alamat }}">
                                @error('alamat')
                                    <div class="text-theme-6 mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            @if ($id_nasabah)                   
                            <div class="mt-3"> <label>Aktif</label>
                                <div class="mt-2"> <input wire:model="isActive" type="checkbox" class="input input--switch border" value="true" @if ($isActive) checked @endif> </div>
                            </div>
                            @endif
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