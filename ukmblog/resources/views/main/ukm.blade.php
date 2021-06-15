@extends('main.main_master')

@section('content')

<!-- ======= Breadcrumb ======= -->
  <section id="breadcrumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">UKM Apa Gitu</li>
      </ol>
    </nav>
  </section>

  <!-- ======= Profile UKM Section ======= -->
  <section id="profileUkm">
    <div class="container-profile">
      <div class="row ukm-profile-text">
        <div class="col-lg-6 col-12">
          <div class="row">
            <div class="ukm-profile-img">
              <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
            </div>
            <div class="ml-4 my-auto">
              <h4 class="text-uppercase font-weight-bold">UKM Apa Gitu</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 my-auto">
          <div class="mx-3">
            <h6 class="font-weight-bold">Deskripsi UKM</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Hero Section ======= -->
  <section id="heroUkm">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('frontend_template/assets/images/Screenshot376.png') }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Welcome to <span>Company</span></h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-more">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('frontend_template/assets/images/Screenshot378.png') }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Lorem Ipsum Dolor</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-more">Read More</a></div>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('frontend_template/assets/images/Screenshot379.png') }});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>Sequi ea ut et est quaerat</h2>
              <p>Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
              <div class="text-center"><a href="" class="btn-more">Read More</a></div>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->


    <div class="row section-bg-ukm">
      <!-- ======= Konten ======= -->
      <div class="col-lg-8 col-12 pl-0">

        <!-- ======= Post Terbaru Section ======= -->
        <section class="py-lg-5 pt-5">
          <div class="">

            <div class="section-title">
              <h4 class="font-weight-bold section-title-ukm-home">Post Terbaru</h4>
            </div>

            <div class="row mt-4 text-left">

              <div class="col-sm-6 col-lg-4 my-3">
                <a href="#">
                  <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
                </a>
                <span class="badge badge-custom my-3">Author</span>
                <small class="ml-2 text-dark">6 Juni 2021</small>
                <a href="#"><h5 class="judul-post">Artikel Satu</h5></a>
                <p class="desc-post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, nemo!</p>
              </div>
              <div class="col-sm-6 col-lg-4 my-3">
                <a href="#">
                  <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
                </a>
                <span class="badge badge-custom my-3">Author</span>
                <small class="ml-2 text-dark">6 Juni 2021</small>
                <a href="#"><h5 class="judul-post">Artikel Satu</h5></a>
                <p class="desc-post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, nemo!</p>
              </div>
              <div class="col-sm-6 col-lg-4 my-3">
                <a href="#">
                  <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
                </a>
                <span class="badge badge-custom my-3">Author</span>
                <small class="ml-2 text-dark">6 Juni 2021</small>
                <a href="#"><h5 class="judul-post">Artikel Satu</h5></a>
                <p class="desc-post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, nemo!</p>
              </div>
              <div class="col-sm-6 col-lg-4 my-3">
                <a href="#">
                  <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
                </a>
                <span class="badge badge-custom my-3">Author</span>
                <small class="ml-2 text-dark">6 Juni 2021</small>
                <a href="#"><h5 class="judul-post">Artikel Satu</h5></a>
                <p class="desc-post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, nemo!</p>
              </div>
              <div class="col-sm-6 col-lg-4 my-3">
                <a href="#">
                  <img src="{{ asset('frontend_template/assets/images/Screenshot376.png') }}" class="img-fluid" alt="">
                </a>
                <span class="badge badge-custom my-3">Author</span>
                <small class="ml-2 text-dark">6 Juni 2021</small>
                <a href="#"><h5 class="judul-post">Artikel Satu</h5></a>
                <p class="desc-post">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, nemo!</p>
              </div>

            </div>

          </div>
        </section><!-- End Post Terbaru Section -->
      </div> <!-- End Konten -->

      <!-- ======= Sidebar ======= -->
      @include('main.body.sidebar')

    </div>

@endsection
