@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Syarat & Ketentuan Aplikasi</title>
@endsection

@section('tentang-aplikasi', 'side-menu--active')
@section('snk-aplikasi', 'side-menu--active')
@section('title', 'Syarat & Ketentuan Aplikasi')

@section('subcontent')

    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Syarat dan Ketentuan Aplikasi</h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box">
                <div class="post__content tab-content">
                    <div class="tab-content__pane p-5 active" id="content">
                        <div class="border border-gray-200 rounded-md p-5">
                            <form action="{{ (isset($syarat)) ? route('updateSyarat', $syarat->id) : route('storeSyarat') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($syarat)) 
                                    @method('PUT')
                                @else 
                                    @method('POST')
                                @endif
                                <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                    Syarat dan Ketentuan Aplikasi
                                </div>
                                <input type="hidden" name="id" id="id" value="@if(isset($syarat)) {{ $syarat->id }} @endif">
                                <div class="mt-5">
                                    <textarea name="syarat" id="syarat" data-feature="all" class="summernote" data-height="250" >@if(isset($syarat)){{ $syarat->deskripsi }}@endif</textarea>
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
                    <label>Syarat dan Ketentuan Aplikasi E-WASTE</label>
                </div>
                <div class="mt-3">
                    <div class="accordion__pane active border border-gray-200 p-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">
                        @if(isset($syarat)){!! $syarat->deskripsi !!}@endif
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
    </div>

    {{-- SWEETALERT --}}
    <script>
        @if($message = Session::get('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ $message }}',
                    confirmButtonColor: '#27AE60',
                })
        @endif
    </script>
@endsection