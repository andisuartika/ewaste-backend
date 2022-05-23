@extends('../layouts/side-menu')

@section('subhead')
    <title>Admin | E-Waste - Push Notification</title>
@endsection
@section('push-notifikasi', 'side-menu--active')

@section('title', 'Push Notifikasi')

@section('subcontent')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">Broadcast Notifikasi</h2>
            <!-- BEGIN: Inbox Menu -->
            <div class="intro-y box bg-theme-1 p-5 mt-6">
                <a href="{{ route('createFCM') }}" type="button" class="button button--lg flex items-center justify-center text-gray-700 w-full bg-white mt-2">
                    <i class="w-4 h-4 mr-2" data-feather="bell"></i> Buat Notifikasi
                </a>
                <div class="border-t border-theme-3 mt-6 pt-6 text-white">
                    <a href="" class="flex items-center px-3 py-2 rounded-md bg-theme-3 font-medium">
                        <i class="w-4 h-4 mr-2" data-feather="bell"></i> Notifikasi
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-feather="inbox"></i> Draft
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <i class="w-4 h-4 mr-2" data-feather="send"></i> Terikirim
                    </a>
                </div>
            </div>
            <!-- END: Inbox Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10 mt-10">
            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5 flex flex-col-reverse sm:flex-row text-gray-600 border-b border-gray-200">
                    <div class="flex items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0">
                        <a href="" class="w-5 h-5 ml-2 flex items-center justify-center">
                            <i class="w-4 h-4" data-feather="refresh-cw"></i>
                        </a>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-feather="more-horizontal"></i>
                        </a>
                    </div>
                    <div class="flex items-center sm:ml-auto">
                        <div>1 - 10 dari {{ $count }}</div>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-feather="chevron-left"></i>
                        </a>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-feather="chevron-right"></i>
                        </a>
                        <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center">
                            <i class="w-4 h-4" data-feather="settings"></i>
                        </a>
                    </div>
                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @foreach ($notifications as $notif )
                    <div class="intro-y">
                        <div class="inbox__item inbox__item--active inline-block sm:block text-gray-700 bg-gray-100 border-b border-gray-200">
                            <div class="flex px-5 py-3">
                                <div class="w-56 flex-none flex items-center mr-10">
                                    <a href="javascript:;" class="w-5 h-5 flex-none ml-2 flex items-center justify-center text-gray-500">
                                        @if ($notif->schedule < $now)
                                            <i class="w-4 h-4" data-feather="send"></i>
                                        @else
                                            <i class="w-4 h-4" data-feather="inbox"></i>
                                        @endif
                                    </a>
                                    <div class="w-12 h-6 flex-none image-fit relative ml-5">
                                        @if ($notif->image)
                                            <img alt="Image-Notif" class="rounded-md" src="{{ $notif->image }}">
                                        @else
                                            <img alt="Image-Notif" class="rounded-md" src="{{ asset('dist/images/preview-1.jpg') }}">
                                        @endif
                                    </div>
                                    <div class="inbox__item--sender truncate ml-3">{{ $notif->title }}</div>
                                </div>
                                <div class="w-64 sm:w-auto truncate">
                                    <span class="inbox__item--highlight">{{ $notif->description }}
                                </div>
                                <div class="inbox__item--time whitespace-no-wrap ml-auto pl-10">{{ $notif->schedule }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">
                    <div class="sm:ml-auto mt-2 sm:mt-0">Gunakan Notifkasi 2 - 3 Setiap Harinya</div>
                </div>
            </div>
            <!-- END: Inbox Content -->
        </div>
    </div>

    <script>
        @if($message = Session::get('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '{{ $message }}',
                    confirmButtonColor: '#27AE60',
                })
        @endif
    </script>
@endsection

