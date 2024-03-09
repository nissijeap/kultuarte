@extends('guest.general_layouts.app')

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
            </ul>
      </nav>
      <!-- .navbar -->

      <a href="{{ route('login') }}" class="btn-get-login">Sign In</a>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </div>
</header>
<!-- End Header -->


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
        <section id="blog" class="blog">

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row gy-4 posts-list">

    <div class="col-xl-4 col-lg-6">
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
    </div><!-- End post list item -->

    <div class="col-xl-4 col-lg-6">
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
    </div><!-- End post list item -->

    <div class="col-xl-4 col-lg-6">
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
    </div><!-- End post list item -->

    <div class="col-xl-4 col-lg-6">
      <article>

        <div class="post-img">
          <img src="assets/img/blog/blog-4.jpg" alt="" class="img-fluid">
        </div>

        <p class="post-category">Sports</p>

        <h2 class="title">
          <a href="blog-details.html">Non rem rerum nam cum quo minus olor distincti</a>
        </h2>

        <div class="d-flex align-items-center">
          <img src="assets/img/blog/blog-author-4.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
          <div class="post-meta">
            <p class="post-author">Lisa Neymar</p>
            <p class="post-date">
              <time datetime="2022-01-01">Jun 30, 2022</time>
            </p>
          </div>
        </div>

      </article>
    </div><!-- End post list item -->

    <div class="col-xl-4 col-lg-6">
      <article>

        <div class="post-img">
          <img src="assets/img/blog/blog-5.jpg" alt="" class="img-fluid">
        </div>

        <p class="post-category">Politics</p>

        <h2 class="title">
          <a href="blog-details.html">Accusamus quaerat aliquam qui debitis facilis consequatur</a>
        </h2>

        <div class="d-flex align-items-center">
          <img src="assets/img/blog/blog-author-5.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
          <div class="post-meta">
            <p class="post-author">Denis Peterson</p>
            <p class="post-date">
              <time datetime="2022-01-01">Jan 30, 2022</time>
            </p>
          </div>
        </div>

      </article>
    </div><!-- End post list item -->

    <div class="col-xl-4 col-lg-6">
      <article>

        <div class="post-img">
          <img src="assets/img/blog/blog-6.jpg" alt="" class="img-fluid">
        </div>

        <p class="post-category">Entertainment</p>

        <h2 class="title">
          <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
        </h2>

        <div class="d-flex align-items-center">
          <img src="assets/img/blog/blog-author-6.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
          <div class="post-meta">
            <p class="post-author">Mika Lendon</p>
            <p class="post-date">
              <time datetime="2022-01-01">Feb 14, 2022</time>
            </p>
          </div>
        </div>

      </article>
    </div><!-- End post list item -->

  </div><!-- End blog posts list -->

</div>

</section>
<!-- End Blog Section -->


      </div>
    </section>
</main>

@endsection

