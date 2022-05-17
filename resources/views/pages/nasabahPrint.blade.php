<!DOCTYPE html>

<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="E-Waste management system">
        <title>Kartu Nasabah | {{ $user->name }}</title></title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
        <style>@page { size: A5 }</style>
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="A5">
        <section class="absolute w-full h-screen  top-0 left-0">
          <div class="absolute top-0 w-full h-full bg-gray-900" style="background-image: url('{{ asset('img/bg-idcard.png') }}'); background-size: 100%; background-repeat: no-repeat;"></div>
          <div class="container mx-auto px-4 h-full">
              <div class="flex content-center items-center justify-center h-full">
                  <div class="w-full lg:w-4/12 px-20 pt-32">
                      <div class="relative flex flex-col min-w-0 break-words w-full mb-6 rounded-lg ">
                          <div class="flex flex-auto  rounded-t mb-0 px-6 py-6">
                              <div class="text-center mb-3 mx-auto">
                                {!! QrCode::size(200)->color(61,116,73)->backgroundColor(0,0,0,0)->style('round')->generate($user->kode_nasabah); !!}    
                              </div>
                              <hr class="mt-6 border-b-1 border-gray-400">
                          </div>
                            <div class="text-theme-1 text-center mb-3 font-bold"><small>QR CODE NASABAH E-WASTE</small></div>
                          <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
                              <div class="text-center mt-6">
                                <button class="button button--lg w-full rounded-lg mr-1 mb-2 bg-theme-1 text-white uppercase">{{ $user->name }}</button>
                              </div>
                              <div class="text-center mt-3">
                                <button class="button button--lg w-full rounded-lg mr-1 mb-2 bg-theme-1 text-white uppercase">{{ $user->noHp }}</button>
                              </div>
                              <div class="text-center mt-3">
                                <button class="button button--lg w-full rounded-lg mr-1 mb-2 bg-theme-1 text-white font-normal uppercase">{{ $user->alamat }}</button>
                              </div>
                          </div>
                          <div class="text-center bottom-0">
                            <span class="block text-sm text-theme-1 sm:text-center dark:text-gray-400">www.wastebali.com</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="dist/js/app.js"></script>
        <script type="text/javascript">
            window.print();
        </script>
        <!-- END: JS Assets-->
    </body>
</html>

