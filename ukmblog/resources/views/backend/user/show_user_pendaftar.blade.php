@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-table-border-none">
        <div class="card-header justify-content-between mb-4">
          <h2>Detail Pendaftar</h2>
        </div>
        <div class="card-body pt-0 pb-5">
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Nama</label>
            </div>
            <div class="col-12 col-lg-9">
              <input type="text" class="form-control-plaintext" value="{{ $user_pendaftar->name }}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Email</label>
            </div>
            <div class="col-12 col-lg-9">
              <input type="email" class="form-control-plaintext" value="{{ $user_pendaftar->email }}" readonly>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-12 col-lg-3">
              <label class="col-form-label">Alasan Masuk</label>
            </div>
            <div class="col-12 col-lg-9">
              <textarea rows="8" class="form-control-plaintext" readonly>{{ $user_pendaftar->reason_joining }}</textarea>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <div class="">
              <a href="{{ route('pendaftar.ukm') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="">
              <a href="{{ route('aprrove.user', $user_pendaftar->id) }}" class="btn btn-success">Approve</a>
              <a class="btn btn-danger text-white deleteBtn" data-id="{{ $user_pendaftar->id }}" data-toggle="modal" data-target="#deleteModal">Decline</a>

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

                                <form action="{{ route('decline.user') }}" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" name="deleteId" id="deleteId" value="">
                                        Are you sure to decline?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                                        <button type="submit" name="deleteData" class="btn btn-danger">Decline</button>
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
