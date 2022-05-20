@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Tugas Perjalanan </title>
@endsection
@section('tugas-perjalanan', 'side-menu--active')

@section('title', 'Tugas Perjalanan')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10 mb-3">Tugas Perjalanan</h2>
    @livewire('perjalanan-index')
    </div> 
@endsection

<script>
     window.addEventListener('swal:modalCreate', event => {
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Tugas Perjalanan Berhasil ditambahkan!',
            showConfirmButton: false,
            timer: 1500
        })        
    });

    window.addEventListener('swal:modalUpdate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Tugas Perjalana Berhasil diupdate!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/tugas-perjalanan";
            }
        })
    });
        

    window.addEventListener('swal:modalDelete', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Tugas Perjalana Berhasil dihapus!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/tugas-perjalanan";
        }})
    });
</script>