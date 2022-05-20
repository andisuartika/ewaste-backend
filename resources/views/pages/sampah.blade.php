@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Sampah</title>
@endsection
@section('sampah', 'side-menu--active')

@section('title', 'Sampah')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Sampah</h2>
    @livewire('sampah-index')

    {{-- ALERT --}}
    <script>
        @if($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Sampah Berhasil diubah.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>
@endsection

<script>

window.addEventListener('swal:modalCreate', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Sampah Berhasil ditambahkan!.',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/sampah";
        }})
        
    });

    window.addEventListener('swal:modalStatus', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Status Sampah Berhasil diupdate!',
            confirmButtonColor: '#27AE60',
        })
    });
        

    window.addEventListener('swal:modalDelete', event => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Sampah Berhasil dihapus!',
            confirmButtonColor: '#27AE60',
        }).then((result) => {
        if (result.isConfirmed) {
            window.location ="/admin/sampah";
        }})
    });

</script>