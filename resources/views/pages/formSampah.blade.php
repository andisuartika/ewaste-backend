@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Sampah</title>
@endsection
@section('sampah', 'side-menu--active')

@section('title', 'Tambah Data Sampah')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10 mb-5">Tambah Data Sampah</h2>
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form action="{{ (isset($sampah)) ? route('updateSampah', $sampah->id) : route('storeSampah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($sampah)) 
                @method('PUT')
            @else 
                @method('POST')
            @endif
            <div>
                <label>Nama Sampah</label>
                <input type="text" name="nama" class="input w-full border mt-2" placeholder="Nama Sampah" value="{{ (isset($sampah)) ?$sampah->nama : old('nama')}}">
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('nama') {{$message}} @enderror
                 </span>
            </div>
            @if (isset($sampah))
                <input type="hidden" name="id" id="id" value="{{ $sampah->id }}">
            @endif
            <div class="mt-3">
                <label>Kategori Sampah</label>
                <div class="mt-2">
                    <select name="kategori" data-placeholder="Pilih kategori sampah" class="select2 w-full" >
                        <option value="">Katageori Sampah</option>
                        @if(isset($sampah))
                            @foreach ($kategori as $k )
                                @if ($sampah->kategori == $k->id)
                                <option value="{{ $k->id }}" selected>{{ $k->nama }}</option>
                                @endif   
                                <option value="{{ $k->id }}">{{ $k->nama }}</option>
                            @endforeach
                        @else
                        @foreach ($kategori as $k )   
                            <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                        @endif
                    </select>
                    <span class="text-xs text-red-600 dark:text-red-400">
                        @error('kategori') {{$message}} @enderror
                     </span>
                </div>
            </div>
            <div class="mt-3">
                <label>Harga</label>
                <div class="relative mt-2">
                    <input type="text" name="harga" class="input pr-12 w-full border col-span-4" placeholder="Harga" value="{{ (isset($sampah)) ?$sampah->harga : old('harga')}}">
                    <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">/kg</div>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('harga') {{$message}} @enderror
                 </span>
            </div>
            
            <div class="mt-3">
                <label>Tentang Sampah</label>
                <div class="mt-2">
                    <textarea class="summernote" name="tentang">{{ (isset($sampah)) ?$sampah->tentang : old('tentang')}}</textarea>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('tentang') {{$message}} @enderror
                 </span>
            </div>
            <div class="mt-3">
                <label>Pengelolaan Sampah</label>
                <div class="mt-2">
                    <textarea class="summernote" name="pengelolaan">{{ (isset($sampah)) ?$sampah->pengelolaan : old('pengelolaan')}}</textarea>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('pengelolaan') {{$message}} @enderror
                 </span>
            </div>
            <div class="mt-3">
                <label>Gambar Sampah</label>
                <div class="mt-2">
                    @if (isset($sampah->image))
                        <div class="image-zoom relative"> 
                            <img alt="{{ $sampah->image }}" class="w-32" src="{{ url('storage/'.$sampah->image) }}" data-zoom="{{ url('storage/'.$sampah->image) }}"> 
                        </div>
                    @endif
                    <input type="file" name="image" id="image">
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('image') {{$message}} @enderror
                 </span>
            </div>

            <div class="text-right mt-5">
                <a href="{{ route('sampah') }}" type="button" class="button w-24 border text-gray-700 mr-1">Kembali</a>
                <button type="sumbit" class="button w-24 bg-theme-1 text-white">Simpan</button>
            </div>
        </form>
        </div>
        <!-- END: Form Layout -->
    </div>

    @section('scripts-filepond')
        <script>
            // Get a file input reference
            const inputElement = document.querySelector('input[id="image"]');
            const pond = FilePond.create( inputElement );
            FilePond.setOptions({
            server: {
                url: '/admin/sampah/store/image',
                headers : {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                }
        });
            
        </script>
    @endsection
@endsection


