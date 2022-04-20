@extends('../layout/' . $layout)

@section('subhead')
    <title>Admin  - E-Waste Bali</title>
@endsection

@section('subcontent')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Penarikan Saldo</h2>
        
    </div>
    <!-- BEGIN: Datatable -->
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">PRODUCT NAME</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">IMAGES</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">REMAINING STOCK</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">STATUS</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td class="border-b">
                            <div class="font-medium whitespace-no-wrap">Sampah</div>
                            <div class="text-gray-600 text-xs whitespace-no-wrap">Sampah</div>
                        </td>
                        <td class="text-center border-b">
                            <div class="flex sm:justify-center">
                                <div class="intro-x w-10 h-10 image-fit">
                                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                                </div>
                                <div class="intro-x w-10 h-10 image-fit -ml-5">
                                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                                </div>
                                <div class="intro-x w-10 h-10 image-fit -ml-5">
                                    <img alt="Midone Laravel Admin Dashboard Starter Kit" class="rounded-full" src="{{ asset('dist/images/preview-1.jpg')}}">
                                </div>
                            </div>
                        </td>
                        <td class="text-center border-b">12</td>
                        <td class="w-40 border-b">
                            <div class="flex items-center sm:justify-center text-theme-9">
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> Active
                            </div>
                        </td>
                        <td class="border-b w-5">
                            <div class="flex sm:justify-center items-center">
                                <a class="flex items-center mr-3" href="">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                <a class="flex items-center text-theme-6" href="">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
    <!-- END: Datatable -->
@endsection