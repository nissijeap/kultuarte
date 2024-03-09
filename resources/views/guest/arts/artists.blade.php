@extends('guest.sublayout.app')


@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Visual Artists</h2>
            <ol>
            <li><a href="">Arts</a></li>
            <li>Visual Artists</li>
            </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Works Section ======= -->
    <section class="section site-portfolio">
        <div class="container">

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

            <!-- Gallery -->
            <div id="portfolio-grid" class="row no-gutter" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <div class="item web">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Abdulmari Imao</h3>
                                <span>Filipino Painter & Sculptor</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/imao.jpg')}}" class="w-100 shadow-1-strong rounded mb-4" />
                        </a>
                    </div>

                    <div class="item photography">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Lea Padilla</h3>
                                <span>NCCA-CVA Coordinator</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/padilla.jpg')}}" class="w-100 shadow-1-strong rounded mb-4" />
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="item branding">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Joel Hubahib</h3>
                                <span>IVA Founder</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/hubahib.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                    <div class="item design">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Chris Gomez</h3>
                                <span>AAP Member</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/gomez.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">

                    <div class="item photography">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Ivan Macarambon</h3>
                                <span>AAP Member</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/macarambon.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                    <div class="item branding">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Ike Kintanar</h3>
                                <span>Galeria de Iligan Artist</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artists/kintanar.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Gallery -->
        </div>
    </section>
    <!-- End  Works Section -->

</main>

@endsection

