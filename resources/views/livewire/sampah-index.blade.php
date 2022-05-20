<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
        <a href="{{ route('createSampah') }}"  class="button text-white bg-theme-1 shadow-md mr-2">Tambahkah Data Sampah</a>
        <div class="hidden md:block mx-auto text-gray-600">Menampilkan {{ $sampah->count() }} dari {{ $sampah->total() }} data sampah</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700">
                <input wire:model="search" type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">SAMPAH</th>
                    <th class="text-center whitespace-no-wrap">HARGA</th>
                    <th class="text-center whitespace-no-wrap">STATUS</th>
                    <th class="text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sampah as $s)
                    
                    <tr class="intro-x">
                        <td class="border-b">
                            <div class="flex sm:justify-left">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                                </div>
                                <div class="ml-3">
                                    <div class="font-medium whitespace-no-wrap">{{ $s->nama }}</div>
                                    <div class="@if ($s->kategori == 1) text-theme-9 @else text-theme-6
                                        
                                    @endif text-xs whitespace-no-wrap">{{ $s->kategori()->get()->implode('nama') }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="text-center">Rp{{ $s->harga }} /Kg</td>
                        <td class="w-40 text-center">
                            <input wire:click="status({{ $s->id }}, {{ $s->status }})" type="checkbox" class="input input--switch border" value="{{ $s->status}}" @if ($s->status == 1) checked @endif> 
                            
                        </td>
                        <td wire:ignore class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="{{ route('editSampah', $s->id) }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a wire:click="delete_id({{ $s->id }})" class="flex items-center text-theme-6" onclick="validateForm()" href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-modal">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
        {{ $sampah->links('components.livewire-pagination')}}
        <select wire:model="paginate" class="w-20 input box mt-3 sm:mt-0">
            {{-- <option value="">{{ $paginate }}</option> --}}
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="25">25</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>

<script>
    function validateForm() {
        event.preventDefault();
        const url = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Hapus Sampah?',
            text: "Data Sampah akan Dihapus Permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27AE60',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Yakin, Hapus!'
            }).then((result) => {
            if (result.isConfirmed) {
                @this.call('delete');
                
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Sampah Berhasil dihapus.',
                    confirmButtonColor: '#27AE60',
                })
                
            }
        })

 
}
</script>
