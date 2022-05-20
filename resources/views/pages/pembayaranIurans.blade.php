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

    <script>
        @if($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: 'Iuran Nasabah Berhasil dibayarkan.',
            confirmButtonColor: '#27AE60',
        })
        @endif
    </script>

@endsection

@livewireScripts


