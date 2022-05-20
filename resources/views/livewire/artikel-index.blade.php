<div class="intro-y grid grid-cols-12 gap-6 mt-5">
@foreach ($artikels as $artikel )
    <div class="intro-y blog col-span-12 md:col-span-6 box">
        <div class="blog__preview image-fit">
            <img alt="Cover Artikel" class="rounded-t-md" src="{{ asset('storage/'.$artikel->cover) }}">
            <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                <div class="w-10 h-10 flex-none image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/profile-1.jpg') }}">
                </div>
                <div class="ml-3 text-white mr-auto">
                    <a href="" class="font-medium">{{ $artikel->user()->get()->implode('name') }}</a> 
                    <div class="text-xs">{{ date('d/m/y H:m', strtotime($artikel->created_at)) }}</div>
                </div>
                <div class="dropdown relative ml-3">
                    <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                    <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="{{ route('editArtikel',$artikel) }}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit Artikel </a>
                            <a wire:click="delete_id({{ $artikel->id }})" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md cursor-pointer" onclick="validateForm()"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Hapus Artikel </a href="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-0 text-white px-5 pb-6 z-10"><a href="" class="block font-medium text-xl mt-3">{{ $artikel->title }}</a> </div>
        </div>
        <div class="p-5 text-gray-700">{!! Str::limit($artikel->content, 150) !!}</div>
        <div class="flex items-center px-5 py-3 border-t border-gray-200">
            <div class="flex item-center ml-auto">
                @if ($artikel->status == 1)PUBLISH @else DRAFT @endif <input wire:click="status({{ $artikel->id }}, {{ $artikel->status }})" type="checkbox" class="ml-2 input input--switch border" value="{{ $artikel->status}}" @if($artikel->status == 1) checked @endif> 
            </div>
        </div>
    </div>
@endforeach
</div>

<script>
    function validateForm() {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Yakin Hapus Artikel?',
            text: 'Artikel akan dihapus permanen!',
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                @this.call('delete');
            } else {
                swal("Artikel tidak dihapus!");
            }
        });
    
}
</script>

