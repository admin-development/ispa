<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Pakar Diagnosa Penyakit ISPA</title>
    {{-- <link href="{{ asset('assets/frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/main.css') }}" rel="stylesheet">
    <style>
        .post-img img {
            width: 100%;
            height: 275px;
        }
        .badge {
            padding: .5rem;
        }
    </style>
    @yield('css')
</head>
<body>
    <header id="header" class="header fixed-top">
        {{-- <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a href="#">support@ispa.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 812 1234 4321</span></i>
                </div>
                @if (!\Session::get('login'))
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#">Guest</a>
                </div>
                @endif
            </div>
        </div> --}}
        <div class="branding d-flex align-items-cente">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="{{ route('app') }}" class="logo d-flex align-items-center">
                    <h1 class="sitename">
                        <img src="{{ asset("images/logo.png") }}" alt="">
                    </h1>
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="{{ route('app') }}" class="active">Beranda<br></a></li>
                        @if (session("login") === true)
                        <li><a href="{{ route('diagnosa') }}">Diagnosa</a></li>
                        @endif
                        <li><a href="{{ route('edukasi') }}">Edukasi</a></li>
                        @if (session("login") === true)
                        <li><a href="{{ route('riwayat') }}">Riwayat</a></li>
                        @endif
                        <li><a href="{{ route('about') }}">About</a></li>
                        @if (\Session::get('login'))
                        <li class="dropdown"><a href="#"><span>{{ \Session::get('nama') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                @if (\Session::get('group') == 1)
                                <li>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                                @endif
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="outForm">
                                        @csrf
                                        <a href="#" onclick="outForm.submit();">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>
                        @endif
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        @if (\Request::segment(1) == 'beranda' || !\Request::segment(1))
        <section id="beranda" class="hero section accent-background">
            <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
                <div class="row gy-5 justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2><span>Welcome to </span><span class="accent">Sistem Pakar Diagnosa Penyakit ISPA</span></h2>
                        <p>Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik bagi Anda. Kesehatan Anda adalah prioritas kami!</p>
                        {{-- <div class="d-flex">
                            <a href="{{ route('diagnosa') }}" class="btn-get-started">Get Started</a>
                        </div> --}}
                    </div>
                    <div class="col-lg-5 order-1 order-lg-2">
                        <img src="{{ asset('images/ispa.png') }}" class="img-fluid" alt="">
                        {{-- <img src="{{ asset('assets/frontend/assets/img/hero-img.svg') }}" class="img-fluid" alt=""> --}}
                    </div>
                </div>
            </div>
            <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
                <div class="container position-relative mt-5"></div>
            </div>
        </section>
        <section id="ispa" class="ispa section pt-3">
            <div class="container section-title" data-aos="fade-up">
                <h2>Penyakit ISPA</h2>
            </div>
            <div class="container">
                <div class="row mb-3">
                    <div class="col">
                        <img src="{{ asset("images/1-croup.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Croup</h3>
                        <p>Croup adalah penyakit saluran pernapasan atas pada anak yang umumnya disebabkan oleh infeksi virus.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Sinusitis</h3>
                        <p>Sinusitis akut adalah peradangan pada rongga sinus di hidung yang menyebabkan pembengkakan dan produksi lendir berlebih.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset("images/2-sinusitis.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <img src="{{ asset("images/3-batuk.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Batuk Rejan</h3>
                        <p>Batuk rejan atau pertusis adalah penyakit infeksi saluran pernapasan yang disebabkan oleh bakteri Bordetella pertussis.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Bronkitis</h3>
                        <p>Bronkitis adalah peradangan atau iritasi pada saluran bronkus, yaitu pipa yang menghubungkan tenggorokan dengan paru-paru.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset("images/4-bronkitis.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <img src="{{ asset("images/5-pneumonia.png") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Pneumonia</h3>
                        <p>Pneumonia atau paru-paru basah adalah peradangan pada jaringan paru-paru yang disebabkan oleh infeksi mikroorganisme seperti bakteri, virus, jamur, dan parasit.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Epiglotitis</h3>
                        <p>Epiglotitis adalah peradangan dan pembengkakan pada epiglotis, yaitu jaringan yang berfungsi sebagai katup untuk menutup saluran pernapasan saat menelan.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset("images/6-epiglotitis.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <img src="{{ asset("images/7-bronkospasme.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Bronkospasme</h3>
                        <p>Bronkospasme adalah kondisi ketika otot-otot yang melapisi bronkus (saluran udara paru-paru) menegang dan menyempit, sehingga menyebabkan kesulitan bernapas.</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Slepp Apnea</h3>
                        <p>Sleep apnea adalah gangguan tidur yang menyebabkan pernapasan berhenti atau menjadi sangat pendek saat tidur.</p>
                    </div>
                    <div class="col">
                        <img src="{{ asset("images/8-sleep.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="{{ asset("images/9-stenosis.jpg") }}" alt="" class="img-fluid img-thumbnail w-100">
                    </div>
                    <div class="col d-flex flex-column justify-content-center">
                        <h3>Stenosis Subglotis</h3>
                        <p>Stenosis subglotis (SGS) adalah kondisi penyempitan saluran napas di bawah pita suara dan di atas trakea.</p>
                    </div>
                </div>
            </div>
        </section>
        {{-- <section id="edukasi" class="recent-posts section">
            <div class="container section-title" data-aos="fade-up">
                <h2>Edukasi</h2>
            </div>
            <div class="container">
                <div class="row gy-4">
                    @foreach ($articles as $article)
                    @if ($i === 3)
                        @php
                            $i = 0;
                            $delay = 0;
                        @endphp
                    @endif
                    @php
                        $i++;
                        $delay += 100;
                    @endphp
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $delay }}">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset('images') . '/' . $article->image }}" alt="{{ $article->image }}" class="img-fluid">
                            </div>
                            <h2 class="title">
                                <a href="{{ route('edukasi', $article->id) }}">{{ $article->judul }}</a>
                            </h2>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="about" class="about section">
            <div class="container section-title" data-aos="fade-up">
                <h2>About Us<br></h2>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3>Pengertian Rancang Bangun sistem</h3>
                        <p>Rancang bangun sistem merupakan Rancang bangun sistem adalah suatu proses yang melibatkan perencanaan, pengembangan, dan penerapan sebuah sistem secara keseluruhan, mulai dari identifikasi kebutuhan hingga implementasi.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3>Pengertian Sistem Pakar</h3>
                        <p>Sistem pakar ialah sebuah program komputer yang dirancang untuk meniru kemampuan pengambilan keputusan seorang ahli dalam bidang tertentu.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3>Metode <i>Centainty Factor</i></h3>
                        <p>Metode certainty factor ialah salah satu konsep yang dimana dalam hal untuk akomodasi ketidak pastian terhadap suatu argumentasi ataupun pikiran dari seorang ahli, sebagai analoginya adalah ketika seorang ahli yang setiap saat melakukkan analisa informasi yang dengan ungkapan kepada ketidakpastian maka digunakan metode ini.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3>Pengertian ISPA</h3>
                        <p>Penyakit ISPA adalah kondisi medis yang disebabkan oleh infeksi pada saluran pernapasan, meliputi hidung, tenggorokan, bronkus, hingga paru-paru. ISPA dapat disebabkan oleh berbagai jenis mikroorganisme seperti virus, bakteri, atau jamur.</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3>Pengertian Website</h3>
                        <p>Website ialah suatu kumpulan tampilan web yang terintegrasi dan saling terhubung, membentuk akses portal dengan dashboard sebagai tampilan awal dan web page sebagai tampilan per halaman independent, pengguna dapat mengaksesnya melalui alamat atau link tertentu.</p>
                    </div>
                </div>
            </div>
        </section> --}}
        @else
        @yield('content')
        @endif
    </main>
    <footer id="footer" class="footer accent-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('app') }}" class="logo d-flex align-items-center">
                    <span class="sitename">
                        <img src="{{ asset("images/logo.png") }}" alt="">
                    </span>
                    </a>
                    <p>Selamat datang di website ISPA! Kami berkomitmen untuk memberikan pelayanan kesehatan terbaik bagi Anda. Kesehatan Anda adalah prioritas kami!</p>
                    <p class="mb-0 pb-0">
                        <strong>Phone:</strong>
                        <span>+62 812 1234 4321</span>
                    </p>
                    <p>
                        <strong>Email:</strong>
                        <span>support@ispa.com</span>
                    </p>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                    <li><a href="{{ route('app') }}">Beranda</a></li>
                    @if (session("login") === true)
                    <li><a href="{{ route('diagnosa') }}">Diagnosa</a></li>
                    @endif
                    <li><a href="{{ route('edukasi') }}">Edukasi</a></li>
                    @if (session("login") === true)
                    <li><a href="{{ route('riwayat') }}">Riwayat</a></li>
                    @endif
                    <li><a href="{{ route('about') }}">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container copyright text-center mt-4">
            <p>©<span>Copyright</span><strong class="px-1 sitename">Klinik Pratama Yakrija Jakarta, 2024.</strong><span>All Rights Reserved</span></p>
            <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    @error('error')
        <x-toast type="danger" :message="$message"></x-toast>
    @enderror
        
    <div id="preloader"></div>
    <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/main.js') }}"></script>
    @yield('js')
</body>
</html>