@extends('main.main_master')

@section('content')

@php
    use App\Models\Backend\Ukm;

    $ukm_slug = Session::get('ukm_slug');
    $kategori_slug = Session::get('kategori_slug');
@endphp

<!-- ======= Breadcrumb ======= -->
<section id="breadcrumb">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
      <li class="breadcrumb-item"><a href="{{ route('hal.ukm', $ukm_slug) }}">{{ $ukm->ukm_name }}</a></li>
      <li class="breadcrumb-item"><a href="{{ route('hal.kategori', $kategori_slug) }}">{{ $kategori->kategori }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
    </ol>
  </nav>
</section>

<div class="row section-bg-ukm margin-after-navbar">
  <!-- ======= Konten ======= -->
  <div class="col-lg-8 col-12 pl-0 padding-post">

    <!-- ======= Post Section ======= -->
    <section class="pb-lg-5">
        <img src="{{ (!empty($post->image)) ? asset($post->image) : url('image/posts/post_default.png') }}" class="post-image-rectangle" alt="">
        <div class="post-container mb-5 mb-lg-3">
          <h4 class="font-weight-bold">{{ $post->title }}</h4>
          <div class="author-date-post mt-3">
            <ul class="">
              <li class=""><i class="fas fa-user"></i> {{ $post->user->name }}</li>
              <li class="ml-4"><i class="far fa-clock"></i> {{ $post->tanggal }}</li>
            </ul>
          </div>
          <div class="mt-3">
            {!! $post->konten !!}
          </div>
        </div>
    </section><!-- End Post Section -->
  </div> <!-- End Konten -->

  <!-- ======= Sidebar ======= -->
  @include('main.body.sidebar')
</div>

@endsection
