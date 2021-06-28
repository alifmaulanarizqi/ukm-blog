@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-table-border-none">
        <div class="card-header justify-content-between mb-4">
          <h2>Detail UKM</h2>
        </div>
        <div class="card-body pt-0 pb-5">
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Nama UKM</label>
            </div>
            <div class="col-12 col-lg-9">
              <input type="text" class="form-control-plaintext" value="{{ $ukm->ukm_name }}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Deskripsi</label>
            </div>
            <div class="col-12 col-lg-9">
              <textarea rows="8" class="form-control-plaintext" readonly>{{ $ukm->description }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Image</label>
            </div>
            <div class="col-12 col-lg-9">
              <img style="width: 20rem;" src="{{ (!empty($ukm->image)) ? asset($ukm->image) : url('image/no_image.jpg') }}" alt="">
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('ukm.semua') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="">
              <a class="btn btn-danger text-white deleteBtn" data-id="{{ $ukm->id }}" data-toggle="modal" data-target="#deleteModal">Move to Trash</a>

              <!-- Modal -->
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('softdelete.ukm', $ukm->id) }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="deleteId" id="deleteId" value="">
                                        Are you sure to delete?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                                        <button type="submit" name="deleteData" class="btn btn-danger">Move to Trash</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
