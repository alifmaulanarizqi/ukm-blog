@extends('main.main_master')

@section('content')

<!-- ======= Breadcrumb ======= -->
  <section id="breadcrumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buka UKM</li>
      </ol>
    </nav>
  </section>

  <div class="row section-bg-ukm margin-after-navbar">
    <!-- ======= Konten ======= -->
    <div class="col-12 pl-0 padding-post">

      <div class="section-title">
        <h4 class="font-weight-bold section-title-ukm-home">Buka UKM</h4>
      </div>

      <!-- ======= Form Buka UKM ======= -->
      <section class="pb-lg-5 mt-4">
          <div class="post-container mb-5 mb-lg-3">
            <form action="{{ route('pendaftaran.ukm') }}" method="post" class="form-text">
              @csrf
              <div class="form-group">
                <label for="ukm_name" class="font-weight-bold">Nama UKM</label>
                <input type="text" name="ukm_name" class="form-control" id="ukm_name" placeholder="Masukan nama UKM">
                @error('ukm_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="descriptiion" class="font-weight-bold">Deskripsi UKM</label>
                <textarea name="description" id="descriptiion" class="form-control" rows="4" placeholder="Masukan deskripsi mengenai UKM"></textarea>
                @error('description')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="leader" class="font-weight-bold">Nama Akun</label>
                <input type="text" name="leader" class="form-control" id="leader" placeholder="Masukan nama pendaftar atau ketua">
                @error('leader')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email Akun</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan email pendaftar atau ketua">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="font-weight-bold">Password Akun</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="font-weight-bold">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukan ulang password">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Buka UKM</button>
            </form>
          </div>
      </section><!-- End Form Buka UKM -->

    </div> <!-- End Konten -->
  </div>

@endsection
