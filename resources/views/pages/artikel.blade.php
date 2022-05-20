@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Artikel</title>
@endsection
@section('artkel', 'side-menu--active')

@section('title', 'Artikel')

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Artikel
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('artikelCreate') }}">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Artikel</button>
        </a>
        <div class="dropdown relative ml-auto sm:ml-0">
            <button class="dropdown-toggle button px-2 box text-gray-700">
                <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
            </button>
            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                <div class="dropdown-box__content box p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Post </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="download" class="w-4 h-4 mr-2"></i> Download Post </a>
                </div>
            </div>
        </div>
    </div>
</div>

@livewire('artikel-index')


@endsection

<script>
    window.addEventListener('swal:modalStatus', event => {
        swal({
        title: "Success!",
        text: "Status Artikel Berhasil diupdate!",
        icon: "success",
        });
    });

    window.addEventListener('swal:modalDelete', event => {
        swal({
        title: "Success!",
        text: "Artikel Berhasil dihapus!",
        icon: "success",
        });
    });
</script>