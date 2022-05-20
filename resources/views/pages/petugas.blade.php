@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Petugas</title>
@endsection
@section('pengguna', 'side-menu--active')
@section('petugas', 'side-menu--active')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Petugas Sampah</h2>
    @livewire('petugas-index')
@endsection


@stack('scripts')
<script>
    window.addEventListener('closeModal', event =>{
        $('#header-footer-modal-preview').modal('hide');
    });

    window.addEventListener('swal:modalCreate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Petugas Berhasil ditambahkan!.',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/petugas";
        }})
        
    });

    window.addEventListener('swal:modalUpdate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Petugas Berhasil diupdate!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/petugas";
            }
        })
    });
        

    window.addEventListener('swal:modalDelete', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Petugas Berhasil dihapus!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/petugas";
        }})
    });

</script>

