@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Pembayaran Iurans</title>
@endsection
@section('pembayaran-iurans', 'side-menu--active')
@section('title', 'Pembayaran Iurans')

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Daftar Iurans</h2>

    {{-- LIVEWIRE Pembayaran --}}
    <div class="z-0">
        @livewire('pembayaran-index')
    </div>

@endsection

@livewireScripts
    <script>
        window.addEventListener('closeModal', event =>{
            $('#header-footer-modal-preview').modal('hide');
        });

    window.addEventListener('swal:modalCreate', event => {
        swal({
        title: "Success!",
        text: "Nasabah Berhasil ditambahkan!",
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
      text: "Nasabah Berhasil dihapus!",
      icon: "success",
    });
  });
    </script>

