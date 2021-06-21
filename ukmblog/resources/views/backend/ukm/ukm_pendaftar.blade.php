@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>UKM Pendaftar</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" width="15%">Nama UKM</th>
                <th scope="col" width="25%">Deskripsi</th>
                <th scope="col">Ketua</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($ukm_pendaftars as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->ukm_name }}</td>
                    <td>{{ Str::limit($row->description, 100) }}</td>
                    <td>{{ $row->leader }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                      <a href="{{ route('show.ukmpendaftar', $row->id) }}" class="btn btn-info btn-sm">Show</a>
                      <a href="{{ route('aprrove.ukm', $row->id) }}" class="btn btn-success btn-sm">Approve</a>
                      <a class="btn btn-danger btn-sm text-white deleteBtn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#deleteModal">Decline</a>

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

                                        <form action="{{ route('decline.ukm', $row->id) }}" method="post">
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
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

@endsection
