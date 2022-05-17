@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Detail Nasabah</title>
@endsection
@section('pengguna', 'side-menu--active')
@section('nasabah', 'side-menu--active')
@section('title', 'Detail Nasabah')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail Nasabah
    </h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    <img alt="Foto Profile" class="rounded-full" src="{{ asset('dist/images/profile-1.jpg') }}">
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ $nasabah->name }}</div>
                    <div class="text-gray-600">{{ $nasabah->email }}</div>
                </div>
                
            </div>
            <div class="p-5 border-t border-gray-200">
                <a class="flex items-center text-theme-1 font-medium" href=""> <i data-feather="user" class="w-4 h-4 mr-2"></i> Informasi Akun </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Akun Settings </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Ganti Password </a>
            </div>
            <div class="p-5 border-t flex justify-between">
                <input type="checkbox" class="input input--switch border cursor-not-allowed" value="true" @if ($nasabah->roles == 'NASABAH') checked @endif disabled> 
                <button type="button" class="button button--sm cursor-not-allowed  @if ($nasabah->roles == 'NASABAH') bg-theme-1 text-white @else bg-gray-200 @endif" disabled>@if ($nasabah->roles == 'NASABAH') AKTIF @else NON AKTIF @endif</button>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Nasabah
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-4">
                        @if (isset($nasabah->kode_nasabah))
                            <div class="border border-gray-200 rounded-md p-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <div class="visible-print text-center">
                                        {!! QrCode::size(150)->generate($nasabah->kode_nasabah); !!}
                                    </div>
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <a href="{{ route('printNasabah', $nasabah) }}" target="_blank" type="button" class="button w-full bg-theme-1 text-white" disabled>Cetak QR-Code</a>
                                </div>
                            </div>
                        @else
                            <div class="border border-gray-200 rounded-md p-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <div class="visible-print text-center">
                                        <img class="rounded-md" alt="{{ $nasabah->name }}" src="@if (isset($nasabah->profile_photo_path))
                                            {{ $nasabah->profile_photo_path }} @else {{ asset('dist/images/profile-1.jpg') }}
                                        @endif">
                                    </div>
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="button w-full bg-gray-500 text-white cursor-not-allowed " disabled>Cetak QR-Code</button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-span-12 xl:col-span-8">
                        <form action="{{ route('updateNasabah', $nasabah->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($nasabah)) 
                                @method('PUT')
                            @endif
                            <div>
                                <label>Nama</label>
                                <input type="text" name="name" class="input w-full border mt-2" placeholder="Input text" value="{{ $nasabah->name }}">
                            </div>
                            <div class="mt-3">
                                <label>Email</label>
                                <input type="text" name="email" class="input w-full border mt-2" placeholder="Alamat Email" value="{{ $nasabah->email }}">
                            </div>
                            <div class="mt-3">
                                <label>Nomor Handphone</label>
                                <input type="text" name="noHp" class="input w-full border mt-2" placeholder="Nomor Handphone" value="{{ $nasabah->noHp }}">
                            </div>
                            <div class="mt-3">
                                <label>Alamat</label>
                                <textarea class="input w-full border mt-2" name="alamat" placeholder="Alamat">{{ $nasabah->alamat }}</textarea>
                            </div>
                            <div class="flex justify-end mt-4">
                                <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#delete-modal" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus Nasabah </a> </div>
                                <div class="modal" id="delete-modal">
                                    <div class="modal__content">
                                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                            <div class="text-3xl mt-5">Yakin Hapus Nasabah?</div>
                                            <div class="text-gray-600 mt-2">Data Pengguna akan dihapus Permanent!</div>
                                        </div>
                                        <div class="px-5 pb-8 text-center"> 
                                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Batal</button> 
                                            <a href="{{ route('deleteNasabah', $nasabah->id) }}" type="button" class="button w-24 bg-theme-6 text-white">Yakin</a> 
                                        </div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="button w-20 bg-theme-1 text-white ml-auto">Simpan</button>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->

    </div>
    </div>

@endsection


