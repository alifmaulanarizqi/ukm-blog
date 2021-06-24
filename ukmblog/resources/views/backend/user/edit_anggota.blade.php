@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-table-border-none">
        <div class="card-header justify-content-between mb-4">
          <h2>Detail Anggota</h2>
        </div>
        <div class="card-body pt-0 pb-5">
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Nama</label>
            </div>
            <div class="col-12 col-lg-9">
              <input type="text" class="form-control-plaintext" value="{{ $anggota->name }}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Email</label>
            </div>
            <div class="col-12 col-lg-9">
              <input type="email" class="form-control-plaintext" value="{{ $anggota->email }}" readonly>
            </div>
          </div>
          <form action="{{ route('update.anggota', $anggota->id) }}" method="post">
            @csrf
            <div class="form-group row">
              <div class="col-12 col-lg-3">
                <label for="role_id" class="col-form-label">Role</label>
              </div>
              <div class="col-12 col-lg-9">
                <select class="form-control" name="role_id" id="role_id">
                  <option disabled selected>--- Pilih Role ---</option>

                  <option value="2" <?php if($role_id->role_id == 2) echo "selected"; ?> >Ketua</option>
                  <option value="3" <?php if($role_id->role_id == 3) echo "selected"; ?> >Admin</option>
                  <option value="4" <?php if($role_id->role_id == 4) echo "selected"; ?> >Anggota</option>

                </select>
                @error('role_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('anggota.ukm') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary">Update Anggota</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
