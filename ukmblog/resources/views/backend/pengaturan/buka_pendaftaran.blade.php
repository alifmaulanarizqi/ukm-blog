@extends('backend.user_master')

@section('user')

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Buka Pendaftaran</h2>
      </div>
      <div class="card-body">
          <div class="form-group">
            <label>Status Pendaftaran</label>
            @if($open_registration->open_registration == 1)
              <div class="">
                <a href="{{ route('deactive.open_registration', $open_registration->id) }}"><button type="button" class="btn btn-danger text-white">Tutup Registrasi</button></a>
                <span class="d-block mt-2 text-success">Sekarang registrasi dibuka</span>
              </div>
            @else
              <div class="">
                <a href="{{ route('active.open_registration', $open_registration->id) }}"><button type="button" class="btn btn-primary text-white">Buka Registrasi</button></a>
                <span class="d-block mt-2 text-danger">Sekarang registrasi ditutup</span>
              </div>
            @endif
          </div>
      </div>
    </div>
  </div>
</div>

@endsection
