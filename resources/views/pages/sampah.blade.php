@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Sampah</title>
@endsection
@section('sampah', 'side-menu--active')

@section('title', 'Sampah')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data Sampah</h2>
    @livewire('sampah-index')

@endsection

<script>


window.addEventListener('swal:modalCreate', event => {
    swal({
    title: "Success!",
    text: "Data Sampah Berhasil ditambahkan!",
    icon: "success",
    });
});

window.addEventListener('swal:modalStatus', event => {
    swal({
    title: "Success!",
    text: "Status Sampah Berhasil diupdate!",
    icon: "success",
    });
});

window.addEventListener('swal:modalUpdate', event => {
    swal({
    title: "Success!",
    text: "Data Sampah Berhasil diupdate!",
    icon: "success",
    });
});

window.addEventListener('swal:modalDelete', event => {
swal({
  title: "Success!",
  text: "Nasabah Berhasil dihapus!",
  icon: "success",
});
});
</script>