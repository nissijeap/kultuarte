@extends('guest.layouts.app')

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href=""><img src="{{url('guest/assets/img/logo-header.png')}}"></a>
        <!-- Uncomment below if you prefer to use a text logo -->
        <!--<h1><a href="index.html">Regna</a></h1>-->
      </div>

      <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
            <li><a class="nav-link scrollto" href="{{url('about')}}">About Us</a></li>
            <li class="dropdown"><a href="#"><span>Arts</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#">Public Installation</a></li>
                <li><a href="#">Visual Artworks</a></li>
                <li><a href="#">Visual Artists</a></li>
                <li><a href="#">Upcoming Events</a></li>
                <li><a href="#">Organizations</a></li>
                </ul>
            </li>
            <li class="dropdown"><a href="#"><span>Culture</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                <li><a href="#">People</a></li>
                <li><a href="#">Places</a></li>
                <li><a href="#">Cultural Events</a></li>
                <li><a href="#">Annual Events</a></li>
                </ul>
            </li>
            <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
            </ul>
      </nav>
      <!-- .navbar -->

      <a href="{{ route('login') }}" class="btn-get-login">Sign In</a>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </div>
</header>
<!-- End Header -->

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome</h1>

      <p>
        Discover the fusion of visual arts and culture.<br>
        Your ultimate guide to Iligan City's hidden gems.
      </p>

      <div class="buttons">
        <a href="#event" class="btn-get-started">Explore Now!</a>
        <a href="{{ route('login') }}" class="btn-get-signin">Sign In</a>
      </div>

    </div>
</section>
<!-- End Hero Section -->

<main id="main">
    <!-- ======= About Section ======= -->
    <section id="event">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Major Events</h2>
                <p>Embrace the Vibrant Spirit of <span>Iligan</span></p>
            </div>

            <div class="row">
                <div class="col-12" data-bs-ride="carousel" data-bs-interval="5000">
                    <div class="swiper sliderFeaturedPosts">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end" style="background-image: url('guest/assets/img/events/major-event-1.jpg');">
                                    <div class="img-bg-inner">
                                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Quidem neque est mollitia! Beatae minima assumenda repellat harum vero,
                                            officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end" style="background-image: url('guest/assets/img/events/major-event-3.webp');">
                                    <div class="img-bg-inner">
                                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Quidem neque est mollitia! Beatae minima assumenda repellat harum vero,
                                            officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end" style="background-image: url('guest/assets/img/events/major-event-7.jpg');">
                                    <div class="img-bg-inner">
                                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Quidem neque est mollitia! Beatae minima assumenda repellat harum vero,
                                            officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end" style="background-image: url('guest/assets/img/events/major-event-6.jpg');">
                                    <div class="img-bg-inner">
                                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Quidem neque est mollitia! Beatae minima assumenda repellat harum vero,
                                            officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.
                                        </p>
                                    </div>
                                </a>
                            </div>

                            <div class="swiper-slide">
                                <a href="" class="img-bg d-flex align-items-end" style="background-image: url('guest/assets/img/events/major-event-4.jpg');">
                                    <div class="img-bg-inner">
                                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Quidem neque est mollitia! Beatae minima assumenda repellat harum vero,
                                            officiis ipsam magnam obcaecati cumque maxime inventore repudiandae quidem
                                            necessitatibus rem atque.
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End About Section -->
</main>

@endsection

