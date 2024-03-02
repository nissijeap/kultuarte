@extends('guest.layouts.app')

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex justify-content-between align-items-center">

      <div id="logo">
        <a href=""><img src="{{url('guest/assets/img/logo-header.png')}}"></a>
      </div>

      <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto" href="{{url('/')}}">Home</a></li>
            <li><a class="nav-link scrollto  active" href="{{url('about')}}">About Us</a></li>
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
                    <img src="{{url('guest/assets/img/about/about-1.1.jpg')}}" class="img-fluid">
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
                    <img src="{{url('guest/assets/img/about/about-2.1.jpg')}}" class="img-fluid">
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
                    <p><a href="#" class="more">View All Event Posts</a></p>
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

    <!-- =======Team Section ======= -->
    <section class="section-agents">
        <div class="container">

            <div class="section-header">
                <h2>Team</h2>
                <p>Meet Our <span>Team</span></p>
            </div>

            <div class="row">

                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{url('guest/assets/img/profile/tina.jpg')}}" class="img-fluid">
                        </div>

                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h4 class="title-d">
                                        <div class="link-two">
                                            Christina Mae<br> Gerzon
                                        </div>
                                    </h4>
                                </div>
                            </div>

                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{url('guest/assets/img/profile/sophia.jpg')}}" class="img-fluid">
                        </div>

                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h4 class="title-d">
                                        <div class="link-two">
                                            Sophia Jade<br> Esclares
                                        </div>
                                    </h4>
                                </div>
                            </div>

                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card-box-d">
                        <div class="card-img-d">
                            <img src="{{url('guest/assets/img/profile/nissi.jpg')}}" class="img-fluid">
                        </div>

                        <div class="card-overlay card-overlay-hover">
                            <div class="card-header-d">
                                <div class="card-title-d align-self-center">
                                    <h4 class="title-d">
                                        <div class="link-two">
                                            Nissi Jea<br> Paglinawan
                                        </div>
                                    </h4>
                                </div>
                            </div>

                            <div class="card-footer-d">
                                <div class="socials-footer d-flex justify-content-center">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-facebook" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-twitter" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-instagram" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="#" class="link-one">
                                                <i class="bi bi-linkedin" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

