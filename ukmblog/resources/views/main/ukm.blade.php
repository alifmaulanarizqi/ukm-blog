@extends('main.main_master')

@section('content')

<!-- ======= Breadcrumb ======= -->
  <section id="breadcrumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{ $ukm->ukm_name }}</li>
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
              <img src="{{ (!empty($ukm->image)) ? asset($ukm->image) : url('image/ukms/ukm_default.png') }}" class="img-fluid" alt="">
            </div>
            <div class="ml-4 my-auto">
              <h4 class="text-uppercase font-weight-bold">{{ $ukm->ukm_name }}</h4>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-12 my-auto">
          <div class="mx-3">
            <h6 class="font-weight-bold">Deskripsi UKM</h6>
            <div>{{ Str::limit($ukm->description, 300) }}</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ======= Hero Section ======= -->
  @if($banner->count() != 0)
    <section id="heroUkm">
      <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        <div class="carousel-inner" role="listbox">

            @foreach($banner as $row)
                <div class="carousel-item {{ $loop->first ? ' active' : '' }}" style="background-image: url({{ (!empty($row->image)) ? asset($row->image) : url('image/posts/post_default.png') }});">
                  <div class="carousel-container">
                    <div class="carousel-content animate__animated animate__fadeInUp">
                      <h2>{{ $row->title }}</h2>
                      <p>{!! Str::limit($row->konten) !!}</p>
                      <div class="text-center"><a href="#" class="btn-more">Read More</a></div>
                    </div>
                  </div>
                </div>
            @endforeach

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
  @endif


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
              @foreach($post_terbaru as $row)
                  <div class="col-sm-6 col-lg-4 my-3">
                    <a href="#">
                      <img src="{{ (!empty($row->image)) ? asset($row->image) : url('image/posts/post_default.png') }}" class="img-fluid" alt="">
                    </a>
                    <span class="badge badge-custom my-3">{{ $row->user->name }}</span>
                    <small class="ml-2 text-dark">{{ $row->tanggal }}</small>
                    <a href="#"><h5 class="judul-post">{{ $row->title }}</h5></a>
                    <div class="desc-post">{!! Str::limit($row->konten, 100) !!}</div>
                  </div>
              @endforeach

            </div>

          </div>
        </section><!-- End Post Terbaru Section -->
      </div> <!-- End Konten -->

      <!-- ======= Sidebar ======= -->
      @include('main.body.sidebar')

    </div>

@endsection
