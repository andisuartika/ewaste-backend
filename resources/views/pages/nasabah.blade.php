@extends('../layout/' . $layout)

@section('subhead')
    <title>Users Layout - Midone - Laravel Admin Dashboard Starter Kit</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Users Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Nasabah</button>
            </a>
               @livewire('nasabah-create')
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="users" class="w-4 h-4 mr-2"></i> Add Group
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="message-circle" class="w-4 h-4 mr-2"></i> Send Message
                        </a>
                    </div>
                </div>
            </div>
        </div>   
    </div>

    {{-- LIVEWIRE NASABAH --}}
    @livewire('nasabah-index')

@endsection

@livewireScripts
    <script>
        window.addEventListener('closeModal', event =>{
            $('#header-footer-modal-preview').modal('hide');
        });

    window.addEventListener('swal:modalSuccess', event => {
        swal({
        title: "Success!",
        text: "Nasabah Berhasil ditambahkan!",
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

