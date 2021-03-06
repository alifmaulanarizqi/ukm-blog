@extends('backend.user_master')

@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Tambah Kategori</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('store.kategori') }}" method="post">
          @csrf
          <div class="form-group">
            <label for="kategori">Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukan nama kategori">
            @error('kategori')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slug">URL Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukan url kategori">
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('kategori') }}" class="btn btn-secondary btn-default">Kembali</a>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary btn-default">Tambah Kategori</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    $('#kategori').change(function(e) {
      $.get('{{ route('checkslug.kategori') }}',
        { 'kategori': $(this).val() },
        function( data ) {
          $('#slug').val(data.slug);
        }
      );
    });
</script>

@endsection
