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
                    Informasi Akun
                </h2>
            </div>
            <div class="p-5">
                <form action="{{ route('updatePetugas',$user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-4">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                @if ($user->profile_photo_path != null)
                                    <img alt="Foto Profile" class="rounded-md" src="{{ asset('storage/'.$user->profile_photo_path) }}">
                                @else
                                    <img alt="Foto Profile" class="rounded-md" src="{{ asset('dist/images/profile-1.jpg') }}">
                                @endif
                            </div>
                            <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                <input type="file" name="image" id="image">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 xl:col-span-8">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div>
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="input w-full border mt-2" placeholder="Input text" value="{{ $user->name }}">
                        </div>
                        <div class="mt-3">
                            <label>Email</label>
                            <input type="text" name="email" id="email" class="input w-full border mt-2" placeholder="Alamat Email" value="{{ $user->email }}">
                        </div>
                        <div class="mt-3">
                            <label>Nomor Handphone</label>
                            <input type="text" name="noHp" id="noHp" class="input w-full border mt-2" placeholder="Nomor Handphone" value="{{ $user->noHp }}">
                        </div>
                        <div class="mt-3">
                            <label>Alamat</label>
                            <textarea class="input w-full border mt-2" name="alamat" id="alamat" placeholder="Alamat">{{ $user->alamat }}</textarea>
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit" name="submit" class="button w-20 bg-theme-1 text-white ml-auto">Simpan</button>
                        </div>
                        
                    </div>
                </div>
            </form>
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
            text: 'Profil Berhasil disimpan.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>

    @section('scripts-filepond')
    <script>
        // Get a file input reference
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create( inputElement );
        FilePond.setOptions({
        server: {
            url: '/admin/profile/image',
            headers : {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
            }
    });
        
    </script>
    @endsection
@endsection