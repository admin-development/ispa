<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'ISPA') }}</title>
    <link href="{{ asset('assets/frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/frontend/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
    <header id="header" class="header fixed-top">
        <div class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
                    <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
                </div>
                <div class="social-links d-none d-md-flex align-items-center">
                    <a href="#">Guest</a>
                </div>
            </div>
        </div>
        <div class="branding d-flex align-items-cente">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <h1 class="sitename">ISPA</h1>
                    <span>.</span>
                </a>
                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Beranda<br></a></li>
                        <li><a href="#">Diagnosa</a></li>
                        <li><a href="#recent-posts">Edukasi</a></li>
                        <li><a href="#">Riwayat Diagnosa</a></li>
                        <li><a href="#about">About</a></li>
                        @if (\Session::get('login'))
                        <li class="dropdown"><a href="#"><span>{{ \Session::get('nama') }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
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
    <section id="hero" class="hero section accent-background">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-5 justify-content-between">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                <h2><span>Welcome to </span><span class="accent">ISPA</span></h2>
                <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat.</p>
                <div class="d-flex">
                    <a href="#about" class="btn-get-started">Get Started</a>
                </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2">
                <img src="assets/img/hero-img.svg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
        <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
            <div class="container position-relative mt-5"></div>
        </div>
    </section>
    <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Voluptatem dignissimos provident laboris nisi ut aliquip ex ea commodo</h3>
            <img src="assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
            <p>Ut fugiat ut sunt quia veniam. Voluptate perferendis perspiciatis quod nisi et. Placeat debitis quia recusandae odit et consequatur voluptatem. Dignissimos pariatur consectetur fugiat voluptas ea.</p>
            <p>Temporibus nihil enim deserunt sed ea. Provident sit expedita aut cupiditate nihil vitae quo officia vel. Blanditiis eligendi possimus et in cum. Quidem eos ut sint rem veniam qui. Ut ut repellendus nobis tempore doloribus debitis explicabo similique sit. Accusantium sed ut omnis beatae neque deleniti repellendus.</p>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
                <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
                </p>
                <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</span></li>
                </ul>
                <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident
                </p>
                <div class="position-relative mt-4">
                <img src="assets/img/about-2.jpg" class="img-fluid rounded-4" alt="">
                <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox pulsating-play-btn"></a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section id="services" class="services section">
        <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
                <div class="icon">
                <i class="bi bi-activity"></i>
                </div>
                <h3>Nesciunt Mete</h3>
                <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
                <div class="icon">
                <i class="bi bi-broadcast"></i>
                </div>
                <h3>Eosle Commodi</h3>
                <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
                <div class="icon">
                <i class="bi bi-easel"></i>
                </div>
                <h3>Ledo Markt</h3>
                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
                <div class="icon">
                <i class="bi bi-bounding-box-circles"></i>
                </div>
                <h3>Asperiores Commodit</h3>
                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
                <div class="icon">
                <i class="bi bi-calendar4-week"></i>
                </div>
                <h3>Velit Doloremque</h3>
                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
                <div class="icon">
                <i class="bi bi-chat-square-text"></i>
                </div>
                <h3>Dolori Architecto</h3>
                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                <a href="service-details.html" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
            </div>
            </div>
        </div>
        </div>
    </section>
    <section id="recent-posts" class="recent-posts section">
        <div class="container section-title" data-aos="fade-up">
        <h2>Recent Blog Posts</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div>
        <div class="container">
        <div class="row gy-4">
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <article>
                <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
                </div>
                <p class="post-category">Politics</p>
                <h2 class="title">
                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                </h2>
                <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                    <p class="post-author">Maria Doe</p>
                    <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                    </p>
                </div>
                </div>
            </article>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <article>
                <div class="post-img">
                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
                </div>
                <p class="post-category">Sports</p>
                <h2 class="title">
                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                </h2>
                <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-2.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                    <p class="post-author">Allisa Mayer</p>
                    <p class="post-date">
                    <time datetime="2022-01-01">Jun 5, 2022</time>
                    </p>
                </div>
                </div>
            </article>
            </div>
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <article>
                <div class="post-img">
                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
                </div>
                <p class="post-category">Entertainment</p>
                <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                </h2>
                <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-author-3.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                <div class="post-meta">
                    <p class="post-author">Mark Dower</p>
                    <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                    </p>
                </div>
                </div>
            </article>
            </div>
        </div>
        </div>
    </section>
    </main>
    <footer id="footer" class="footer accent-background">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                    <span class="sitename">ISPA</span>
                    </a>
                </div>
                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Diagnosa</a></li>
                    <li><a href="#">Edukasi</a></li>
                    <li><a href="#">Riwayat Diagnosa</a></li>
                    <li><a href="#">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">ISPA</strong> <span>All Rights Reserved</span></p>
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
</body>
</html>