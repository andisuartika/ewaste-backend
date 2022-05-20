@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Tamabah Artikel </title>
@endsection
@section('artkel', 'side-menu--active')

@section('title', 'Artikel')

@section('subcontent')

<h2 class="intro-y text-lg font-medium mt-10 mb-5">Tambah Data Artikel</h2>
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form action="{{ (isset($artikel)) ? route('updateArtikel', $artikel->id) : route('storeArtikel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($artikel)) 
                @method('PUT')
            @else 
                @method('POST')
            @endif
            <div class="mt-5">
                <label>Judul Artikel</label>
                <input type="text" name="title" class="input w-full border mt-2" placeholder="Judul Artikel" value="{{ (isset($artikel)) ?$artikel->title : old('title')}}">
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('title') {{$message}} @enderror
                 </span>
            </div>
            @if (isset($artikel))
                <input type="hidden" name="id" id="id" value="{{ $artikel->id }}">
            @endif            
            <div class="mt-4">
                <label>Deskripsi Artikel</label>
                <br>
                <em>*Deskripsi singkat artikel</em>
                <div class="mt-2">
                    <textarea id="description" name="description">{{ (isset($artikel)) ?$artikel->description : old('description')}}</textarea>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('description') {{$message}} @enderror
                 </span>
            </div>
            <div class="mt-4">
                <label>Konten Artikel</label>
                <div class="mt-2">
                    <textarea id="content" name="content">{{ (isset($artikel)) ?$artikel->content : old('content')}}</textarea>
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('content') {{$message}} @enderror
                 </span>
            </div>
            <div class="mt-4">
                <label>Status Artikel</label>
                <div class="mt-2">
                    <select name="status" data-placeholder="Pilih status artikel" class="select2 w-full" >
                        <option value="">Status Artikel</option>
                        @if (isset($artikel))
                            <option value="DRAFT" @if ($artikel->status = "DRAFT") selected @endif>Draft</option>
                            <option value="PUBLISH" @if ($artikel->status = "PUBLISH") selected @endif>Publish</option>
                        @else
                            <option value="DRAFT">Draft</option>
                            <option value="PUBLISH">Publish</option>
                        @endif
                    </select>
                    <span class="text-xs text-red-600 dark:text-red-400">
                        @error('status') {{$message}} @enderror
                     </span>
                </div>
            </div>
            <div class="mt-4">
                <label>Cover Artikel</label>
                <div class="mt-2">
                    @if (isset($artikel->cover))
                        <div class="image-zoom relative"> 
                            <img alt="{{ $artikel->cover }}" class="w-32" src="{{ url('storage/'.$artikel->cover) }}" data-zoom="{{ url('storage/'.$artikel->cover) }}"> 
                        </div>
                    @endif
                    <input type="file" name="cover" id="cover">
                </div>
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('cover') {{$message}} @enderror
                 </span>
            </div>

            <div class="text-right mt-5">
                <a href="{{ route('artikel') }}" type="button" class="button w-24 border text-gray-700 mr-1">Kembali</a>
                <button type="sumbit" class="button w-24 bg-theme-1 text-white">Simpan</button>
            </div>
        </form>
        </div>
        <!-- END: Form Layout -->
    </div>
    @section('scripts-filepond')
        <script>
            // Get a file input reference
            const inputElement = document.querySelector('input[id="cover"]');
            const pond = FilePond.create( inputElement );
            FilePond.setOptions({
            server: {
                url: '/admin/artikel/store/image',
                headers : {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                }
        });
            
        </script>
    @endsection

    <script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error=>{
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error=>{
                console.error(error);
            });
    </script>

@endsection