@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Semua Anggota</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($anggotas as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->title }}</td>
                    <td>
                      @if(Auth::id() != $row->id)
                      <a href="{{ route('edit.anggota', $row->id) }}" class="btn btn-info btn-sm">Edit</a>
                      <a class="btn btn-danger btn-sm text-white deleteBtn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#deleteModal">Move to Trash</a>
                      @else

                      @endif
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

                                        <form action="{{ route('softdelete.anggota', $row->id) }}" method="post">
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
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Anggota Trash</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample2" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($anggotas_in_trash as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>
                      <a href="{{ route('restore.anggota', $row->id) }}" class="btn btn-info btn-sm">Restore</a>
                      <a class="btn btn-danger btn-sm text-white deleteBtn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#deleteModal2">Delete</a>

                      <!-- Modal -->
                            <div class="modal fade" id="deleteModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('delete.anggota', $row->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" name="deleteId" id="deleteId" value="">
                                                Are you sure to delete?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                                                <button type="submit" name="deleteData" class="btn btn-danger">Delete</button>
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
