   
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        @foreach ($banners as $banner )
        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
            <div class="p-5">
                <div class="h-40 xxl:h-56 image-fit">
                    <img alt="{{ $banner->gambar }}" class="rounded-md" src="{{ asset('storage/'. $banner->gambar ) }}">
                </div>
                <a href="http://{{ $banner->link }}" class="block font-medium text-base mt-5" target="_blank">{{ $banner->nama }} </a>
                <div class="text-gray-700 mt-2">{!! $banner->deskripsi !!} </div>
            </div>
            
            <div class="flex px-5 pt-3 pb-5 border-t items-center justify-between border-gray-200">
                    <a href="{{ route('editBanner', $banner->id) }}">
                        <button class="button button--sm text-white bg-theme-1 mr-2">Edit Banner</button>
                    </a>
                    <div class="flex item-center">
                        Status <input wire:click="status({{ $banner->id }}, {{ $banner->status }})" type="checkbox" class="ml-2 input input--switch border" value="{{ $banner->status}}" @if ($banner->status == 1) checked @endif> 
                    </div>  
            </div>
        </div>
        @endforeach
    </div>

