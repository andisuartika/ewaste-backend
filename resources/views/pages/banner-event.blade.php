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
    
@endsection

<script>


    window.addEventListener('swal:modalCreate', event => {
        swal({
        title: "Success!",
        text: "Data Banner Berhasil ditambahkan!",
        icon: "success",
        });
    });
    
    window.addEventListener('swal:modalStatus', event => {
        swal({
        title: "Success!",
        text: "Status Banner Berhasil diupdate!",
        icon: "success",
        });
    });
    
    window.addEventListener('swal:modalUpdate', event => {
        swal({
        title: "Success!",
        text: "Data Banner Berhasil diupdate!",
        icon: "success",
        });
    });
    
    window.addEventListener('swal:modalDelete', event => {
    swal({
      title: "Success!",
      text: "Nasabah Banner dihapus!",
      icon: "success",
    });
    });
</script>