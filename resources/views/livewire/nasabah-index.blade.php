<div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2  whitespace-no-wrap">NASABAH</th>
                    <th class="border-b-2  whitespace-no-wrap">EMAIL</th>
                    <th class="border-b-2  whitespace-no-wrap">NO HANPHONE</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                    <th class="border-b-2  text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nasabah as $user )
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
                        @if ($user->roles == 'NASABAH')
                            <div class="flex items-center sm:justify-center text-theme-9">
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Aktif
                            </div>
                        @else
                            <div class="flex items-center sm:justify-center text-theme-6">
                                <i data-feather="x-square" class="w-4 h-4 mr-2"></i> Tidak Aktif
                            </div>
                        @endif
                    </td>
                    <td class="border-b">
                        <div class="flex sm:justify-center items-center">
                            <a href="{{ route('detailNasabah', $user->id) }}" class="tooltip flex text-theme-1 items-center mr-3" title="Detail Nasabah">
                                <span wire:ignore>
                                    <i data-feather="file-text" class="w-4 h-4 mr-1"></i>
                                </span>
                            </a>
                            <a wire:click="edit({{ $user->id }})" href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="tooltip flex text-theme-9 items-center mr-3" title="Edit Nasabah">
                                <span wire:ignore>
                                    <span wire:ignore><i data-feather="check-square" class="w-4 h-4 mr-1"></i></span>
                                </span>
                            </a>
                            <a wire:click="delete_id({{ $user->id }})" class="tooltip flex text-theme-6 items-center mr-3 delete-confirm" onclick="validateForm()" title="Hapus Nasabah">
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
    <!-- END: Datatable -->
</div>

<script>
    function validateForm() {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Hapus Nasabah?',
            text: "Data Nasabah akan Dihapus Permanen!",
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
