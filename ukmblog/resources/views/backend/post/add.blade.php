@extends('backend.user_master')

@section('user')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content-wrapper">
  <div class="content">
    <div class="card card-default">
      <div class="card-header card-header-border-bottom">
        <h2>Tambah Post</h2>
      </div>
      <div class="card-body">
        <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Masukan judul post">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="slug">URL Post <span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="Masukan url post">
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="kategori_id">Kategori <span class="text-danger">*</span></label>
            <select class="form-control" name="kategori_id" id="kategori_id">
              <option disabled selected>--- Pilih Kategori ---</option>

              @foreach($kategoris as $row)
                  <option value="{{ $row->id }}">{{ $row->kategori }}</option>
              @endforeach

            </select>
            @error('kategori_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control-file" id="image">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group">
            <img id="showImage" src="{{ url('image/no_image.jpg') }}" style="width: 15rem;">
          </div>
          <div class="form-group">
            <label for="summernote">Konten</label>
            <textarea class="form-control" name="konten" id="summernote"></textarea>
          </div>
          <hr class="mt-5 mb-4" style="border: 0; border-top: 1px solid #9c9c9c">
          <h4 class="mb-4">Extra Option</h4>
          <div class="d-flex justify-content-start mb-4">
            <div class="mr-5">
              <label class="control outlined control-checkbox checkbox-success">Headline Utama
								<input name="headline_utama" type="checkbox" value="1">
								<div class="control-indicator"></div>
							</label>
            </div>
            <div class="">
              <label class="control outlined control-checkbox checkbox-success">Headline UKM
								<input name="headline_ukm" type="checkbox" value="1">
								<div class="control-indicator"></div>
							</label>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('post') }}" class="btn btn-secondary btn-default">Kembali</a>
            </div>
            <div class="">
              <button type="submit" class="btn btn-primary btn-default">Tambah Post</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Showing Image -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<script>
    $('#title').change(function(e) {
      $.get('{{ route('checkslug.post') }}',
        { 'title': $(this).val() },
        function( data ) {
          $('#slug').val(data.slug);
        }
      );
    });
</script>

@endsection
