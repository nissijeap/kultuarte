@extends('guest.general_layouts.app')

<!-- head starts here -->
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KultuArte</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{url('guest/assets/img/logo.png')}}" rel="icon">
  <link href="{{url('guest/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('guest/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('guest/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('guest/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('guest/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('guest/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('guest/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('guest/assets/css/guest.css')}}" rel="stylesheet">
</head>
<!-- head ends here -->

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href="{{url('/')}}"><img src="{{url('guest/assets/img/logo-header.png')}}"></a>
      </div>

      <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto" href="{{url('about')}}">About Us</a></li>
                <li class="dropdown"><a href="#"><span>Arts</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{url('art/installations')}}">Public Installation</a></li>
                        <li><a href="{{url('art/artworks')}}">Visual Artworks</a></li>
                        <li><a href="{{url('art/artists')}}">Visual Artists</a></li>
                        <li><a href="{{url('art/events')}}">Upcoming Events</a></li>
                        <li><a href="{{url('art/organizations')}}">Organizations</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Culture</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                    <li><a href="{{url('culture/people')}}">People</a></li>
                    <li><a href="{{url('culture/places')}}">Places</a></li>
                    <li><a href="{{url('culture/cultural_events')}}">Cultural Events</a></li>
                    <li><a href="{{url('culture/annual_events')}}">Annual Events</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="{{url('contact')}}">Contact Us</a></li>
                <li><a href="{{ route('login') }}" class="nav-link scrollto link-login">Sign In</a></li>
            </ul>

      </nav>
      <!-- .navbar -->

      <a href="{{ route('login') }}" class="btn-get-login">Sign In</a>
      <i class="bx bxs-grid-alt mobile-nav-toggle"></i>

    </div>
</header
><!-- End Header -->


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
    <div id="posts" class="posts mb-5">
        <div class="container" data-aos="fade-up">
            <div class="row g-5">
                <div class="col-lg-4">
                    <div class="post-entry-1 lg">
                        <a href=""><img src="{{url('guest/assets/img/posts/culture/culture-3.jpg')}}" class="img-fluid"></a>
                        <div class="post-meta"><span class="date">Annual Events</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h2><a href="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</a></h2>
                        <p class="mb-4 d-block">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae,
                            inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium,
                            similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto
                            rerum animi atque eveniet, quo, praesentium dignissimos
                        </p>

                        <div class="d-flex align-items-center author">
                            <div class="photo"><img src="{{url('guest/assets/img/events/authors/author-6.jpg')}}" class="img-fluid"></div>
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
                                    <h2><a href="">Lorem ipsum dolor sit amet.</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-1.jpg')}}" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Public Installation</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                                    <h2><a href="">Lorem ipsum dolor sit amet consectetur.</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-2.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Visual Artwork</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                                    <h2><a href="">Lorem ipsum dolor sit amet consectetur, adipisicing elit.</a></h2>
                                </div>
                            </div>

                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/culture/culture-1.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Places</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="">Lorem ipsum dolor sit amet consectetur.</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-3.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Visual Artwork</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                                    <h2><a href="">Lorem ipsum dolor sit amet consectetur adipisicing elit.</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href=""><img src="{{url('guest/assets/img/posts/art/art-4.jpg')}}" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">People</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="">Lorem ipsum dolor sit amet consectetur adipisicing.</a></h2>
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
                                                <h3>Lorem ipsum dolor sit amet.</h3>
                                                <span class="author">Jane Cooper</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">2</span>
                                                <h3>Lorem ipsum dolor sit amet consectetur.</h3>
                                                <span class="author">Wade Warren</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">3</span>
                                                <h3>Lorem ipsum dolor, sit amet consectetur adipisicing.</h3>
                                                <span class="author">Esther Howard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">4</span>
                                                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                                                <span class="author">Cameron Williamson</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                <span class="number">5</span>
                                                <h3>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</h3>
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

    <!-- ======= Call To Action Section ======= -->
    <section class="call-to-action mt-3">
      <div class="container">

        <div class="text-center">
          <h3>Connect With Us</h3>
          <p> Your thoughts matter. Drop us a line through our <span style="color: #fcc309; font-weight: bolder;">Contact Us</span> portal.</p>
          <a class="cta-btn" href="{{url('contact')}}">Click Me</a>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Map Section ======= -->
    <section id="map">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>Cultural Mapping</h2>
                <p>Connecting <span>Generations through the Roots</span> of Iligan's Culture</p>
            </div>

            <div class="row">
                <iframe style="border:0; width: 100%; height: 500px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
            </div>

        </div>
    </section>
    <!-- End Map Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <div id="faq" class="faq mb-5 pb-3">
      <div class="container">
        <div class="section-header">
            <h2>FAQs</h2>
            <p>Elevate your <span>knowledge base</span> with our FAQs</p>
        </div>
            <ul class="faq-list">

            <li data-aos="fade-up">
                <a data-bs-toggle="collapse" class="collapsed" data-bs-target="#faq1">What is KultuArte? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                    KultuArte is a dynamic web platform dedicated to showcasing and promoting the rich cultural 
                    heritage and exceptional talents of Iligan City's local artists. It serves as a digital hub 
                    where users can explore diverse artistic expressions, engage with cultural events, and connect 
                    with the vibrant creative community of Iligan City.
                </p>
                </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="100">
                <a data-bs-toggle="collapse" data-bs-target="#faq2" class="collapsed">How can I use KultuArte? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                    KultuArte is designed to be user-friendly and intuitive. 
                    Simply visit our website and browse through the various sections to discover upcoming events, 
                    explore artist profiles, and engage with curated content. You can also create an account to 
                    personalize your experience, bookmark your favorite artists, and receive updates on the latest 
                    cultural happenings.
                </p>
                </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="200">
                <a data-bs-toggle="collapse" data-bs-target="#faq3" class="collapsed">What types of events are featured on KultuArte? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    KultuArte showcases a wide range of cultural and artistic events, including festivals, 
                    exhibitions, performances, workshops, and more. From traditional celebrations to 
                    contemporary showcases, there's something for everyone to enjoy on KultuArte.
                </p>
                </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="300">
                <a data-bs-toggle="collapse" data-bs-target="#faq4" class="collapsed">How can I get involved with KultuArte as an artist? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                <p>
                    If you're an artist based in Iligan City, we welcome you to join the KultuArte 
                    community! You can create a profile to showcase your work, share upcoming events or 
                    exhibitions, and connect with fellow artists and enthusiasts. KultuArte provides a 
                    platform for you to reach a wider audience and promote your creative endeavors.
                </p>
                </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="400">
                <a data-bs-toggle="collapse" data-bs-target="#faq5" class="collapsed">Is KultuArte accessible to non-artists? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq5" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Absolutely! KultuArte is designed for anyone who appreciates art and culture. Whether 
                    you're an avid art lover, a cultural enthusiast, or simply curious about the vibrant 
                    creative scene in Iligan City, you'll find plenty to explore and enjoy on our platform.
                </p>
                </div>
            </li>

            <li data-aos="fade-up" data-aos-delay="500">
                <a data-bs-toggle="collapse" data-bs-target="#faq6" class="collapsed">How can I stay updated on KultuArte's latest events and features? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-x icon-close"></i></a>
                <div id="faq6" class="collapse" data-bs-parent=".faq-list">
                <p>
                    To stay informed about the latest events, features, and updates on KultuArte, 
                    we recommend following us on social media. You can also check our website regularly 
                    for announcements and browse our calendar for upcoming events.
                </p>
                </div>
            </li>
            </ul>
      </div>
    </div>
    <!-- End Frequently Asked Questions Section -->

</main>

@endsection

