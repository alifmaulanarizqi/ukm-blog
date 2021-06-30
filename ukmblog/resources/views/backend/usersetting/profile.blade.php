@extends('backend.user_master')

@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>User Profile</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.profile') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukan link name" value="{{ $user->name }}">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan link email" value="{{ $user->email }}">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="profileImage">Image</label>
            <input type="hidden" name="old_image" class="form-control-file" id="old_image" value="{{ $user->profile_photo_path }}">
            <input type="file" name="profile_photo_path" class="form-control-file" id="profileImage">
            @error('profile_photo_path')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
              <img id="showImage" src="{{ !empty($user->profile_photo_path) ? asset($user->profile_photo_path) : url('image/no_image.jpg') }}" style="width: 15rem;">
          </div>
          <button type="submit" class="btn btn-primary btn-default">Update Profile</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Showing Image -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#profileImage').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
