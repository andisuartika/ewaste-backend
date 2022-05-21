<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Tailwind Starter Template - Minimal Blog: Tailwind Toolbox</title>
    <meta name="author" content="name" />
    <meta name="description" content="description here" />
    <meta name="keywords" content="keywords,here" />
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
	<div class="container l-main w-full md:max-w-3xl mx-auto pt-20">

		<div class="w-full px-4 md:px-6 text-x leading-normal">

			<!--Title-->
			<div class="font-sans">
				<p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="/artikel" class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">KEMBALI KE ARTIKEL</a></p>
						<h1 class="home__subtitle font-bold font-sans break-normal pt-6 text-3xl md:text-4xl">{{ $artikel->title }}</h1>
						<p class="text-sm md:text-base font-normal text-gray-600">Published {{ $artikel->created_at }}</p>
			</div>
            
            {{-- COVER --}}
            <img alt="Cover Artikel" class="rounded-t-md mt-5" src="{{ asset('storage/'.$artikel->cover) }}">
            {{-- END:COVER --}}

			<!--Post Content-->
			<p class="py-6 text-justify">
				{!! $artikel->content !!}
			</p>
			<!--/ Post Content-->

		</div>

        <!--Divider-->
		<hr class="border-b-2 border-gray-400 my-8 mx-4">

		<!--Author-->
		<div class="flex w-full items-center font-sans px-4 pt-3">
			<img class="w-10 h-10 rounded-full mr-4" src="{{ asset('dist/images/profile-1.jpg') }}" alt="Avatar of Author">
			<div class="flex-1 px-2">
				<p class="text-base font-bold text-base md:text-xl leading-none mb-2">{{ $artikel->user()->get()->implode('name') }}</p>
				<p class="text-gray-600 text-xs md:text-base"> Administrator at <a class="text-green-500 no-underline hover:underline" href="https://www.wastebali.com">wastebali.com</a></p>
			</div>
		</div>
		<!--/Author-->
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

	<script>
		/* Progress bar */
		//Source: https://alligator.io/js/progress-bar-javascript-css-variables/
		var h = document.documentElement,
			b = document.body,
			st = 'scrollTop',
			sh = 'scrollHeight',
			progress = document.querySelector('#progress'),
			scroll;
		var scrollpos = window.scrollY;
		var header = document.getElementById("header");
		var navcontent = document.getElementById("nav-content");

		document.addEventListener('scroll', function() {

			/*Refresh scroll % width*/
			scroll = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
			progress.style.setProperty('--scroll', scroll + '%');

			/*Apply classes for slide in bar*/
			scrollpos = window.scrollY;

			if (scrollpos > 10) {
				header.classList.add("bg-white");
				header.classList.add("shadow");
				navcontent.classList.remove("bg-gray-100");
				navcontent.classList.add("bg-white");
			} else {
				header.classList.remove("bg-white");
				header.classList.remove("shadow");
				navcontent.classList.remove("bg-white");
				navcontent.classList.add("bg-gray-100");

			}

		});


		//Javascript to toggle the menu
		document.getElementById('nav-toggle').onclick = function() {
			document.getElementById("nav-content").classList.toggle("hidden");
		}
	</script>

</body>

</html>