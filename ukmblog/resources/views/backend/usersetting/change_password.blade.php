@extends('backend.user_master')

@section('user')

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Change Password</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.password') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="oldpassword" class="form-control" id="current_password">
            @error('oldpassword')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" class="form-control" id="password">
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
            @error('password_confirmation')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-default">Update Password</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
