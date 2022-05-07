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
        swal({
        title: "Success!",
        text: "Petugas Berhasil ditambahkan!",
        icon: "success",
        });
    });

    window.addEventListener('swal:modalUpdate', event => {
    swal({
    title: "Success!",
    text: "Data Nasabah Berhasil diupdate!",
    icon: "success",
    });
    });

    window.addEventListener('swal:modalDelete', event => {
    swal({
    title: "Success!",
    text: "Petugas Berhasil dihapus!",
    icon: "success",
    });
    });

</script>

