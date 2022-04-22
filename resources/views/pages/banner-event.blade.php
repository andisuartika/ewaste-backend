@extends('../layout/' . $layout)

@section('subhead')
    <title>Banner - Admin E-Waste Bali</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Blanner Event</h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button class="button text-white bg-theme-1 shadow-md mr-2">Tambah Banner</button>
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Post
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="download" class="w-4 h-4 mr-2"></i> Download Post
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
       
            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-4 box">
                <div class="p-5">
                    <div class="h-40 xxl:h-56 image-fit">
                        <img alt="Banner-event" class="rounded-md" src="{{ asset('dist/images/preview-1.jpg') }}">
                    </div>
                    <a href="" class="block font-medium text-base mt-5">Lorem, ipsum dolor </a>
                    <div class="text-gray-700 mt-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. </div>
                </div>
                
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                        <button class="button button--sm text-white bg-theme-1 mr-2">Aktifkan</button>
                        <button class="button button--sm text-gray-700 border border-gray-300">Non Aktif</button>  
                </div>
            </div>
        
        <!-- END: Blog Layout -->
        <!-- BEGIN: Pagination -->
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-no-wrap items-center">
            <ul class="pagination">
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-left"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">1</a>
                </li>
                <li>
                    <a class="pagination__link pagination__link--active" href="">2</a>
                </li>
                <li>
                    <a class="pagination__link" href="">3</a>
                </li>
                <li>
                    <a class="pagination__link" href="">...</a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevron-right"></i>
                    </a>
                </li>
                <li>
                    <a class="pagination__link" href="">
                        <i class="w-4 h-4" data-feather="chevrons-right"></i>
                    </a>
                </li>
            </ul>
            <select class="w-20 input box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>

        @livewire('nasabah-create')
        <!-- END: Pagination -->
    </div>
@endsection