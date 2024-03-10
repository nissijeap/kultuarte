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

        <h2>About Us</h2>
        <ol>
          <li><a href="{{url('/')}}">Home</a></li>
          <li>About Us</li>
        </ol>

      </div>
    </div>
    <!-- End Breadcrumbs -->

    <section>
      <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="d-md-flex post-entry-2 half">
                <a href="#" class="me-4 thumbnail">
                    <img src="{{url('guest/assets/img/about/about-1.jpg')}}" class="img-fluid">
                </a>
                <div class="ps-md-5 mt-4 mt-md-0">
                    <div class="post-meta mt-4">About us</div>
                    <h2 class="mb-4 display-4">KultuArte</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
                    <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
                </div>
            </div>

          <div class="d-md-flex post-entry-2 half mt-5">
                <a href="#" class="me-4 thumbnail order-2">
                    <img src="{{url('guest/assets/img/about/about-2.jpg')}}" class="img-fluid">
                </a>
                <div class="pe-md-5 mt-4 mt-md-0">
                    <div class="post-meta mt-4">Goal</div>
                    <h2 class="mb-4 display-4">Goal</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis, perspiciatis repellat maxime, adipisci non ipsam at itaque rerum vitae, necessitatibus nulla animi expedita cumque provident inventore? Voluptatum in tempora earum deleniti, culpa odit veniam, ea reiciendis sunt ullam temporibus aut!</p>
                    <p>Fugit eaque illum blanditiis, quo exercitationem maiores autem laudantium unde excepturi dolores quasi eos vero harum ipsa quam laborum illo aut facere voluptates aliquam adipisci sapiente beatae ullam. Tempora culpa iusto illum accusantium cum hic quisquam dolor placeat officiis eligendi.</p>
                </div>
            </div>
        </div>
      </div>
    </section>

    <section class="mb-5 bg-light py-5">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-between latest align-items-lg-center">
                <div class="col-lg-5 mb-4 mb-lg-0">
                    <h2 class="display-4 mb-4">Latest Events</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, rem eaque vel est asperiores iste pariatur placeat molestias, rerum provident ea maiores debitis eum earum esse quas architecto! Minima, voluptatum! Minus tempora distinctio quo sint est blanditiis voluptate eos. Commodi dolore nesciunt culpa adipisci nemo expedita suscipit autem dolorum rerum?</p>
                    <p>At magni dolore ullam odio sapiente ipsam, numquam eius minus animi inventore alias quam fugit corrupti error iste laboriosam dolorum culpa doloremque eligendi repellat iusto vel impedit odit cum. Sequi atque molestias nesciunt rem eum pariatur quibusdam deleniti saepe eius maiores porro quam, praesentium ipsa deserunt laboriosam adipisci. Optio, animi!</p>
                    <p><a href="{{url('/events')}}" class="more">View All Event Posts</a></p>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                    <div class="col-6">
                        <img src="{{url('guest/assets/img/about/about-3.jpg')}}" class="img-fluid mb-4">
                    </div>
                    <div class="col-6 mt-4">
                        <img src="{{url('guest/assets/img/about/about-4.jpg')}}" class="img-fluid mb-4">
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ======= Our Team Section ======= -->
    <div id="team" class="team mb-5 pt-5 pb-5 mt-5">
      <div class="container">

        <div class="section-header">
            <h2>team</h2>
            <p>Meet Our <span>Team</span></p>
        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="{{url('guest/assets/img/profile/tina.jpg')}}">
              <h4>Christina Mae Gerzon</h4>
              <span>Full Stack Developer</span>
              <p>
                Magni qui quod omnis unde et eos fuga et exercitationem. Odio veritatis perspiciatis quaerat qui
              </p>
              <div class="social-about">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="{{url('guest/assets/img/profile/nissi.jpg')}}" alt="">
              <h4>Nissi Jea Paglinawan</h4>
              <span>Full Stack Developer</span>
              <p>
                Voluptas necessitatibus occaecati quia. Earum totam consequuntur qui porro et laborum toro des clara
              </p>
              <div class="social-about">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member">
              <img src="{{url('guest/assets/img/profile/sophia.jpg')}}">
              <h4>Sophia Jade Esclares</h4>
              <span>Full Stack Developer</span>
              <p>
                Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus. In architecto rerum rerum temporibus
              </p>
              <div class="social-about">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- End Our Team Section -->
</main>

@endsection

