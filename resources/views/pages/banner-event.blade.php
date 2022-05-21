@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Banner</title>
@endsection
@section('banner', 'side-menu--active')
@section('title', 'Banner')

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Blanner Event</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{ route('createBanner') }}">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Banner</button>
            </a>
        </div>
    </div>
   
    @livewire('banner-index')
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
<script>
    window.addEventListener('swal:modalStatus', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Status Banner Berhasil diupdate!',
            confirmButtonColor: '#27AE60',
        })
    });
        

    window.addEventListener('swal:modalDelete', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Banner Berhasil dihapus!',
            confirmButtonColor: '#27AE60',
        })
    });

</script>