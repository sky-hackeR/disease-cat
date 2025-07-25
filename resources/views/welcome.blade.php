
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageGlobalData->setting->site_name ?? 'AgriC' }} | {{ strip_tags($pageGlobalData->setting->description ?? 'Farming made easy') }}</title>
    <!-- favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}">

    <link rel="manifest" href="frontAssets/images/favicons/site.webmanifest">
    <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/odometer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/agrikon-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontAssets/css/nouislider.pips.css') }}">

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('frontAssets/css/main.css') }}">
</head>

<body>
    <div class="preloader">
        <img 
            class="preloader__image" 
            width="55" 
            src="{{ !empty($pageGlobalData->setting) && $pageGlobalData->setting->favicon ? asset($pageGlobalData->setting->favicon) : asset('frontAssets/images/loader.png') }}" 
            alt="Preloader"
        >
    </div><!-- /.preloader -->

    <div class="page-wrapper">

        <header class="main-header">
            <div class="topbar">
                <div class="container">
                    <div class="topbar__left">
                        <div class="topbar__social">
                            <a href="#" class="fab fa-facebook-square"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-pinterest-p"></a>
                            <a href="#" class="fab fa-instagram"></a>
                        </div><!-- /.topbar__social -->
                        <p>Welcome to {{ $pageGlobalData->setting->site_name ?? 'AgriC' }}</p>
                    </div><!-- /.topbar__left -->
                    <div class="topbar__right">
                        <a href="#"><i class="agrikon-icon-email"></i>needhelp@company.com</a>
                        <a href="#"><i class="agrikon-icon-clock"></i>Mon - Sat 8:00 - 6:30, Sunday - CLOSED</a>
                    </div><!-- /.topbar__right -->
                </div><!-- /.container -->
            </div><!-- /.topbar -->
            <nav class="main-menu">
                <div class="container">
                    <div class="logo-box">
                        <a href="{{ url('/') }}" aria-label="logo image">
                            <img 
                                src="{{ !empty($pageGlobalData->setting) && $pageGlobalData->setting->logo ? asset($pageGlobalData->setting->logo) : asset('frontAssets/images/logo-dark.png') }}" 
                                width="153" 
                                alt="Logo"
                            >
                        </a>
                        <span class="fa fa-bars mobile-nav__toggler"></span>
                    </div><!-- /.logo-box -->
                    <ul class="main-menu__list">
                        <li class="dropdown">
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li class="dropdown"><a href="#">Pages</a>
                            <ul>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="service-details.html">Service Details</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="projects.html">Projects</a>
                            <ul>
                                <li><a href="projects.html">Projects</a></li>
                                <li><a href="project-details.html">Projects Details</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="blog.html">News</a>
                            <ul>
                                <li><a href="blog.html">News</a></li>
                                <li><a href="blog-details.html">News Details</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- /.main-menu__list -->

                    <div class="main-header__info">
                        <a href="tel:92-666-888-0000" class="main-header__info-phone">
                            <i class="agrikon-icon-phone-call"></i>
                            <span class="main-header__info-phone-content">
                                <span class="main-header__info-phone-text">Call Anytime</span>
                                <span class="main-header__info-phone-title">92 666 888 0000</span>
                            </span><!-- /.main-header__info-phone-content -->
                        </a><!-- /.main-header__info-phone -->
                    </div><!-- /.main-header__info -->
                </div><!-- /.container -->
            </nav>
            <!-- /.main-menu -->
        </header><!-- /.main-header -->

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <section class="main-slider">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{
        "slidesPerView": 1,
        "loop": true,
        "effect": "fade",
        "autoplay": {
            "delay": 5000
        },
        "navigation": {
            "nextEl": "#main-slider__swiper-button-next",
            "prevEl": "#main-slider__swiper-button-prev"
        }
    }'>
                {{-- <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(frontAssets/images/main-slider/main-slider-1-1.jpg);">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7">
                                    <span class="tagline">Welcome to Agriculture Farm</span>
                                    <h2><span>Agriculture</span> <br>
                                        & Eco Farming</h2>
                                    <p>There are many of passages of lorem Ipsum, but the majori have <br> suffered alteration
                                        in some form.</p>
                                    <a href="#" class=" thm-btn">Discover More</a>
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(frontAssets/images/main-slider/main-slider-1-2.jpg);">
                        </div>
                        <!-- /.image-layer -->
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7">
                                    <span class="tagline">Welcome to Agriculture Farm</span>
                                    <h2><span>Agriculture</span><br>
                                        & Eco Farming</h2>
                                    <p>There are many of passages of lorem Ipsum, but the majori have <br> suffered alteration
                                        in some form.</p>
                                    <a href="#" class=" thm-btn">Discover More</a>
                                    <!-- /.thm-btn dynamic-radius -->
                                </div><!-- /.col-lg-7 text-right -->
                            </div><!-- /.row -->
                        </div><!-- /.container -->
                    </div><!-- /.swiper-slide -->
                </div><!-- /.swiper-wrapper --> --}}

                <div class="swiper-wrapper">
                    @foreach ($swipers as $swiper)
                        @php
                            $words = explode(' ', $swiper->title);
                            $first = $words[0] ?? '';
                            $rest = implode(' ', array_slice($words, 1));
                        @endphp
                        <div class="swiper-slide">
                            {{-- <div class="image-layer" style="background-image: url('{{ $swiper->image }}');"></div> --}}
                            <div class="image-layer" style="
                                background-image: url('{{ $swiper->image }}');
                                height: 1000px;
                                background-size: cover;
                                background-position: center;
                                background-repeat: no-repeat;
                            "></div>

                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-7 col-lg-7">
                                        <span class="tagline">Welcome to {{ $pageGlobalData->setting->site_name ?? 'AgriC' }}</span>
                                        <h2>
                                            <span>{{ $first }}</span><br>{{ $rest }}
                                        </h2>
                                        <p>{{ $swiper->subtitle }}</p>
                                        <a href="#" class="thm-btn">Discover More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="agrikon-icon-left-arrow"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
                </div><!-- /.main-slider__nav -->

            </div><!-- /.swiper-container thm-swiper__slider -->
        </section><!-- /.main-slider -->

        <section class="service-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="frontAssets/images/services/service-1-1.jpg" alt="">
                            <div class="service-one__box-content">
                                <h3><a href="service-details.html">Agriculture Leader</a></h3>
                            </div><!-- /.service-one__box-content -->
                        </div><!-- /.service-one__box -->
                    </div><!-- /.col-md-12 col-lg-4 -->
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="frontAssets/images/services/service-1-2.jpg" alt="">
                            <div class="service-one__box-content">
                                <h3><a href="service-details.html">Quality Standards</a></h3>
                            </div><!-- /.service-one__box-content -->
                        </div><!-- /.service-one__box -->
                    </div><!-- /.col-md-12 col-lg-4 -->
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="frontAssets/images/services/service-1-3.jpg" alt="">
                            <div class="service-one__box-content">
                                <h3><a href="service-details.html">Organic Services</a></h3>
                            </div><!-- /.service-one__box-content -->
                        </div><!-- /.service-one__box -->
                    </div><!-- /.col-md-12 col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-one -->

        <section class="about-one">
            <img src="frontAssets/images/icons/about-bg-icon-1-1.png" class="about-one__bg-shape-1" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="about-one__images">
                            <img src="frontAssets/images/resources/about-1-1.jpg" alt="">
                            <img src="frontAssets/images/resources/about-1-2.jpg" alt="">
                            <div class="about-one__count wow fadeInLeft" data-wow-duration="1500ms">
                                <span>Trusted by</span>
                                <h4>8900</h4>
                            </div><!-- /.about-one__count -->
                        </div><!-- /.about-one__images -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-7">
                        <div class="about-one__content">
                            <div class="block-title text-left">
                                <div class="block-title__image"></div><!-- /.block-title__image -->
                                <p>Welcome to agricon</p>
                                <h3>Better Agriculture for
                                    Better Future</h3>
                            </div><!-- /.block-title -->
                            <div class="about-one__tagline">
                                <p>We have 30 years of agriculture & eco farming experience globaly</p>
                            </div><!-- /.about-one__tagline -->
                            <div class="about-one__summery">
                                <p>There are many variations of passages of lorem ipsum available but the majority have suffered
                                    alteration in some form by injected humor or random word which don't look even.</p>
                            </div><!-- /.about-one__summery -->
                            <div class="about-one__icon-row">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="about-one__box">
                                            <i class="agrikon-icon-farmer"></i>
                                            <h4><a href="about.html">Professional
                                                    Farmers</a></h4>
                                        </div><!-- /.about-one__box -->
                                    </div><!-- /.col-lg-6 -->
                                    <div class="col-lg-6">
                                        <div class="about-one__box">
                                            <i class="agrikon-icon-agriculture"></i>
                                            <h4><a href="services.html">Organic & Eco
                                                    Solutions</a></h4>
                                        </div><!-- /.about-one__box -->
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->
                            </div><!-- /.about-one__icon-row -->
                            <a href="about.html" class="thm-btn">Discover More</a><!-- /.thm-btn -->
                        </div><!-- /.about-one__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-one -->

        <section class="service-two">
            <div class="service-two__bottom-curv"></div><!-- /.service-two__bottom-curv -->
            <div class="container">
                <div class="block-title text-center">
                    <div class="block-title__image"></div><!-- /.block-title__image -->
                    <p>Our Services list</p>
                    <h3>What We’re Offering</h3>
                </div><!-- /.block-title -->
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="service-two__card">
                            <div class="service-two__card-image">
                                <img src="frontAssets/images/services/service-2-1.jpg" alt="">
                            </div><!-- /.service-two__card-image -->
                            <div class="service-two__card-content">
                                <div class="service-two__card-icon">
                                    <i class="agrikon-icon-tractor"></i>
                                </div><!-- /.service-two__card-icon -->
                                <h3><a href="service-details.html">Agriculture Products</a></h3>
                                <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                            </div><!-- /.service-two__card-content -->
                        </div><!-- /.service-two__card -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="service-two__card">
                            <div class="service-two__card-image">
                                <img src="frontAssets/images/services/service-2-2.jpg" alt="">
                            </div><!-- /.service-two__card-image -->
                            <div class="service-two__card-content">
                                <div class="service-two__card-icon">
                                    <i class="agrikon-icon-organic-food"></i>
                                </div><!-- /.service-two__card-icon -->
                                <h3><a href="service-details.html">Oragnic
                                        Products</a></h3>
                                <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                            </div><!-- /.service-two__card-content -->
                        </div><!-- /.service-two__card -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="service-two__card">
                            <div class="service-two__card-image">
                                <img src="frontAssets/images/services/service-2-3.jpg" alt="">
                            </div><!-- /.service-two__card-image -->
                            <div class="service-two__card-content">
                                <div class="service-two__card-icon">
                                    <i class="agrikon-icon-vegetable"></i>
                                </div><!-- /.service-two__card-icon -->
                                <h3><a href="service-details.html">Fresh
                                        Vegetables</a></h3>
                                <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                            </div><!-- /.service-two__card-content -->
                        </div><!-- /.service-two__card -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="service-two__card">
                            <div class="service-two__card-image">
                                <img src="frontAssets/images/services/service-2-4.jpg" alt="">
                            </div><!-- /.service-two__card-image -->
                            <div class="service-two__card-content">
                                <div class="service-two__card-icon">
                                    <i class="agrikon-icon-dairy"></i>
                                </div><!-- /.service-two__card-icon -->
                                <h3><a href="service-details.html">Dairy
                                        Products</a></h3>
                                <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                            </div><!-- /.service-two__card-content -->
                        </div><!-- /.service-two__card -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.service-two -->

        <div class="projects-one project-one__home-one">
            <div class="container">
                <div class="block-title text-center">
                    <div class="block-title__image"></div><!-- /.block-title__image -->
                    <p>Closed projects</p>
                    <h3>Latest Projects List</h3>
                </div><!-- /.block-title -->
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 0, "slidesPerView": 1, "loop": true, "slidesPerGroup": 1, "pagination": {
            "el": "#projects-one__swiper-pagination",
            "type": "bullets",
            "clickable": true
        },
        "breakpoints": {
            "0": {
                "spaceBetween": 0,
                "slidesPerView": 1,
                "slidesPerGroup": 1
            },
            "640": {
                "spaceBetween": 30,
                "slidesPerView": 2,
                "slidesPerGroup": 2
            },
            "992": {
                "spaceBetween": 30,
                "slidesPerView": 2,
                "slidesPerGroup": 2
            }
        }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-1.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-2.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-3.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-4.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-2.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="projects-one__single">
                                <img src="frontAssets/images/projects/project-2-4.jpg" alt="">
                                <div class="projects-one__content">
                                    <h3>Harvest Innovation</h3>
                                    <a href="project-details.html" class="projects-one__button"><i class="agrikon-icon-right-arrow"></i></a><!-- /.projects-one__button -->
                                </div><!-- /.projects-one__content -->
                            </div><!-- /.projects-one__single -->
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                    <div class="swiper-pagination" id="projects-one__swiper-pagination"></div>
                </div><!-- /.swiper-container -->
            </div><!-- /.container -->
        </div><!-- /.projects-one -->

        <section class="call-to-action__three jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
            <img class="call-to-action__three__bg jarallax-img" src="frontAssets/images/backgrounds/cta-1-bg-1.jpg" alt="parallax-image" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="call-to-action__three-image">
                            <img src="frontAssets/images/resources/cta-3-1.jpg" alt="">
                            <img src="frontAssets/images/resources/cta-3-2.jpg" alt="">
                        </div><!-- /.call-to-action__three-image -->
                    </div><!-- /.col-lg-5 -->
                    <div class="col-lg-7">
                        <div class="call-to-action__three-content">
                            <h3>Providing High Quality
                                Products</h3>
                            <a href="about.html" class="thm-btn">Discover More</a><!-- /.thm-btn -->
                        </div><!-- /.call-to-action__three-content -->
                    </div><!-- /.col-lg-7 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.call-to-action__three -->

        <section class="testimonials-one">
            <img src="frontAssets/images/icons/testimonials-bg-1-1.png" class="testimonials-one__bg" alt="">
            <div class="container">
                <h2 class="testimonials-one__title">Testimonials</h2>
                <div id="testimonials-one__carousel" class="testimonials-one__carousel swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonials-one__icons">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div><!-- /.testimonials-one__icons -->
                            <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly
                                refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                                reprehenderit in esse nulla pariatur.</p>
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__icons">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div><!-- /.testimonials-one__icons -->
                            <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly
                                refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                                reprehenderit in esse nulla pariatur.</p>
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__icons">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div><!-- /.testimonials-one__icons -->
                            <p>This is due to their excellent service, competitive pricing and customer support. It’s throughly
                                refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                                reprehenderit in esse nulla pariatur.</p>
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /#testimonials-one__carousel -->

                <div id="testimonials-one__thumb" class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonials-one__image">
                                <img src="frontAssets/images/resources/testimonials-1-1.jpg" alt="">
                            </div><!-- /.testimonials-one__image -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__image">
                                <img src="frontAssets/images/resources/testimonials-1-2.jpg" alt="">
                            </div><!-- /.testimonials-one__image -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__image">
                                <img src="frontAssets/images/resources/testimonials-1-3.jpg" alt="">
                            </div><!-- /.testimonials-one__image -->
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /#testimonials-one__thumb.swiper-container -->

                <div id="testimonials-one__meta" class="testimonials-one__carousel swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="testimonials-one__meta">
                                <h4>Jessica Brown</h4>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__meta -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__meta">
                                <h4>Caleb Hoffman</h4>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__meta -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="testimonials-one__meta">
                                <h4>Bradley Kim</h4>
                                <span>Customer</span>
                            </div><!-- /.testimonials-one__meta -->
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /#testimonials-one__meta.swiper-container -->
                <div class="swiper-pagination" id="testimonials-one__swiper-pagination"></div>
            </div><!-- /.container -->
        </section><!-- /.testimonials-one -->

        <section class="gray-boxed-wrapper home-one__boxed">
            <img src="frontAssets/images/icons/home-1-blog-bg.png" alt="" class="home-one__boxed-bg">
            <div class="blog-home-two blog-home-one">
                <div class="container">
                    <div class="row top-row">
                        <div class="col-lg-6">
                            <div class="block-title">
                                <div class="block-title__image"></div><!-- /.block-title__image -->
                                <p>From the blog post</p>
                                <h3>Latest News & Articles
                                    Directly from Blog</h3>
                            </div><!-- /.block-title -->
                        </div><!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <p class="block-text">Lorem ipsum is simply free text available. Aenean eu leo quam. Pellentesque
                                ornare
                                sem lacinia
                                quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur.</p>
                        </div><!-- /.col-lg-6 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="blog-card">
                                <div class="blog-card__image">
                                    <img src="frontAssets/images/blog/blog-grid-1.jpg" alt="Best Way to Do Eco and Agriculture">
                                    <a href="blog-details.html"></a>
                                </div><!-- /.blog-card__image -->
                                <div class="blog-card__content">
                                    <div class="blog-card__date">18 Nov</div><!-- /.blog-card__date -->
                                    <div class="blog-card__meta">
                                        <a href="blog-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                                        <a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </div><!-- /.blog-card__meta -->
                                    <h3><a href="blog-details.html">Best Way to Do Eco and Agriculture</a></h3>
                                    <a href="blog-details.html" class="thm-btn">Read More</a><!-- /.thm-btn -->
                                </div><!-- /.blog-card__content -->
                            </div><!-- /.blog-card -->
                        </div><!-- /.col-md-12 col-lg-4 -->
                        <div class="col-md-12 col-lg-4">
                            <div class="blog-card">
                                <div class="blog-card__image">
                                    <img src="frontAssets/images/blog/blog-grid-2.jpg" alt="Leverage agile frameworks to provide">
                                    <a href="blog-details.html"></a>
                                </div><!-- /.blog-card__image -->
                                <div class="blog-card__content">
                                    <div class="blog-card__date">18 Nov</div><!-- /.blog-card__date -->
                                    <div class="blog-card__meta">
                                        <a href="blog-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                                        <a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </div><!-- /.blog-card__meta -->
                                    <h3><a href="blog-details.html">Leverage agile frameworks to provide</a></h3>
                                    <a href="blog-details.html" class="thm-btn">Read More</a><!-- /.thm-btn -->
                                </div><!-- /.blog-card__content -->
                            </div><!-- /.blog-card -->
                        </div><!-- /.col-md-12 col-lg-4 -->
                        <div class="col-md-12 col-lg-4">
                            <div class="blog-card">
                                <div class="blog-card__image">
                                    <img src="frontAssets/images/blog/blog-grid-3.jpg" alt="Organically grow the holistic world view">
                                    <a href="blog-details.html"></a>
                                </div><!-- /.blog-card__image -->
                                <div class="blog-card__content">
                                    <div class="blog-card__date">18 Nov</div><!-- /.blog-card__date -->
                                    <div class="blog-card__meta">
                                        <a href="blog-details.html"><i class="far fa-user-circle"></i> by Admin</a>
                                        <a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </div><!-- /.blog-card__meta -->
                                    <h3><a href="blog-details.html">Organically grow the holistic world view</a></h3>
                                    <a href="blog-details.html" class="thm-btn">Read More</a><!-- /.thm-btn -->
                                </div><!-- /.blog-card__content -->
                            </div><!-- /.blog-card -->
                        </div><!-- /.col-md-12 col-lg-4 -->
                    </div><!-- /.row -->
                    <hr />
                </div><!-- /.container -->
            </div><!-- /.blog-home-two -->
            <div class="blog-home__slogan">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="blog-home__slogan-main">
                                <i class="agrikon-icon-farm"></i>
                                <div class="blog-home__slogan-content">
                                    <h3>We Care About Our Agriculture Growth</h3>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                        suffered in some form, by injected humour words.</p>
                                </div><!-- /.blog-home__slogan-content -->
                            </div><!-- /.blog-home__slogan-main -->
                        </div><!-- /.col-lg-9 -->
                        <div class="col-lg-3">
                            <div class="blog-home__slogan-image">
                                <img src="frontAssets/images/resources/blog-cta-1.png" alt="">
                            </div><!-- /.blog-home__slogan-image -->
                        </div><!-- /.col-lg-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.blog-home__slogan -->
        </section><!-- /.gray-boxed-wrapper -->

        <section class="contact-two">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                        <div class="contact-two__image">
                            <div class="contact-two__image-bubble-1"></div><!-- /.contact-two__image-bubble-1 -->
                            <div class="contact-two__image-bubble-2"></div><!-- /.contact-two__image-bubble-2 -->
                            <div class="contact-two__image-bubble-3"></div><!-- /.contact-two__image-bubble-3 -->
                            <img src="frontAssets/images/resources/contact-1-1.jpg" class="img-fluid" alt="">
                        </div><!-- /.contact-two__image -->
                    </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-5 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                        <div class="contact-two__content">
                            <div class="block-title">
                                <div class="block-title__image"></div><!-- /.block-title__image -->
                                <p>Contact now</p>
                                <h3>Leave Us A
                                    Message</h3>
                            </div><!-- /.block-title -->
                            <div class="contact-two__summery">
                                <p>Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor
                                    incididunt
                                    ut labore et dolore magna aliqua lonm andhn. Aenean tincidunt id mauris id auctor. Donec at
                                    ligula lacus dignissim mi quis simply neque.</p>
                            </div><!-- /.contact-two__summery -->
                        </div><!-- /.contact-two__content -->
                    </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                        <form action="https://ninetheme.com/themes/html-templates/agrikon/assets/inc/sendemail.php" class="contact-one__form contact-form-validated">
                            <div class="row">
                                <div class="col-lg-12">
                                    <input type="text" name="name" placeholder="Full Name">
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-12">
                                    <input type="text" name="email" placeholder="Email Address">
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-12">
                                    <input type="text" name="phone" placeholder="Phone Number">
                                </div><!-- /.col-lg-6 -->
                                <div class="col-lg-12">
                                    <textarea name="message" placeholder="Write Message"></textarea>
                                </div><!-- /.col-lg-12 -->
                                <div class="col-lg-12">
                                    <button type="submit" class="thm-btn">Send Message</button><!-- /.thm-btn -->
                                </div><!-- /.col-lg-12 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-two -->



        <div class="client-carousel client-carousel__has-border-top">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 140, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                "0": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "375": {
                    "spaceBetween": 30,
                    "slidesPerView": 2
                },
                "575": {
                    "spaceBetween": 30,
                    "slidesPerView": 3
                },
                "767": {
                    "spaceBetween": 50,
                    "slidesPerView": 4
                },
                "991": {
                    "spaceBetween": 50,
                    "slidesPerView": 5
                },
                "1199": {
                    "spaceBetween": 100,
                    "slidesPerView": 5
                }
            }}'>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="frontAssets/images/resources/brand-1-1.png" alt="">
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->
                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.container -->
        </div><!-- /.client-carousel -->
        <footer class="site-footer">
            <img src="frontAssets/images/icons/footer-bg-icon-1.png" class="site-footer__shape-1" alt="">
            <img src="frontAssets/images/icons/footer-bg-icon-2.png" class="site-footer__shape-2" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="footer-widget">
                            <a href="index.html" class="footer-widget__Logo">
                                <img src="frontAssets/images/logo-light.png" width="153" alt="">
                            </a>
                            <p>There are many variations of passages of lorem ipsum available, but the majority suffered.
                            </p>
                            <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                                <input type="email" name="EMAIL" placeholder="Email Address">
                                <button type="submit"><i class="agrikon-icon-right-arrow"></i></button>
                            </form><!-- /.mc-form -->
                            <div class="mc-form__response"></div><!-- /.mc-form__response -->
                            <div class="footer__social">
                                <a href="#" class="fab fa-facebook-square"></a>
                                <a href="#" class="fab fa-twitter"></a>
                                <a href="#" class="fab fa-pinterest-p"></a>
                                <a href="#" class="fab fa-instagram"></a>
                            </div><!-- /.topbar__social -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-4 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                        <div class="footer-widget footer-widget__links-widget">
                            <h3 class="footer-widget__title">Links</h3><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__links">
                                <li><a href="#">Our Projects</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">New Campaign</a></li>
                                <li><a href="#">Upcoming Events</a></li>
                                <li><a href="#">Volunteers</a></li>
                            </ul><!-- /.list-unstyled -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-2 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <div class="footer-widget">
                            <h3 class="footer-widget__title">News</h3><!-- /.footer-widget__title -->
                            <ul class="list-unstyled footer-widget__post">
                                <li>
                                    <img src="frontAssets/images/resources/footer-post-1.png" alt="">
                                    <div class="footer-widget__post-content">
                                        <span>Nov 16, 2020</span>
                                        <h4><a href="blog-details.html">How to grow vagetables in the forms</a></h4>
                                    </div><!-- /.footer-widget__post-content -->
                                </li>
                                <li>
                                    <img src="frontAssets/images/resources/footer-post-2.png" alt="">
                                    <div class="footer-widget__post-content">
                                        <span>Nov 16, 2020</span>
                                        <h4><a href="blog-details.html">How to grow vagetables in the forms</a></h4>
                                    </div><!-- /.footer-widget__post-content -->
                                </li>
                            </ul><!-- /.list-unstyled footer-widget__post -->
                        </div><!-- /.footer-widget -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        <h3 class="footer-widget__title">Contact</h3><!-- /.footer-widget__title -->
                        <ul class="list-unstyled footer-widget__contact">
                            <li>
                                <i class="agrikon-icon-telephone"></i>
                                <a href="tel:666-888-0000">666 888 0000</a>
                            </li>
                            <li>
                                <i class="agrikon-icon-email"></i>
                                <a href="mailto:needhelp@company.com">needhelp@company.com</a>
                            </li>
                            <li>
                                <i class="agrikon-icon-pin"></i>
                                <a href="#">80 broklyn golden street line
                                    New York, USA</a>
                            </li>
                        </ul><!-- /.list-unstyled -->
                    </div><!-- /.col-sm-12 col-md-6 col-lg-3 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.site-footer -->
        <div class="bottom-footer">
            <div class="container">
                <p>© Copyright 2020 by Company.com</p>
                <div class="bottom-footer__links">
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Sitemap</a>
                </div><!-- /.bottom-footer__links -->
            </div><!-- /.container -->
        </div><!-- /.bottom-footer -->

    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="far fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="frontAssets/images/logo-light.png" width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="agrikon-icon-email"></i>
                    <a href="mailto:needhelp@agrikon.com">needhelp@agrikon.com</a>
                </li>
                <li>
                    <i class="agrikon-icon-telephone"></i>
                    <a href="tel:666-888-0000">666 888 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__language">
                    <img src="frontAssets/images/resources/flag-1-1.jpg" alt="">
                    <label class="sr-only" for="language-select">select language</label>
                    <!-- /#language-select.sr-only -->
                    <select class="selectpicker" id="language-select">
                        <option value="english">English</option>
                        <option value="arabic">Arabic</option>
                    </select>
                </div><!-- /.mobile-nav__language -->
                <div class="mobile-nav__social">
                    <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                    <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="{{ asset('frontAssets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/wow.js') }}"></script>
    <script src="{{ asset('frontAssets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('frontAssets/js/nouislider.min.js') }}"></script>

    <!-- template js -->
    <script src="{{ asset('frontAssets/js/theme.js') }}"></script>
</body>

</html>