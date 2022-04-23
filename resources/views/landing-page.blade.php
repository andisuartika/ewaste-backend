<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--========== BOX ICONS ==========-->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <!--========== CSS ==========-->
        <link rel="stylesheet" href="{{ asset('css/styles.css')}}">
        <link rel = "icon" href = "{{ asset('img/e-waste.png') }}" type = "image/png">

        <title>E-Waste Home Page</title>
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
                        <li class="nav__item"><a href="#home" class="nav__link active-link">Beranda</a></li>
                        <li class="nav__item"><a href="#about" class="nav__link">Tentang</a></li>
                        <li class="nav__item"><a href="#services" class="nav__link">Layanan</a></li>
                        <!-- <li class="nav__item"><a href="#menu" class="nav__link">Menu</a></li> -->
                        <li class="nav__item"><a href="#contact" class="nav__link">Kontak Kami</a></li>

                        <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                    </ul>
                </div>

                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-menu'></i>
                </div>
            </nav>
        </header>

        <main class="l-main">
            <!--========== BERANDA ==========-->
            <section class="home" id="home">
                <div class="home__container bd-container bd-grid">
                    <div class="home__data">
                        <h1 class="home__title">E-Waste</h1>
                        <h2 class="home__subtitle">Rubah Sampah <br> jadi Rupiah</h2>
                        <a href="#" class="button">Coming Soon!</a>
                    </div>
    
                    <img src="{{ asset('img/e-waste.png') }}" alt="" class="home__img">
                </div>
            </section>
            
            <!--========== TENTANG ==========-->
            <section class="about section bd-container" id="about">
                <div class="about__container  bd-grid">
                    <div class="about__data">
                        <span class="section-subtitle about__initial">Tentang</span>
                        <h2 class="section-title about__initial">Kami Peduli dengan <br> Lingkungan Hidup</h2>
                        <p class="about__description">Demi mewujudkan Pulau Bali ke arah smart city, pengelolaan sampah sangat diutamakan dengan layanan yang optimal dengan dukungan dari E-Waste ini</p>
                        <!-- <a href="#" class="button">Unduh Sekarang</a> -->
                    </div>

                    <img src="assets/img/splash_1.png" alt="" class="about__img">
                </div>
            </section>

            <!--========== LAYANAN ==========-->
            <section class="services section bd-container" id="services">
                <span class="section-subtitle">Pelayanan</span>
                <h2 class="section-title">Pelayanan Optimal Kami</h2>

                <div class="services__container  bd-grid">
                    <div class="services__content">
                        <br>
                        <img src="{{ asset('img/snap.svg') }}" alt="" height="64" width="64">
                        <br><br>
                            
                        <h3 class="services__title">Layanan Ramah</h3>
                        <p class="services__description">Kami menghadirkan pelayanan yang ramah kepada pengguna dalam mendukung Bank Sampah di Bali </p>
                    </div>

                    <div class="services__content">
                        <br>
                        <img src="{{ asset('img/calendar.svg') }}" alt="" height="64" width="64">
                        <br><br>
                            
                        <h3 class="services__title">Manajemen Sampah</h3>
                        <p class="services__description">Waktu pemilahan dan manajemen sampah yang teratur dalam mendukung Bank Sampah di Bali</p>
                    </div>

                    <div class="services__content">
                        <br>
                        <img src="{{ asset('img/truck2.svg') }}" alt="" height="64" width="64">
                        <br><br>

                        <h3 class="services__title">Proses Pengangkutan</h3>
                        <p class="services__description">Sampah-sampah yang telah dikumpulkan dapat langsung diambil oleh pihak pengelola sampah</p>
                    </div>
                </div>
            </section>


            <!--===== APP =======-->
            <section class="app section bd-container">
                <div class="app__container bd-grid">
                    <div class="app__data">
                        <span class="section-subtitle app__initial">Aplikasi E-Waste</span>
                        <h2 class="section-title app__initial">Aplikasi akan segera tersedia!</h2>
                        <p class="app__description">Aplikasi kami akan segera tersedia di Google Play untuk mendukung kenyamanan pengguna dalam menanggulangi masalah sampah.</p>
                        <div class="app__stores">
                            <a href="#"><img src="{{ asset('img/app2.png') }}" alt="" class="app__store"></a>
                        </div>
                    </div>

                    <img src="{{ asset('img/mobil_app.png') }}" alt="" class="app__img">
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <section class="contact section bd-container" id="contact">
                <div class="contact__container bd-grid">
                    <div class="contact__data">
                        <span class="section-subtitle contact__initial">Mari Berbincang</span>
                        <h2 class="section-title contact__initial">Kontak Kami</h2>
                        <p class="contact__description">Jika menemui kendala atas pelayanan kami, kami siap dihubungi 24/7 yang dilayani oleh Customer Service kami</p>
                    </div>

                    <div class="contact__button">
                        <a href="#" class="button">Hubungi Sekarang</a>
                    </div>
                </div>
            </section>
        </main>

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
    </body>
</html>
