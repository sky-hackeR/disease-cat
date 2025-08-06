<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $pageGlobalData->setting->site_name ?? 'AgriC' }} | {{ strip_tags($pageGlobalData->setting->description ?? 'Farming made easy') }}</title>
        <!-- favicons Icons -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ !empty($pageGlobalData->setting) ? $pageGlobalData->setting->favicon : null }}" />

        <link rel="manifest" href="frontAssets/images/favicons/site.webmanifest" />
        <meta name="description" content="Agrikon HTML Template For Agriculture Farm & Farmers" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/fontawesome-all.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/swiper.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/animate.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/odometer.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/jarallax.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/magnific-popup.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/bootstrap-select.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/agrikon-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/nouislider.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('frontAssets/css/nouislider.pips.css') }}" />

        <!-- template styles -->
        <link rel="stylesheet" href="{{ asset('frontAssets/css/main.css') }}" />
    </head>

    <body>
        <div class="preloader">
            <img class="preloader__image" width="55" src="{{ !empty($pageGlobalData->setting) && $pageGlobalData->setting->favicon ? asset($pageGlobalData->setting->favicon) : asset('frontAssets/images/loader.png') }}" alt="Preloader" />
        </div>
        <!-- /.preloader -->

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
                            </div>
                            <!-- /.topbar__social -->
                            <p>Welcome to {{ $pageGlobalData->setting->site_name ?? 'AgriC' }}</p>
                        </div>
                        <!-- /.topbar__left -->
                        <div class="topbar__right">
                            <a href="#"><i class="agrikon-icon-email"></i>needhelp@company.com</a>
                            <a href="#"><i class="agrikon-icon-clock"></i>Mon - Sat 8:00 - 6:30, Sunday - CLOSED</a>
                        </div>
                        <!-- /.topbar__right -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /.topbar -->
                <nav class="main-menu">
                    <div class="container">
                        <div class="logo-box">
                            <a href="{{ url('/') }}" aria-label="logo image">
                                <img src="{{ !empty($pageGlobalData->setting) && $pageGlobalData->setting->logo ? asset($pageGlobalData->setting->logo) : asset('frontAssets/images/logo-dark.png') }}" width="153" alt="Logo" />
                            </a>
                            <span class="fa fa-bars mobile-nav__toggler"></span>
                        </div>
                        <!-- /.logo-box -->
                        <ul class="main-menu__list">
                            <li class="dropdown">
                                <a href="{{ url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ url('/about') }}">About</a>
                            </li>

                            <li>
                                <a href="{{ url('/services') }}">Services</a>
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages</a>
                                <ul>
                                    <li><a href="services.html">Services</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
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
                                </span>
                                <!-- /.main-header__info-phone-content -->
                            </a>
                            <!-- /.main-header__info-phone -->
                        </div>
                        <!-- /.main-header__info -->
                    </div>
                    <!-- /.container -->
                </nav>
                <!-- /.main-menu -->
            </header>
            <!-- /.main-header -->

            <div class="stricky-header stricked-menu main-menu">
                <div class="sticky-header__content"></div>
                <!-- /.sticky-header__content -->
            </div>
            <!-- /.stricky-header -->

            @yield('content')

            <footer class="site-footer">
                <img src="frontAssets/images/icons/footer-bg-icon-1.png" class="site-footer__shape-1" alt="" />
                <img src="frontAssets/images/icons/footer-bg-icon-2.png" class="site-footer__shape-2" alt="" />
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
                            <div class="footer-widget">
                                <a href="index.html" class="footer-widget__Logo">
                                    <img src="frontAssets/images/logo-light.png" width="153" alt="" />
                                </a>
                                <p>There are many variations of passages of lorem ipsum available, but the majority suffered.</p>
                                <form action="#" data-url="YOUR_MAILCHIMP_URL" class="mc-form">
                                    <input type="email" name="EMAIL" placeholder="Email Address" />
                                    <button type="submit"><i class="agrikon-icon-right-arrow"></i></button>
                                </form>
                                <!-- /.mc-form -->
                                <div class="mc-form__response"></div>
                                <!-- /.mc-form__response -->
                                <div class="footer__social">
                                    <a href="#" class="fab fa-facebook-square"></a>
                                    <a href="#" class="fab fa-twitter"></a>
                                    <a href="#" class="fab fa-pinterest-p"></a>
                                    <a href="#" class="fab fa-instagram"></a>
                                </div>
                                <!-- /.topbar__social -->
                            </div>
                            <!-- /.footer-widget -->
                        </div>
                        <!-- /.col-sm-12 col-md-6 col-lg-4 -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-2">
                            <div class="footer-widget footer-widget__links-widget">
                                <h3 class="footer-widget__title">Links</h3>
                                <!-- /.footer-widget__title -->
                                <ul class="list-unstyled footer-widget__links">
                                    <li><a href="#">Our Projects</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Our Services</a></li>
                                    <li><a href="#">Contact us</a></li>
                                </ul>
                                <!-- /.list-unstyled -->
                            </div>
                            <!-- /.footer-widget -->
                        </div>
                        <!-- /.col-sm-12 col-md-6 col-lg-2 -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                        </div>
                        <!-- /.col-sm-12 col-md-6 col-lg-3 -->
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                            <h3 class="footer-widget__title">Contact</h3>
                            <!-- /.footer-widget__title -->
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
                                    <a href="#">80 broklyn golden street line New York, USA</a>
                                </li>
                            </ul>
                            <!-- /.list-unstyled -->
                        </div>
                        <!-- /.col-sm-12 col-md-6 col-lg-3 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </footer>
            <!-- /.site-footer -->
            <div class="bottom-footer">
                <div class="container">
                    <p>© Copyright 2020 by Company.com</p>
                    <div class="bottom-footer__links">
                        <a href="#">Terms & Conditions</a>
                        <a href="#">Privacy Policy</a>
                        <a href="#">Sitemap</a>
                    </div>
                    <!-- /.bottom-footer__links -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.bottom-footer -->
        </div>
        <!-- /.page-wrapper -->

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
                </ul>
                <!-- /.mobile-nav__contact -->
                <div class="mobile-nav__top">
                    <div class="mobile-nav__language">
                        <img src="frontAssets/images/resources/flag-1-1.jpg" alt="" />
                        <label class="sr-only" for="language-select">select language</label>
                        <!-- /#language-select.sr-only -->
                        <select class="selectpicker" id="language-select">
                            <option value="english">English</option>
                            <option value="arabic">Arabic</option>
                        </select>
                    </div>
                    <!-- /.mobile-nav__language -->
                    <div class="mobile-nav__social">
                        <a href="#" aria-label="twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="facebook"><i class="fab fa-facebook-square"></i></a>
                        <a href="#" aria-label="pinterest"><i class="fab fa-pinterest-p"></i></a>
                        <a href="#" aria-label="instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                    <!-- /.mobile-nav__social -->
                </div>
                <!-- /.mobile-nav__top -->
            </div>
            <!-- /.mobile-nav__content -->
        </div>
        <!-- /.mobile-nav__wrapper -->

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
