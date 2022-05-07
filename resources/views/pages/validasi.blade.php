@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Validasi Transaksi</title>
@endsection

@section('validasi-tabungan', 'side-menu--active')

@section('title', 'Validasi Transaksi')

@section('subcontent')
    @livewire('transaksi-index')

@endsection