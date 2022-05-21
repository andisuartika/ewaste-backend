@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Detail Profile</title>
@endsection
@section('title', 'Detail Profile')

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Detail Profile
    </h2>
</div>
<div class="grid grid-cols-12 gap-6">
    <!-- BEGIN: Profile Menu -->
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
        <div class="intro-y box mt-5">
            <div class="relative flex items-center p-5">
                <div class="w-12 h-12 image-fit">
                    @if ($user->profile_photo_path != null)
                        <img alt="Foto Profile" class="rounded-full" src="{{ asset('storage/'.$user->profile_photo_path) }}">
                    @else
                        <img alt="Foto Profile" class="rounded-full" src="{{ asset('dist/images/profile-1.jpg') }}">
                    @endif
                </div>
                <div class="ml-4 mr-auto">
                    <div class="font-medium text-base">{{ $user->name }}</div>
                    <div class="text-gray-600">{{ $user->email }}</div>
                </div>
                
            </div>
            <div class="p-5 border-t border-gray-200">
                <a class="flex items-center " href=""> <i data-feather="user" class="w-4 h-4 mr-2"></i> Informasi Akun </a>
                <a class="flex items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 mr-2"></i> Akun Settings </a>
                <a class="flex items-center text-theme-1 font-medium mt-5" href=""> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Ganti Password </a>
            </div>
        </div>
    </div>
    <!-- END: Profile Menu -->
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
        <!-- BEGIN: Display Information -->
        <form action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
                <!-- BEGIN: Change Password -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Ganti Password
                        </h2>
                    </div>
                    <div class="p-5">
                        <div>
                            <label>Password Lama</label>
                            <input type="password" name="oldPassword" class="input w-full border mt-2" placeholder="Masukkan Password Lama">
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('oldPassword') {{$message}} @enderror
                             </span>
                        </div>
                        <div class="mt-3">
                            <label>Password Baru</label>
                            <input type="password" name="newPassword" class="input w-full border mt-2" placeholder="Masukkan Password Baru">
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('newPassword') {{$message}} @enderror
                             </span>
                        </div>
                        <div class="mt-3">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" name="confirmPassword" class="input w-full border mt-2" placeholder="Masukkan Lagi Password Baru">
                            <span class="text-xs text-red-600 dark:text-red-400">
                                @error('confirmPassword') {{$message}} @enderror
                             </span>
                        </div>
                        <button type="submit" class="button bg-theme-1 text-white mt-4">Simpan</button>
                    </div>
                </div>
                <!-- END: Change Password -->
            </div>
        </form>
        <!-- END: Display Information -->

    </div>
    </div>

    <script>
        @if($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Password Berhasil diganti.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>

@endsection