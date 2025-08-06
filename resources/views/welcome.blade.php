@extends('layouts.app')

@section('content')


    <section class="main-slider">
        <div class="swiper-container thm-swiper__slider"
            data-swiper-options='{
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
            <div class="swiper-wrapper">
                @foreach ($swipers as $swiper) @php $words = explode(' ', $swiper->title); $first = $words[0] ?? ''; $rest = implode(' ', array_slice($words, 1)); @endphp
                <div class="swiper-slide">
                    {{--
                    <div class="image-layer" style="background-image: url('{{ $swiper->image }}');"></div>
                    --}}
                    <div
                        class="image-layer"
                        style="
                        background-image: url('{{ $swiper->image }}');
                        height: 1000px;
                        background-size: cover;
                        background-position: center;
                        background-repeat: no-repeat;
                    "
                    ></div>

                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7 col-lg-7">
                                <span class="tagline">Welcome to {{ $pageGlobalData->setting->site_name ?? 'AgriC' }}</span>
                                <h2>
                                    <span>{{ $first }}</span><br />
                                    {{ $rest }}
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
                <div class="swiper-button-prev" id="main-slider__swiper-button-next"><i class="agrikon-icon-left-arrow"></i></div>
                <div class="swiper-button-next" id="main-slider__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
            </div>
            <!-- /.main-slider__nav -->
        </div>
        <!-- /.swiper-container thm-swiper__slider -->
    </section>
    <!-- /.main-slider -->

    <section class="service-one">
        <div class="container">
            <div class="row">
                @foreach ($services as $service)
                    <div class="col-md-12 col-lg-4 wow fadeInUp" data-wow-duration="1500ms">
                        <div class="service-one__box">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" style="width: 100%; height: 220px; object-fit: cover;" />
                            <div class="service-one__box-content">
                                <h3>
                                    <a href="{{ route('viewService', ['slug' => $service->slug]) }}">
                                        {{ $service->title }}
                                    </a>
                                </h3>
                            </div>
                            <!-- /.service-one__box-content -->
                        </div>
                        <!-- /.service-one__box -->
                    </div>
                @endforeach
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.service-one -->


    <section class="about-one">
        <img src="frontAssets/images/icons/about-bg-icon-1-1.png" class="about-one__bg-shape-1" alt="" />
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-one__images">
                        <img src="frontAssets/images/resources/about-1-1.jpg" alt="" />
                        <img src="frontAssets/images/resources/about-1-2.jpg" alt="" />
                        <div class="about-one__count wow fadeInLeft" data-wow-duration="1500ms">
                            <span>Trusted by</span>
                            <h4>8900</h4>
                        </div>
                        <!-- /.about-one__count -->
                    </div>
                    <!-- /.about-one__images -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-7">
                    <div class="about-one__content">
                        <div class="block-title text-left">
                            <div class="block-title__image"></div>
                            <!-- /.block-title__image -->
                            <p>Welcome to agricon</p>
                            <h3>Better Agriculture for Better Future</h3>
                        </div>
                        <!-- /.block-title -->
                        <div class="about-one__tagline">
                            <p>We have 30 years of agriculture & eco farming experience globaly</p>
                        </div>
                        <!-- /.about-one__tagline -->
                        <div class="about-one__summery">
                            <p>There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form by injected humor or random word which don't look even.</p>
                        </div>
                        <!-- /.about-one__summery -->
                        <div class="about-one__icon-row">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="about-one__box">
                                        <i class="agrikon-icon-farmer"></i>
                                        <h4><a href="about.html">Professional Farmers</a></h4>
                                    </div>
                                    <!-- /.about-one__box -->
                                </div>
                                <!-- /.col-lg-6 -->
                                <div class="col-lg-6">
                                    <div class="about-one__box">
                                        <i class="agrikon-icon-agriculture"></i>
                                        <h4><a href="services.html">Organic & Eco Solutions</a></h4>
                                    </div>
                                    <!-- /.about-one__box -->
                                </div>
                                <!-- /.col-lg-6 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.about-one__icon-row -->
                        <a href="about.html" class="thm-btn">Discover More</a>
                        <!-- /.thm-btn -->
                    </div>
                    <!-- /.about-one__content -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.about-one -->

    <section class="service-two">
        <div class="service-two__bottom-curv"></div>
        <!-- /.service-two__bottom-curv -->
        <div class="container">
            <div class="block-title text-center">
                <div class="block-title__image"></div>
                <!-- /.block-title__image -->
                <p>Our Services list</p>
                <h3>What We’re Offering</h3>
            </div>
            <!-- /.block-title -->
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service-two__card">
                        <div class="service-two__card-image">
                            <img src="frontAssets/images/services/service-2-1.jpg" alt="" />
                        </div>
                        <!-- /.service-two__card-image -->
                        <div class="service-two__card-content">
                            <div class="service-two__card-icon">
                                <i class="agrikon-icon-tractor"></i>
                            </div>
                            <!-- /.service-two__card-icon -->
                            <h3><a href="service-details.html">Agriculture Products</a></h3>
                            <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                        </div>
                        <!-- /.service-two__card-content -->
                    </div>
                    <!-- /.service-two__card -->
                </div>
                <!-- /.col-sm-12 col-md-6 col-lg-3 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service-two__card">
                        <div class="service-two__card-image">
                            <img src="frontAssets/images/services/service-2-2.jpg" alt="" />
                        </div>
                        <!-- /.service-two__card-image -->
                        <div class="service-two__card-content">
                            <div class="service-two__card-icon">
                                <i class="agrikon-icon-organic-food"></i>
                            </div>
                            <!-- /.service-two__card-icon -->
                            <h3><a href="service-details.html">Oragnic Products</a></h3>
                            <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                        </div>
                        <!-- /.service-two__card-content -->
                    </div>
                    <!-- /.service-two__card -->
                </div>
                <!-- /.col-sm-12 col-md-6 col-lg-3 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service-two__card">
                        <div class="service-two__card-image">
                            <img src="frontAssets/images/services/service-2-3.jpg" alt="" />
                        </div>
                        <!-- /.service-two__card-image -->
                        <div class="service-two__card-content">
                            <div class="service-two__card-icon">
                                <i class="agrikon-icon-vegetable"></i>
                            </div>
                            <!-- /.service-two__card-icon -->
                            <h3><a href="service-details.html">Fresh Vegetables</a></h3>
                            <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                        </div>
                        <!-- /.service-two__card-content -->
                    </div>
                    <!-- /.service-two__card -->
                </div>
                <!-- /.col-sm-12 col-md-6 col-lg-3 -->
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="service-two__card">
                        <div class="service-two__card-image">
                            <img src="frontAssets/images/services/service-2-4.jpg" alt="" />
                        </div>
                        <!-- /.service-two__card-image -->
                        <div class="service-two__card-content">
                            <div class="service-two__card-icon">
                                <i class="agrikon-icon-dairy"></i>
                            </div>
                            <!-- /.service-two__card-icon -->
                            <h3><a href="service-details.html">Dairy Products</a></h3>
                            <p>Lorem ium dolor sit ametad pisicing elit sed simply do ut.</p>
                        </div>
                        <!-- /.service-two__card-content -->
                    </div>
                    <!-- /.service-two__card -->
                </div>
                <!-- /.col-sm-12 col-md-6 col-lg-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.service-two -->

    <section class="call-to-action__three jarallax" data-jarallax data-speed="0.3" data-imgPosition="50% 50%">
        <img class="call-to-action__three__bg jarallax-img" src="{{ $banners?->home_banner ?? asset('frontAssets/images/backgrounds/cta-1-bg-1.jpg') }}" alt="parallax-image" />
        <div class="container">
            <div class="row">
                <div class="col-lg-5 wow fadeInLeft" data-wow-duration="1500ms">
                    <div class="call-to-action__three-image">
                        <img src="frontAssets/images/resources/cta-3-1.jpg" alt="" />
                        <img src="frontAssets/images/resources/cta-3-2.jpg" alt="" />
                    </div>
                    <!-- /.call-to-action__three-image -->
                </div>
                <!-- /.col-lg-5 -->
                <div class="col-lg-7">
                    <div class="call-to-action__three-content">
                        <h3>Providing High Quality Products</h3>
                        <a href="about.html" class="thm-btn">Discover More</a>
                        <!-- /.thm-btn -->
                    </div>
                    <!-- /.call-to-action__three-content -->
                </div>
                <!-- /.col-lg-7 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.call-to-action__three -->

    <section class="testimonials-one">
        <img src="frontAssets/images/icons/testimonials-bg-1-1.png" class="testimonials-one__bg" alt="" />
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
                        </div>
                        <!-- /.testimonials-one__icons -->
                        <p>
                            This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                            reprehenderit in esse nulla pariatur.
                        </p>
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__icons">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <!-- /.testimonials-one__icons -->
                        <p>
                            This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                            reprehenderit in esse nulla pariatur.
                        </p>
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__icons">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <!-- /.testimonials-one__icons -->
                        <p>
                            This is due to their excellent service, competitive pricing and customer support. It’s throughly refresing to get such a personal touch. Duis aute lorem ipsum is simply free text irure dolor in
                            reprehenderit in esse nulla pariatur.
                        </p>
                    </div>
                    <!-- /.swiper-slide -->
                </div>
                <!-- /.swiper-wrapper -->
            </div>
            <!-- /#testimonials-one__carousel -->

            <div id="testimonials-one__thumb" class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonials-one__image">
                            <img src="frontAssets/images/resources/testimonials-1-1.jpg" alt="" />
                        </div>
                        <!-- /.testimonials-one__image -->
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__image">
                            <img src="frontAssets/images/resources/testimonials-1-2.jpg" alt="" />
                        </div>
                        <!-- /.testimonials-one__image -->
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__image">
                            <img src="frontAssets/images/resources/testimonials-1-3.jpg" alt="" />
                        </div>
                        <!-- /.testimonials-one__image -->
                    </div>
                    <!-- /.swiper-slide -->
                </div>
                <!-- /.swiper-wrapper -->
            </div>
            <!-- /#testimonials-one__thumb.swiper-container -->

            <div id="testimonials-one__meta" class="testimonials-one__carousel swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonials-one__meta">
                            <h4>Jessica Brown</h4>
                            <span>Customer</span>
                        </div>
                        <!-- /.testimonials-one__meta -->
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__meta">
                            <h4>Caleb Hoffman</h4>
                            <span>Customer</span>
                        </div>
                        <!-- /.testimonials-one__meta -->
                    </div>
                    <!-- /.swiper-slide -->
                    <div class="swiper-slide">
                        <div class="testimonials-one__meta">
                            <h4>Bradley Kim</h4>
                            <span>Customer</span>
                        </div>
                        <!-- /.testimonials-one__meta -->
                    </div>
                    <!-- /.swiper-slide -->
                </div>
                <!-- /.swiper-wrapper -->
            </div>
            <!-- /#testimonials-one__meta.swiper-container -->
            <div class="swiper-pagination" id="testimonials-one__swiper-pagination"></div>
        </div>
        <!-- /.container -->
    </section>
    <!-- /.testimonials-one -->


    <section class="contact-two">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-5">
                    <div class="contact-two__image">
                        <div class="contact-two__image-bubble-1"></div>
                        <!-- /.contact-two__image-bubble-1 -->
                        <div class="contact-two__image-bubble-2"></div>
                        <!-- /.contact-two__image-bubble-2 -->
                        <div class="contact-two__image-bubble-3"></div>
                        <!-- /.contact-two__image-bubble-3 -->
                        <img src="frontAssets/images/resources/contact-1-1.jpg" class="img-fluid" alt="" />
                    </div>
                    <!-- /.contact-two__image -->
                </div>
                <!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-5 -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                    <div class="contact-two__content">
                        <div class="block-title">
                            <div class="block-title__image"></div>
                            <!-- /.block-title__image -->
                            <p>Contact now</p>
                            <h3>Leave Us A Message</h3>
                        </div>
                        <!-- /.block-title -->
                        <div class="contact-two__summery">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur notted adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua lonm andhn. Aenean tincidunt id mauris id auctor. Donec at ligula
                                lacus dignissim mi quis simply neque.
                            </p>
                        </div>
                        <!-- /.contact-two__summery -->
                    </div>
                    <!-- /.contact-two__content -->
                </div>
                <!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
                    <form action="https://ninetheme.com/themes/html-templates/agrikon/assets/inc/sendemail.php" class="contact-one__form contact-form-validated">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="name" placeholder="Full Name" />
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-12">
                                <input type="text" name="email" placeholder="Email Address" />
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-12">
                                <input type="text" name="phone" placeholder="Phone Number" />
                            </div>
                            <!-- /.col-lg-6 -->
                            <div class="col-lg-12">
                                <textarea name="message" placeholder="Write Message"></textarea>
                            </div>
                            <!-- /.col-lg-12 -->
                            <div class="col-lg-12">
                                <button type="submit" class="thm-btn">Send Message</button>
                                <!-- /.thm-btn -->
                            </div>
                            <!-- /.col-lg-12 -->
                        </div>
                        <!-- /.row -->
                    </form>
                </div>
                <!-- /.col-sm-12 col-md-12 col-lg-12 col-xl-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.contact-two -->


@endsection