<!DOCTYPE html>

    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="img/e-waste.png" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="E-Waste Bali. Login Admin">
        <meta name="keywords" content="ewastebali, ewaste, wastebali">
        <title>E-Waste - Login Admin</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" />
      <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer ></script> 
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="p-0 bg-white">
        <div class="2xl:container h-screen m-auto">
            <div hidden class="fixed inset-0 w-7/12 lg:block">
                <span class="absolute left-6 bottom-6 text-sm"></span>
                <img class="w-full h-full object-cover" src="{{ asset('dist/images/bg-login.png') }}"></img>
            </div>
            <div hidden role="hidden" class="fixed inset-0 w-6/12 ml-auto bg-white backdrop-blur-xl lg:block"></div>
                <div class="relative h-full ml-auto lg:w-6/12">
                    <div class="m-auto py-12 px-6 sm:p-20 xl:w-10/12 bg-white">
                        <div class="my-3">
                            <div class="intro-x text-center">
                                <img src="{{ asset('img/e-waste.png') }}" alt="e-waste" width="100" class="mx-auto">
                                <h2 class="text-2xl font-semibold text-center text-green-600 dark:text-white mt-3">Sign in</h2>
                                <p class="mt-2 text-gray-500 dark:text-gray-300">Silahkan masuk menggunakan akun <b>Petugas</b> E-Waste</p>
                            </div>
                            <div class="mt-5 xl:mt-12 intro-x">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div>
                                        <label for="email" class="block mb-2 text-sm text-gray-600 dark:text-gray-200">Email Address</label>
                                        <input type="email" name="email" id="email" placeholder="example@wastebali.com" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>
            
                                    <div class="mt-6">
                                        <div class="flex justify-between mb-2">
                                            <label for="password" class="text-sm text-gray-600 dark:text-gray-200">Password</label>
                                        </div>
            
                                        <input type="password" name="password" id="password" placeholder="Password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-green-400 dark:focus:border-green-400 focus:ring-green-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                    </div>
            
                                    <div class="mt-10">
                                        <button
                                            class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-theme-1 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                                            Sign in
                                        </button>
                                    </div>
                                    <div class="intro-x mt-6 xl:mt-12 mb-4 text-gray-700 text-center">
                                        E-Waste Management System
                                        <br>
                                        <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a> 
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
        </div><!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
    </body>
</html>
