@extends('../layouts/side-menu')
<style>
    .note-modal-backdrop, .note-modal-backdrop.in{
    z-index:1000;
    }

    .modal {
    z-index:1001;
    }
</style>

@section('subhead')
    <title>Admin | E-Waste - Tentang Aplikasi</title>
@endsection
@section('tentang-aplikasi', 'side-menu--active')
@section('tentang-aplikasi', 'side-menu--active')
@section('title', 'Tentang Aplikasi')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Informasi Aplikasi</h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box">
                <div class="post__content tab-content">
                    <div class="tab-content__pane p-5 active" id="content">
                        <div class="border border-gray-200 rounded-md p-5">
                            <form action="{{ (isset($tentang)) ? route('updateTentang', $tentang->id) : route('storeTentang') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($tentang)) 
                                    @method('PUT')
                                @else 
                                    @method('POST')
                                @endif
                                <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                    Tentang Aplikasi
                                </div>
                                <input type="hidden" name="id" id="id" value="@if(isset($tentang)) {{ $tentang->id }} @endif">
                                <div class="mt-5">
                                    <textarea name="tentang" id="tentang" data-feature="all" class="summernote" data-height="250" >@if(isset($tentang)){{ $tentang->deskripsi }}@endif</textarea>
                                </div>
                                <div class="w-full sm:w-auto justify-end flex mt-10">
                                    <button type="submit" class="button box text-white bg-theme-1 flex items-center ml-auto sm:ml-0">
                                        <i class="w-4 h-4 mr-2" data-feather="save"></i> Simpan
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4">
            <div class="intro-y box p-5">
                <div>
                    <label>Tentang Aplikasi E-WASTE</label>
                </div>
                <div class="mt-3">
                    <div class="accordion__pane active border border-gray-200 p-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">
                        <section class="hero container max-w-screen-lg mx-auto p-5">
                            <img class="mx-auto" src="{{ asset('img/e-waste.png') }}" alt="{{ asset('img/e-waste.png') }}" width="100">
                        </section>
                        @if(isset($tentang)){!! $tentang->deskripsi !!}@endif
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>
@endsection
<script>
    $('.summernote').summernote({ dialogsInBody: true, });
</script>