@extends('main.main_master')

@section('content')

@php
    $ukm_slug = Session::get('ukm_slug');
@endphp

<!-- ======= Breadcrumb ======= -->
<section id="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('hal.ukm', $ukm_slug) }}">{{ $ukm->ukm_name }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $kategori->kategori }}</li>
    </ol>
  </nav>
</section>

<div class="row section-bg-ukm">
  <!-- ======= Konten ======= -->
  <div class="col-lg-8 col-12 pl-0">

    <!-- ======= Post Terbaru Section ======= -->
    <section class="pb-lg-5">
      <div class="">

        <div class="section-title">
          <h4 class="font-weight-bold section-title-ukm-home">Kategori {{ $kategori->kategori }}</h4>
        </div>

        <div class="row mt-4 text-left">

          @foreach($post as $row)
            <div class="col-sm-6 col-lg-4 my-3">
              <a href="#">
                <img src="{{ (!empty($row->image)) ? asset($row->image) : url('image/posts/post_default.png') }}" class="img-fluid" alt="">
              </a>
              <span class="badge badge-custom my-3">{{ $row->user->name }}</span>
              <small class="ml-2 text-dark">{{ $row->tanggal }}</small>
              <a href="#"><h5 class="judul-post">{{ $row->title }}</h5></a>
              <p class="desc-post">{!! Str::limit($row->kontent, 100) !!}</p>
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
