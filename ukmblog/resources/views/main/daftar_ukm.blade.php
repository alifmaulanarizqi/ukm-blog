@extends('main.main_master')

@section('content')

<!-- ======= Breadcrumb ======= -->
  <section id="breadcrumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Daftar UKM</li>
      </ol>
    </nav>
  </section>

  <div class="row section-bg-ukm margin-after-navbar">
    <!-- ======= Konten ======= -->
    <div class="col-12 pl-0 padding-post">

      <div class="section-title">
        <h4 class="font-weight-bold section-title-ukm-home">Daftar UKM</h4>
      </div>

      <!-- ======= Form Daftar UKM ======= -->
      <section class="pb-lg-5 mt-4">
          <div class="post-container mb-5 mb-lg-3">
            <form action="" method="post" class="form-text">
              <div class="form-group">
                <label for="name" class="font-weight-bold">Nama</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Masukan nama pendaftar">
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan nama UKM">
              </div>
              <div class="form-group">
                <label for="password" class="font-weight-bold">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="font-weight-bold">Konfirmasi Password</label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukan ulang password">
              </div>
              <div class="form-group">
                <label for="ukm" class="font-weight-bold">UKM</label>
                <select class="form-control" name="ukm" id="ukm">
                  <option disabled selected>--- Pilih UKM ---</option>
                  <option value="UKM 1">UKM 1</option>
                  <option value="UKM 2">UKM 2</option>
                  <option value="UKM 3">UKM 3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="reason" class="font-weight-bold">Alasan masuk UKM</label>
                <textarea name="reason" id="reason" class="form-control" rows="4" placeholder="Alasan masuk UKM"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Daftar UKM</button>
            </form>
          </div>
      </section><!-- End Form Daftar UKM -->

    </div> <!-- End Konten -->
  </div>

@endsection
