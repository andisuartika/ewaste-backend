<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Rekrut Petugas</button>
        </a>
        <div class="modal" id="header-footer-modal-preview">
            <div class="modal__content">
                    {{-- <form action="{{ route('createPetugas') }}" method="POST" enctype="multipart/form-data"> --}}
                    <div class="form-group">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base mr-auto">
                                Rekrut Petugas
                            </h2>
                        </div>
                        <div class="p-5">
                            <div class="mt-3"> <label>Pengguna</label>
                                <div wire:ignore class="mt-2"> 
                                    <select wire:model="idUser" id="select2"  name="idUser"  class="select2 hover:bg-theme-3 block w-full border mt-2">
                                        <option value="">Pilih Pengguna</option>
                                        <optgroup label="PENGGUNA">
                                            @foreach ($pengguna as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="NASABAH">
                                            @foreach ($nasabah as $n)
                                                <option value="{{ $n->id }}">{{ $n->name }}</option>
                                            @endforeach
                                        </optgroup>
                                        <optgroup label="PETUGAS">
                                            @foreach ($petugas as $p)
                                                <option value="{{ $p->id }}">{{ $p->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select> 
                                </div>
                            </div>
                        </div>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-6">
                                <label>Rekrut Sebagai</label>
                                <div class="flex flex-col sm:flex-row mt-2">
                                    <div wire:model="roles" class="flex items-center text-gray-700 mr-2"> <input type="radio" class="input border mr-2" id="roles" name="roles" value="PETUGAS"> <label class="cursor-pointer select-none" for="PETUGAS">Petugas</label> </div>
                                    <div wire:model="roles" class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio" class="input border mr-2" id="roles" name='ADMIN'  value="ADMIN"> <label class="cursor-pointer select-none" for="ADMIN">Admin</label> </div>
                                </div>
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

        <div class="hidden md:block mx-auto text-gray-600">Menampilkan {{ $users->count() }} dari {{ $users->total() }} petugas</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input wire:model="search" name="search" type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <span wire:ignore>
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </span>
            </div>
        </div>
    </div>
    <!-- BEGIN: Users Layout -->
    @foreach ($users as $index => $user)
    <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4">
        <div class="box">
            <div class="flex items-start px-5 pt-5">
                <div class="w-full flex flex-col lg:flex-row items-center">
                    <div class="w-16 h-16 image-fit">
                        <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-md" src="{{ asset('dist/images/profile-1.jpg') }}">
                    </div>
                    <div class="lg:ml-4 text-center lg:text-left mt-3 lg:mt-0">
                        <a href="" class="font-medium uppercase">{{ $user->name }}</a>
                        <div class="text-gray-600 text-xs capitalize">{{ $user->roles }}</div>
                    </div>
                </div>
            </div>
            <div class="text-center lg:text-left p-5">
                <div>{{ $user->alamat }}</div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-5">
                    <span wire:ignore><i data-feather="mail" class="w-3 h-3 mr-2"></i></span>{{ $user->email }}
                </div>
                <div class="flex items-center justify-center lg:justify-start text-gray-600 mt-1">
                    <span wire:ignore><i data-feather="phone" class="w-3 h-3 mr-2"></i></span>{{ $user->noHp }}
                </div>
            </div>
            <div class="text-center lg:text-right p-5 border-t border-gray-200 flex justify-end">
                    <button wire:click="delete_id({{ $user->id }})" class="button text-white flex items-center justify-center bg-theme-6 mr-2 delete-confirm" onclick="validateForm()"><span wire:ignore><i data-feather="user-x" class="w-4 h-4 mr-2"></i></span>Hapus</button>
                <a href="{{ route('detailPetugas', $user->id) }}">
                    <button class="button flex items-center justify-center bg-gray-200 text-gray-600 mr-2"><span wire:ignore><i data-feather="user" class="w-4 h-4 mr-2"></span></i>Detail</button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
    
    
    <!-- END: Users Layout -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        {{ $users->links('components.livewire-pagination') }}
    </div>
    

    <!-- END: Pagination -->
</div>


    <script>
        
        $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function (e) {
            let id = $('#select2').select2("val");//seleccionamos el value      
            //@this.set('seleccionado', valor);
            // let id = $('#select2 option:selected')     
            @this.set('idUser', id);    
            
        });
    });
    </script>

<script>

    function validateForm() {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Hapus Petugas?',
            text: "Petugas yang Dihapus akan menjadi Pengguna!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27AE60',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Yakin, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete');                
            }
        })
    
}
</script>

