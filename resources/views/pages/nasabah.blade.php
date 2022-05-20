@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Nasabah</title>
@endsection
@section('pengguna', 'side-menu--active')
@section('nasabah', 'side-menu--active')
@section('title', 'Nasabah')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Daftar Nasabah</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Nasabah</button>
            </a>
               @livewire('nasabah-create')
        </div>   
    </div>

    {{-- LIVEWIRE NASABAH --}}
    <div class="z-0">
        @livewire('nasabah-index')
    </div>

@endsection

@livewireScripts
    <script>
        window.addEventListener('closeModal', event =>{
            $('#header-footer-modal-preview').modal('hide');
        });

    window.addEventListener('swal:modalCreate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Nasabah Berhasil ditambahkan!.',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/nasabah";
        }})
        
    });

    window.addEventListener('swal:modalUpdate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Nasabah Berhasil diupdate!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/nasabah";
            }
        })
    });
        

    window.addEventListener('swal:modalDelete', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Nasabah Berhasil dihapus!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/nasabah";
        }})
    });
</script>

