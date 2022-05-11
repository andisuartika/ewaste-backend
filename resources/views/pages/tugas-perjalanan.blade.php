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