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
    <!-- ======= Major Events Section ======= -->
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
    <!-- End Major Events Section -->

    <!-- Posts Section -->
    <div id="posts" class="posts">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="post-entry-1 lg">
                        <a href=""><img src="{{url('guest/assets/img/posts/culture/culture-3.jpg')}}" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Annual Events</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2><a href="">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                        <p class="mb-4 d-block">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae,
                            inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium,
                            similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto
                            rerum animi atque eveniet, quo, praesentium dignissimos
                        </p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{url('guest/assets/img/profile/tina.jpg')}}" class="img-fluid"></div>
                                <div class="name">
                                    <h3 class="m-0 p-0">Cameron Williamson</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/culture/culture-2.jpg')}}" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">People</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="">Let’s Get Back to Work, New York</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-1.jpg')}}" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Public Installation</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                                    <h2><a href="">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-2.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Visual Artwork</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                                    <h2><a href="">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                                </div>
                            </div>

                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/culture/culture-1.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Places</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-3.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Visual Artwork</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                                    <h2><a href="">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-4.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">People</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="">5 Great Startup Tips for Female Founders</a></h2>
                                </div>
                            </div>

                            <!-- Trending Section -->
                            <div class="col-lg-4">
                                <div class="trending">
                                    <h3>Trending</h3>
                                    <ul class="trending-post">
                                        <li>
                                            <a href="">
                                                <span class="number">1</span>
                                                <h3>The Best Homemade Masks for Face (keep the Pimples Away)</h3>
                                                <span class="author">Jane Cooper</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">2</span>
                                                <h3>17 Pictures of Medium Length Hair in Layers That Will Inspire Your New Haircut</h3>
                                                <span class="author">Wade Warren</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">3</span>
                                                <h3>13 Amazing Poems from Shel Silverstein with Valuable Life Lessons</h3>
                                                <span class="author">Esther Howard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">4</span>
                                                <h3>9 Half-up/half-down Hairstyles for Long and Medium Hair</h3>
                                                <span class="author">Cameron Williamson</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">5</span>
                                                <h3>Life Insurance And Pregnancy: A Working Mom’s Guide</h3>
                                                <span class="author">Jenny Wilson</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Trending Section -->
                        </div>
                    </div>
                </div> <!-- End .row -->
            </div>
    </div>
    <!-- End Posts Section -->

    <!-- ======= Major Events Section ======= -->
    <section id="event">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Cultural Mapping</h2>
                <p>Connecting <span>Generations through the Roots</span> of Iligan's Culture</p>
            </div>

            <div class="row">
                
            </div>

        </div>
    </section>
    <!-- End Major Events Section -->


</main>

@endsection

