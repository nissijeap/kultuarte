@extends('guest.culture_layout.app')

@section('content')

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center">
      <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
            <h2>People</h2>
            <ol>
            <li><a href="">Culture</a></li>
            <li>People</li>
            </ol>
      </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- ======= Works Section ======= -->
    <section class="section site-portfolio">
        <div class="container"  data-aos="fade-up">

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

            <div class="row mt-3">
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
    <!-- End  Works Section -->

</main>

@endsection

