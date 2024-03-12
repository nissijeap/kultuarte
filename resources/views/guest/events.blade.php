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
                <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
                <li><a class="nav-link scrollto active" href="{{url('about')}}">About Us</a></li>
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

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('guest/assets/img/hero-bg.jpg');">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

        <h2>General Events</h2>
        <ol>
          <li><a href="{{url('/about')}}">About Us</a></li>
          <li>General Events</li>
        </ol>

      </div>
    </div>
    <!-- End Breadcrumbs -->

    <section>
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Nesciunt accusantium fuga magni consequuntur nulla!
                    Omnis dolorem sint consequuntur quis cupiditate, fugiat
                    delectus repellat sequi ullam corrupti ipsam. Dolores,
                    doloribus maxime illo tempore vitae neque, labore atque iure
                    tenetur modi aspernatur nisi, nihil obcaecati commodi.
                    Iste expedita consequuntur quibusdam dolorem! Libero.
                </p>
            </div>

            <!-- Blog Section - Blog Page -->
            <div id="blog" class="blog">

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4 posts-list">

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-2.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Annual Events</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-1.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-1.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Public Installation</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-2.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-3.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Upcoming Events</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-3.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-4.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Upcoming Events</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-4.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-5.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Cultural Events</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-5.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>

                        <div class="col-xl-4 col-lg-6">
                            <article>
                                <div class="post-img">
                                    <img src="{{url('guest/assets/img/events/gen-events/blog-6.jpg')}}" class="img-fluid">
                                </div>

                                <p class="post-category">Cultural Events</p>

                                <h2 class="title">
                                <a href="">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>

                                <div class="d-flex align-items-center">
                                    <img src="{{url('guest/assets/img/events/authors/author-6.jpg')}}" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                        <p class="post-author">Maria Doe</p>
                                        <p class="post-date">
                                            <time datetime="2022-01-01">Jan 1, 2022</time>
                                        </p>
                                    </div>
                                </div>

                            </article>
                        </div>
                        <!-- End post list item -->
                    </div>
                </div>
            </div>
            <!-- End Blog Section -->
      </div>
    </section>
</main>

@endsection

