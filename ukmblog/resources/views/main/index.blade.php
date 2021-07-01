@extends('main.main_master')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
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

<!-- ======= UKM Section ======= -->
<section class="p-5">
    <div class="container-fluid text-center" data-aos="fade-up">
      <div class="section-title">
        <h3 class="font-weight-bold">UKM</h3>
      </div>
      <div class="row mt-5">

        @foreach($ukm_section as $row)
            <div class="col-sm-6 col-lg-3">
              <a href="#">
                <div class="container-img my-3">
                  <img src="{{ (!empty($row->image)) ? asset($row->image) : url('image/ukms/ukm_default.png') }}" class="ukm-image-rectangle" alt="">
                  <div class="content">
                    <h3 class="text-center">{{ $row->ukm_name }}</h3>
                    <p>Kunjungi <i class="fas fa-angle-right"></i></p>
                  </div>
                </div>
              </a>
            </div>
        @endforeach

      </div>
    </div>
  </section><!-- End UKM -->

  <!-- ======= Post Terbaru Section ======= -->
  <section class="p-5 section-bg">
    <div class="container-fluid text-center" data-aos="fade-up">

      <div class="section-title">
        <h3 class="font-weight-bold">Post Terbaru</h3>
      </div>

      <div class="row mt-5 text-left">

        @foreach($post_section as $row)
          <div class="col-sm-6 col-lg-3 my-3">
            <a href="#">
              <img src="{{ (!empty($row->image)) ? asset($row->image) : url('image/post/post_default.png') }}" class="ukm-image-rectangle" alt="">
            </a>
            <a href="#" class="badge badge-custom my-3">{{ $row->ukm->ukm_name }}</a>
            <small class="ml-2 text-dark">{{ $row->tanggal }}</small>
            <a href="#"><h5 class="judul-post">{{ $row->title }}</h5></a>
            <div class="desc-post">{!! Str::limit($row->konten, 100) !!}</div>
          </div>
        @endforeach

      </div>

    </div>
  </section><!-- End Post Terbaru Section -->

@endsection
