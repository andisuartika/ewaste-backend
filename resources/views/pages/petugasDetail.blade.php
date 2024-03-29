@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Detail Petugas</title>
@endsection
@section('pengguna', 'side-menu--active')
@section('petugas', 'side-menu--active')
@section('title', 'Detail Petugas')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail Petugas
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
                    <div class="font-medium text-base">{{ $petugas->name }}</div>
                    <div class="text-gray-600">{{ $petugas->email }}</div>
                </div>
                
            </div>
            <div class="p-5 border-t border-gray-200">
                <a class="flex items-center text-theme-1 font-medium" href=""> <i data-feather="user" class="w-4 h-4 mr-2"></i> Informasi Akun </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Akun Settings </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Ganti Password </a>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Display Information -->
        <div class="intro-y box lg:mt-5">
            <div class="flex items-center p-5 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">
                    Informasi Petugas
                </h2>
            </div>
            <div class="p-5">
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-4">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                <img class="rounded-md" alt="Barcode" src="{{ asset('dist/images/profile-1.jpg') }}">
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <button type="button" class="button w-full bg-theme-1 text-white" disabled>Foto Petugas</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-8">
                        <form action="{{ route('updatePetugas',$petugas->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <input type="hidden" name="id" value="{{ $petugas->id }}">
                        <div>
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="input w-full border mt-2" placeholder="Input text" value="{{ $petugas->name }}">
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="input w-full border mt-2" placeholder="Alamat Email" value="{{ $petugas->email }}">
                        </div>
                        <div class="mt-3">
                            <label>Nomor Handphone</label>
                            <input type="text" name="noHp" id="noHp" class="input w-full border mt-2" placeholder="Nomor Handphone" value="{{ $petugas->noHp }}">
                        </div>
                        <div class="mt-3">
                            <label>Alamat</label>
                            <textarea class="input w-full border mt-2" name="alamat" id="alamat" placeholder="Alamat">{{ $petugas->alamat }}</textarea>
                        </div>
                        <div class="flex justify-end mt-4">
                            {{-- <a href="{{ route('deletePetugas',$petugas->id) }}" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Hapus Petugas </a> --}}
                            <a href="{{ route('petugas') }}" type="button" class="button w-20  border text-gray-700">Kembali</a>
                            <button type="submit" name="submit" class="button w-20 bg-theme-1 text-white ml-auto">Simpan</button>
                        </div>
                        
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Display Information -->

    </div>
    </div>

    <script>
        @if($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Petugas Berhasil disimpan.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>
@endsection


