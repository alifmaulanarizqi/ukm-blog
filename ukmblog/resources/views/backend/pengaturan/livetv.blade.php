@extends('backend.user_master')

@section('user')

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Live TV</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('update.livetv', $livetv->id) }}" method="post">
          @csrf
          <div class="form-group">
            <label for="livetv">Embed Code</label>
            <input type="text" class="form-control" name="livetv" id="livetv" placeholder="Masukan link video" value="{{ $livetv->livetv }}">
            @error('livetv')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary btn-default">Update Live TV</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
