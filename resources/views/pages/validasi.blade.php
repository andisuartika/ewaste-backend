@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Validasi Transaksi</title>
@endsection

@section('validasi-tabungan', 'side-menu--active')

@section('title', 'Validasi Transaksi')

@section('subcontent')
    @livewire('transaksi-index')

    <script>
        @if($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Data Transaksi Berhasil diterima.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>
@endsection