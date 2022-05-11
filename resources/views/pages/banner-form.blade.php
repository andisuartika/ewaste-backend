@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Banner</title>
@endsection
@section('banner', 'side-menu--active')
@section('title', 'Banner')

@section('subcontent')
<h2 class="intro-y text-lg font-medium mt-10 mb-5">Tambah Data Banner</h2>
<div class="intro-y col-span-12 lg:col-span-6">
    <!-- BEGIN: Form Layout -->
    <div class="intro-y box p-5">
        <form action="{{ (isset($banner)) ? route('updateBanner', $banner->id) : route('storeBanner') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($banner)) 
            @method('PUT')
        @else 
            @method('POST')
        @endif
        <div>
            <label>Nama banner</label>
            <input type="text" name="nama" class="input w-full border mt-2" placeholder="Nama banner" value="{{ (isset($banner)) ?$banner->nama : old('nama')}}">
            <span class="text-xs text-red-600 dark:text-red-400">
                @error('nama') {{$message}} @enderror
             </span>
        </div>
        @if (isset($banner))
            <input type="hidden" name="id" id="id" value="{{ $banner->id }}">
        @endif        
        <div class="mt-3">
            <label>Deskripsi</label>
            <div class="mt-2">
                <textarea class="summernote" name="deskripsi">{{ (isset($banner)) ?$banner->deskripsi : old('deskripsi')}}</textarea>
            </div>
            <span class="text-xs text-red-600 dark:text-red-400">
                @error('deskripsi') {{$message}} @enderror
             </span>
        </div>
        <div class="mt-3">
            <label>Link artikel</label>
            <input type="text" name="link" class="input w-full border mt-2" placeholder="Link artikel" value="{{ (isset($banner)) ?$banner->link : old('link')}}">
            <span class="text-xs text-red-600 dark:text-red-400">
                @error('link') {{$message}} @enderror
             </span>
        </div>
        <div class="mt-3">
            <label>Gambar banner</label>
            <em class="block mt-1">Ukuran gambar ( 1440 x 575 px)</em>
            <div class="mt-2">
                @if (isset($banner->gambar))
                    <div class="image-zoom relative"> 
                        <img alt="{{ $banner->gambar }}" class="w-32" src="{{ url('storage/'.$banner->gambar) }}" data-zoom="{{ url('storage/'.$banner->gambar) }}"> 
                    </div>
                @endif
                <input type="file" name="gambar" id="gambar">
            </div>
            <span class="text-xs text-red-600 dark:text-red-400">
                @error('gambar') {{$message}} @enderror
             </span>
        </div>

        <div class="text-right mt-5">
            <a href="{{ route('banner') }}" type="button" class="button w-24 border text-gray-700 mr-1">Kembali</a>
            <button type="sumbit" class="button w-24 bg-theme-1 text-white">Simpan</button>
        </div>
    </form>
    </div>
    <!-- END: Form Layout -->
</div>

@section('scripts-filepond')
    <script>
        // Get a file input reference
        const inputElement = document.querySelector('input[id="gambar"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
        server: {
            url: '/admin/banner/store/image',
            headers : {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            }
    });
        
    </script>
@endsection
@endsection