@extends('guest.sublayout.app')


@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>Visual Artworks</h2>
            <ol>
            <li><a href="">Arts</a></li>
            <li>Visual Artworks</li>
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
                                <h3>One Last Cry</h3>
                                <span>Chris Gomez</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-1.jpg')}}" class="w-100 shadow-1-strong rounded mb-4" />
                        </a>
                    </div>

                    <div class="item photography">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Kababaihang Pilipino</h3>
                                <span>Lea Padilla</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-2.jpg')}}" class="w-100 shadow-1-strong rounded mb-4" />
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">
                    <div class="item branding">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>The Factory</h3>
                                <span>Ivan Macarambon</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-3.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                    <div class="item design">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Paghihintay</h3>
                                <span>Ike & Beve Kintanar</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-4.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 mb-4 mb-lg-0">

                    <div class="item photography">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Marine Series</h3>
                                <span>Abdulmari Imao</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-5.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
                        </a>
                    </div>
                    <div class="item branding">
                        <a href="work-single.html" class="item-wrap rounded fancybox">
                            <div class="work-info">
                                <h3>Sarimanok Series IV</h3>
                                <span>Abdulmari Imao</span>
                            </div>
                            <img src="{{url('guest/assets/img/posts/art/artwork-6.jpg')}}" class="w-100 shadow-1-strong rounded mb-4"/>
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

