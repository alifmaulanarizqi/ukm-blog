<div class="col-lg-4 col-12 pr-0 mb-5 padding-sidebar">
  <section id="sidebar" class="py-lg-5">
    <div class="sidebar-container">
      <div class="sidebar-part">
        <h5 class="font-weight-bold">Kategori</h5>
        <div class="categories">
          <ul>

            @foreach($kategori as $row)
              <li><a href="#">{{ $row->kategori }}</a></li>
            @endforeach

          </ul>
        </div>
      </div>
      @if($ukm->livetv != NULL)
        <div class="sidebar-part mt-4">
          <h5 class="font-weight-bold">Live TV</h5>
          <div class="livetv">
            {!! $ukm->livetv !!}
          </div>
        </div>
      @endif
      @if($ukm->instagram != NULL || $ukm->facebook != NULL || $ukm->twitter != NULL || $ukm->youtube != NULL)
      <div class="sidebar-part mt-4">
        <h5 class="font-weight-bold">Sosial Media</h5>
        <div class="social-media-ukm">
            @if($ukm->instagram != NULL)
              <a href="{{ $ukm->instagram }}" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
            @endif
            @if($ukm->facebook != NULL)
              <a href="{{ $ukm->facebook }}" target="_blank"><i class="fab fa-facebook fa-2x"></i></a>
            @endif
            @if($ukm->twitter != NULL)
              <a href="{{ $ukm->twitter }}" target="_blank"><i class="fab fa-twitter fa-2x"></i></a>
            @endif
            @if($ukm->youtube != NULL)
              <a href="{{ $ukm->youtube }}" target="_blank"><i class="fab fa-youtube fa-2x"></i></a>
            @endif
        </div>
      </div>
      @endif
    </div>
  </section>
</div><!-- End Sidebar -->
