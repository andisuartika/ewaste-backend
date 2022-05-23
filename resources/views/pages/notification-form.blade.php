@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Push Notification</title>
@endsection
@section('push-notif', 'side-menu--active')

@section('title', 'Push Notification')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10 mb-5">Push Notification</h2>
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box p-5">
            <form action="{{ route('sendFCM') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div>
                <label>Judul Notifikasi</label>
                <input type="text" name="title" class="input w-full border mt-2" placeholder="Judul Notifikasi" required> 
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('title') {{$message}} @enderror
                </span>
            </div>
            <div class="mt-3"> 
                <label class="flex flex-col sm:flex-row">Deskripsi</label> 
                <textarea class="input w-full border mt-2" name="description" placeholder="Deskripsi Notifikasi" required></textarea> 
                <span class="text-xs text-red-600 dark:text-red-400">
                    @error('description') {{$message}} @enderror
                 </span>
            </div>
            <div class="mt-3">
                <label>Prioritas Notifikasi</label>
                <div class="mt-2">
                    <select name="priority" data-placeholder="Pilih Prioritas" class="select2 w-full" >
                        <option value="">Katageori Sampah</option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                    </select>
                    <span class="text-xs text-red-600 dark:text-red-400">
                        @error('priority') {{$message}} @enderror
                     </span>
                </div>
            </div>
            <div class="mt-3">
                <label>Data <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">*Optional</span></label>
                <div class="grid grid-cols-12 gap-2"> 
                    <input type="text" name="keyData" class="input w-full border col-span-6" placeholder="Key Data"> 
                    <input type="text" name="data" class="input w-full border col-span-6" placeholder="Value Data"> 
                </div>
            </div>
            <div class="mt-3">
                <label>Jadwal Notifikasi <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">*Optional, aktifkan terlebih dahulu jadwal</span></label>
                <div class="flex mb-2">
                    <input type="checkbox" name="isScheduler" class="input input--switch border"> 
                </div>
                <input data-timepicker="true" type="datetime-local" name="schedule" class="input  w-full border" placeholder="MM/DD/YYYY AT 00:00" value="" >
            </div>
            <div class="mt-3">
                <label>Link Gambar</label>
                <input type="text" name="linkImage" class="input w-full border mt-2" placeholder="Link Gambar Notifikasi">
            </div>
            <div class="mt-3">
                <label>Gambar Notfikasi <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-gray-600">*Optional</span></label>
                <div class="mt-2">
                    <input type="file" name="image" id="image">
                </div>
            </div>

            <div class="text-right mt-5">
                <a href="{{ route('push-notif') }}" type="button" class="button w-24 border text-gray-700 mr-1">Kembali</a>
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
                url: '/admin/notification/store/image',
                headers : {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
                }
        });
            
        </script>
    @endsection
@endsection


