@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Kontak</title>
@endsection
@section('tentang-aplikasi', 'side-menu--active')
@section('kontak', 'side-menu--active')
@section('title', 'Kontak')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Kontak E-Waste</h2>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <div class="post intro-y overflow-hidden box">
                <div class="post__content tab-content">
                    <div class="tab-content__pane p-5 active" id="content">
                        <div class="border border-gray-200 rounded-md p-5">
                            <form action="{{ (isset($email)) ? route('updateKontak', $email->id) : route('storeKontak') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if(isset($email)) 
                                    @method('PUT')
                                @else 
                                    @method('POST')
                                @endif
                                <div class="font-medium flex items-center border-b border-gray-200 pb-5">
                                    Kontak E-Waste
                                </div>
                                <input type="hidden" name="id_email" id="id_email" value="@if(isset($email)) {{ $email->id }} @endif">
                                <div>
                                    <label class="flex flex-col sm:flex-row">
                                        Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, Email Address</span>
                                    </label>
                                    <input type="email" name="email" class="input w-full border mt-2" placeholder="admin@wastebali.com" value="{{ $email->deskripsi }}" required>
                                </div>

                                <input type="hidden" name="id_wa" id="id_wa" value="@if(isset($wa)) {{ $wa->id }} @endif">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row">
                                        WhatsApp <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, nomor WhatsApp</span>
                                    </label>
                                    <input type="nomor" name="wa" class="input w-full border mt-2" placeholder="0812xxx" value="{{ $wa->deskripsi }}" required>
                                </div>

                                <input type="hidden" name="id_facebook" id="id_facebook" value="@if(isset($facebook)) {{ $facebook->id }} @endif">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row">
                                        Facebook <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, nama Facebook</span>
                                    </label>
                                    <input type="text" name="facebook" class="input w-full border mt-2" value="{{ $facebook->deskripsi }}" required>
                                </div>


                                <input type="hidden" name="id_telpon" id="id_telpon" value="@if(isset($telpon)) {{ $telpon->id }} @endif">
                                <div class="mt-3">
                                    <label class="flex flex-col sm:flex-row">
                                        Nomor Telepon <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">Required, nomor Telepon</span>
                                    </label>
                                    <input type="nomor" name="telepon" class="input w-full border mt-2"  placeholder="0812xxx" value="{{ $telepon->deskripsi }}" required>
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
                    <label>Kontak E-WASTE</label>
                </div>
                <div class="mt-3">
                    <div class="accordion__pane active border border-gray-200 p-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">
                        <div class="accordion__pane border border-gray-200 p-4 mt-3"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Email Address</a>
                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $email->deskripsi }}</div>
                        </div>
                        <div class="accordion__pane border border-gray-200 p-4 mt-3"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">WhatsApp</a>
                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $wa->deskripsi }}</div>
                        </div>
                        <div class="accordion__pane border border-gray-200 p-4 mt-3"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Facebook</a>
                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $facebook->deskripsi }}</div>
                        </div>
                        <div class="accordion__pane border border-gray-200 p-4 mt-3"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">Telepon</a>
                            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">{{ $telepon->deskripsi }}</div>
                        </div>                        
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