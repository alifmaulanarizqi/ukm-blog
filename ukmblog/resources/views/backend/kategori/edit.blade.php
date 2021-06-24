@extends('backend.user_master')

@section('user')

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Edit Kategori</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.kategori', $kategori->id) }}" method="post">
          @csrf
          <div class="form-group">
            <label for="kategori">Nama Kategori</label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan nama kategori" value="{{ $kategori->kategori }}">
            @error('kategori')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('kategori') }}" class="btn btn-secondary btn-default">Kembali</a>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary btn-default">Update Kategori</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
