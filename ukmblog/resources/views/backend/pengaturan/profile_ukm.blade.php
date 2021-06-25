@extends('backend.user_master')

@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Profile UKM</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.profileukm', $profile_ukm->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="ukm_name">Nama UKM</label>
            <input type="text" name="ukm_name" class="form-control" id="ukm_name" placeholder="Masukan nama ukm" value="{{ $profile_ukm->ukm_name }}">
            @error('ukm_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea name="description" class="form-control" rows="5" id="description" placeholder="Masukan deskripsi ukm">{{ $profile_ukm->description }}</textarea>
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="ukmImage">Image</label>
              <input type="hidden" name="old_image" class="form-control-file" id="old_image" value="{{ $profile_ukm->image }}">
              <input type="file" name="image" class="form-control-file" id="ukmImage">
              @error('image')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
          <div class="form-group">
            <img id="showImage" src="{{ !empty($profile_ukm->image) ? asset($profile_ukm->image) : url('image/no_image.jpg') }}" style="width: 15rem;">
          </div>
          <button type="submit" class="btn btn-primary btn-default">Update Profile UKM</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Showing Image -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#ukmImage').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
