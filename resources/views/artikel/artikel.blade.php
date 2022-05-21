<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>E-Waste | Artikel</title>
    <meta name="author" content="ewaste" />
    <meta name="description" content="artikel ewaste" />
    <meta name="keywords" content="ewaste,artikel" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
    <link rel = "icon" href = "{{ asset('img/e-waste.png') }}" type = "image/png">
    <!--Replace with your tailwind.css once created-->
  </head>

  
<body>

	<!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
            <a href="#" class="nav__logo">E-Waste</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/" class="nav__link">Beranda</a></li>
                    <li class="nav__item"><a href="#home" class="nav__link active-link">Artikel</a></li>

                    <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    
	<!--Container-->
	<div class="container w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full md:px-6 text-x leading-normal">

			<!--Title-->
			<div class="font-sans">
				<p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="/" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">KEMBALI KE HALAMAN UTAMA</a></p>
						<h1 class="home__subtitle font-bold font-sans break-normal pt-6 text-3xl md:text-4xl">Artikel E-Waste </h1>
						<p class="text-sm md:text-base font-normal text-gray-600">Artikel terbaru yang bisa kamu baca</p>
			</div>
            <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                <!-- BEGIN: Artikel Layout -->
                @foreach ($artikels as $artikel )
                    <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box">
                        <div class="flex items-center border-b border-gray-200 px-5 py-4">
                            <div class="w-10 h-10 flex-none image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/profile-1.jpg') }}">
                            </div>
                            <div class="ml-3 mr-auto">
                                <a href="" class="font-medium">{{ $artikel->user()->get()->implode('name') }}</a> 
                                <div class="flex text-gray-600 truncate text-xs mt-1"> <a class="text-theme-1 inline-block truncate" href="">Published</a> <span class="mx-1">•</span> {{ date('d/m/y H:m', strtotime($artikel->created_at)) }}</div>
                            </div>
                        </div>
                        <div class="p-5">
                            <div class="h-40 xxl:h-56 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{ asset('storage/'.$artikel->cover) }}">
                            </div>
                            <a href="{{ route('artikelShow',$artikel->slug) }}" class="block font-medium text-base mt-5">{{ $artikel->title }}</a> 
                            <div class="text-gray-700 mt-2">{!! Str::limit($artikel->content, 150) !!}</div>
                        </div>
                    </div>
                @endforeach
                <!-- END: Artkel Layout -->
            </div>

		</div>


	</div>
	<!--/container-->

	<!--========== FOOTER ==========-->
    <footer class="footer section bd-container">
        <div class="footer__container bd-grid">
            <div class="footer__content">
                <a href="#" class="footer__logo">E-Waste</a>
                <span class="footer__description">Layanan Mobile mendukung Bali Smart City</span>
                <div>
                    <a href="#" class="footer__social"><i class='bx bxl-facebook'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-instagram'></i></a>
                    <a href="#" class="footer__social"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Layanan</h3>
                <ul>
                    <li><a href="#" class="footer__link">Pilah Sampah</a></li>
                    <li><a href="#" class="footer__link">Jadwal Pengangkutan</a></li>
                    <li><a href="#" class="footer__link">Konversi</a></li>
                    <li><a href="#" class="footer__link">Lokasi Bank Sampah</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Informasi</h3>
                <ul>
                    <li><a href="#" class="footer__link">Cara Penggunaan</a></li>
                    <li><a href="#" class="footer__link">Kontak Kami</a></li>
                    <li><a href="#" class="footer__link">Kebijakan Privasi</a></li>
                    <li><a href="#" class="footer__link">Syarat dan Ketentuan</a></li>
                </ul>
            </div>

            <div class="footer__content">
                <h3 class="footer__title">Kontak</h3>
                <ul>
                    <li>Singaraja - Bali</li>
                    <li>Bali</li>
                    <li>+6285 656 394 944</li>
                    <li>cs@ewaste.id</li>
                </ul>
            </div>
        </div>

        <p class="footer__copy">&#169; 2021 E-Waste. All right reserved</p>
    </footer>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset ('dist/js/app.js') }}"></script>

</body>

</html>