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
              <li class=""><i class="fas fa-user"></i> {{ !empty($post->user->name) ? $post->user->name : 'User Deleted'}}</li>
              <li class="ml-4"><i class="far fa-clock"></i> {{ $post->tanggal }}</li>
            </ul>
          </div>
          <div class="mt-3">
            {!! $post->konten !!}
          </div>

          <!-- Sharethis Button -->
          <div class="sharethis-inline-share-buttons pb-4"></div>
          <!-- End Sharethis Button -->

          <!-- Disqus Comment -->
          <div class="section-title pt-4">
            <h4 class="font-weight-bold section-title-ukm-home">Comment</h4>
          </div>
          <div id="disqus_thread"></div>
          <script>
              /**
              *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
              *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
              /*
              var disqus_config = function () {
              this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
              this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
              };
              */
              (function() { // DON'T EDIT BELOW THIS LINE
              var d = document, s = d.createElement('script');
              s.src = 'https://ukm-blog.disqus.com/embed.js';
              s.setAttribute('data-timestamp', +new Date());
              (d.head || d.body).appendChild(s);
              })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
          <!-- End Disqus Comment -->

          <!-- Related Post -->
          <div class="pt-4">
            <div class="section-title">
              <h4 class="font-weight-bold section-title-ukm-home">Related Post</h4>
            </div>

            <div class="row mt-4 text-left">

              @foreach($related_post as $row)
                <div class="col-sm-6 col-lg-4 my-3">
                  <a href="{{ route('hal.post', $row->slug) }}">
                    <img src="{{ (!empty($row->image)) ? asset($row->image) : url('image/posts/post_default.png') }}" class="img-fluid" alt="">
                  </a>
                  <span class="badge badge-custom my-3">{{ !empty($row->user->name) ? $row->user->name : 'User Deleted'}}</span>
                  <small class="ml-2 text-dark">{{ $row->tanggal }}</small>
                  <a href="{{ route('hal.post', $row->slug) }}"><h5 class="judul-post">{{ $row->title }}</h5></a>
                  <div class="desc-post">{!! Str::limit($row->konten, 100) !!}</div>
                </div>
              @endforeach

            </div>
          </div><!-- End Related Post -->

        </div>

    </section><!-- End Post Section -->
  </div> <!-- End Konten -->

  <!-- ======= Sidebar ======= -->
  @include('main.body.sidebar')
</div>

@endsection
