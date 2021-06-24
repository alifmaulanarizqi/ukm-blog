@extends('backend.user_master')

@section('user')

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Sosial Media</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.sosial', $sosial_media->id) }}" method="post">
          @csrf
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Masukan link twitter" value="{{ $sosial_media->twitter }}">
            @error('twitter')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Masukan link instagram" value="{{ $sosial_media->instagram }}">
            @error('instagram')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Masukan link facebook" value="{{ $sosial_media->facebook }}">
            @error('facebook')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="youtube">Youtube</label>
            <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Masukan link youtube" value="{{ $sosial_media->youtube }}">
            @error('youtube')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-default">Update Sosial Media</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
