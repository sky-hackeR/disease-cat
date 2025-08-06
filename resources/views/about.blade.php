@extends('layouts.app')

@section('content')


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


        <section class="team-one">
            <img src="frontAssets/images/icons/team-bg-1-1.png" alt="" class="team-one__bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-5">
                        <div class="team-one__content">
                            <div class="block-title">
                                <div class="block-title__image"></div><!-- /.block-title__image -->
                                <p>meet the team</p>
                                <h3>Expert Farmers</h3>
                            </div><!-- /.block-title -->
                            <div class="team-one__summery">
                                <p>Lorem ipsum is simply free text available. Aenean eu leo quam. Pellentesque ornare sem
                                    lacinia quam venenatis vestibulum. Aenean lacinia bibendum.</p>
                            </div><!-- /.team-one__summery -->

                            <!-- If we need navigation buttons -->
                            <div class="team-one__nav">
                                <div class="swiper-button-prev" id="team-one__swiper-button-next"><i class="agrikon-icon-left-arrow"></i>
                                </div>
                                <div class="swiper-button-next" id="team-one__swiper-button-prev"><i class="agrikon-icon-right-arrow"></i></div>
                            </div><!-- /.team-one__nav -->

                        </div><!-- /.team-one__content -->
                    </div><!-- /.col-md-12 col-lg-5 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="team-one__carousel-wrap">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 0, "slidesPerView": 1, "slidesPerGroup": 1, "autoplay": { "delay": 5000 }, "navigation": {
            "nextEl": "#team-one__swiper-button-next",
            "prevEl": "#team-one__swiper-button-prev"
        },"breakpoints": {
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
                "slidesPerView": 3,
                "slidesPerGroup": 3
            },
            "1200": {
                "spaceBetween": 30,
                "slidesPerView": 3,
                "slidesPerGroup": 3
            }
        }}'>

                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-1.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-2.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-3.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-1.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-2.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <div class="team-card">
                                <div class="team-card__image">
                                    <img src="frontAssets/images/team/team-1-3.jpg" alt="Jessica Brown">
                                    <div class="team-card__social">
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </div><!-- /.team-card__social -->
                                </div><!-- /.team-card__image -->
                                <h3>Jessica Brown</h3>
                                <p>Farmer</p>
                            </div><!-- /.team-card -->
                        </div><!-- /.swiper-slide -->
                    </div><!-- /.swiper-wrapper -->

                </div><!-- /.thm-swiper__slider -->
            </div><!-- /.team-one__carousel-wrap -->
        </section><!-- /.team-one -->

        



        <section class="about-three">
            <div class="container">
                <div class="row">
                    <!-- Left Column: Image -->
                    <div class="col-lg-6">
                        <div class="about-three__image">
                            <img src="{{ $about->image ?? 'assets/images/resources/about-3-2.jpg' }}" alt="{{ $about->title ?? 'About Image' }}">
                        </div>
                    </div><!-- /.col-lg-6 -->

                    <!-- Right Column: Content -->
                    <div class="col-lg-6">
                        <div class="about-three__content">
                            <div class="block-title">
                                <div class="block-title__image"></div><!-- /.block-title__image -->
                                <p>Get to know us</p>
                                <h3>{{ $about->title ?? 'Your Title Here' }}</h3>
                            </div><!-- /.block-title -->

                            <ul class="about-three__list list-unstyled">
                                @if(!empty($about->values))
                                    @foreach(explode(',', $about->values) as $value)
                                        <li>
                                            <i class="fa fa-check-circle"></i>
                                            {{ strip_tags(trim($value)) }}
                                        </li>
                                    @endforeach
                                @else
                                    <li><i class="fa fa-check-circle"></i> Sample Value 1</li>
                                    <li><i class="fa fa-check-circle"></i> Sample Value 2</li>
                                @endif
                            </ul><!-- /.about-three__list -->

                            <div class="about-three__summery">
                                <p>{!! $about->description ?? 'Your description will appear here...' !!}</p>
                            </div><!-- /.about-three__summery -->
                        </div><!-- /.about-three__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.about-three -->



        <section class="call-to-action jarallax" data-jarallax data-speed="0.3" data-imgPosition="-80% 50%">
            <img class="call-to-action__bg jarallax-img" src="frontAssets/images/backgrounds/cta-1-bg-1.jpg" alt="parallax-image" />
            <!-- /.call-to-action__bg -->
            <div class="container">
                <div class="call-to-action__content">
                    <i class="call-to-action__icon agrikon-icon-agriculture-2"></i>
                    <h3>We’re popular leader in agriculture
                        market globally</h3>
                </div><!-- /.call-to-action__content -->
                <div class="call-to-action__button">
                    <a href="services.html" class="thm-btn">Discover More</a><!-- /.thm-btn -->
                </div><!-- /.call-to-action__button -->
            </div><!-- /.container -->
        </section><!-- /.call-to-action -->


        <section class="call-to-action jarallax" style="position:relative; overflow:hidden; height:450px;">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5096.315059802924!2d5.191263499517209!3d8.150691896060557!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104823688f86f64d%3A0xa78475c8d2cee85c!2sThomas%20Adewumi%20University!5e1!3m2!1sen!2sng!4v1754409271763!5m2!1sen!2sng"
                style="position:absolute; top:0; left:0; width:100%; height:99%; border:0;"
                allowfullscreen="" 
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </section>



    </section><!-- /.service-one service-one__about -->

@endsection