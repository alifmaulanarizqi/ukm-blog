@extends('main.main_master')

@section('content')

  <!-- ======= Breadcrumb ======= -->
  <section id="breadcrumb">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
            <form action="{{ route('pendaftaran.user') }}" method="post" class="form-text">
              @csrf
              <div class="form-group">
                <label for="name" class="font-weight-bold">Nama <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Masukan nama pendaftar">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email" class="font-weight-bold">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan nama UKM">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password" class="font-weight-bold">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="password_confirmation" class="font-weight-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukan ulang password">
                @error('password_confirmation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="ukm_id" class="font-weight-bold">UKM <span class="text-danger">*</span></label>
                <select class="form-control" name="ukm_id" id="ukm_id">
                  <option disabled selected>--- Pilih UKM ---</option>

                  @foreach($open_register_ukms as $row)
                      <option value="{{ $row->id }}">{{ $row->ukm_name }}</option>
                  @endforeach

                </select>
                @error('ukm_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group">
                <label for="reason_joining" class="font-weight-bold">Alasan masuk UKM</label>
                <textarea name="reason_joining" id="reason_joining" class="form-control" rows="4" placeholder="Alasan masuk UKM"></textarea>
                @error('reason_joining')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary">Daftar UKM</button>
            </form>
          </div>
      </section><!-- End Form Daftar UKM -->

    </div> <!-- End Konten -->
  </div>

@endsection
