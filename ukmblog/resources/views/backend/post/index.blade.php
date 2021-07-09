@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Semua Post</h2>
        </div>
        <div class="d-flex justify-content-end">
          <div class="mt-4 mr-3">
            <a href="{{ route('add.post') }}" class="btn btn-primary">Tambah Post</a>
          </div>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" width="12%">Title</th>
                <th scope="col" width="12%">Kategori</th>
                <th scope="col">Image</th>
                <th scope="col" width="25%">Konten</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($posts as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ !empty($row->kategori) ? $row->kategori->kategori : '[deleted]' }}</td>
                    <td><img style="width: 5rem;" src="{{ (!empty($row->image)) ? asset($row->image) : url('image/no_image.jpg') }}" class="square-image" alt=""></td>
                    <td>{!! Str::limit($row->konten, 100) !!}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>
                      <a href="{{ route('edit.post', $row->id) }}" class="btn btn-info btn-sm">Edit</a>
                      <a class="btn btn-danger btn-sm text-white deleteBtn" data-id="{{ $row->id }}" data-toggle="modal" data-target="#deleteModal">Move to Trash</a>
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

                                        <form action="{{ route('softdelete.post') }}" method="post">
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
          <h2>Post Trash</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample2" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col" width="12%">Title</th>
                <th scope="col" width="12%">Kategori</th>
                <th scope="col">Image</th>
                <th scope="col" width="25%">Konten</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($posts_in_trash as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->title }}</td>
                    <td>{{ !empty($row->kategori) ? $row->kategori->kategori : '[deleted]' }}</td>
                    <td><img style="width: 5rem; height: 5rem;" src="{{ (!empty($row->image)) ? asset($row->image) : url('image/no_image.jpg') }}" alt=""></td>
                    <td>{!! Str::limit($row->konten, 100) !!}</td>
                    <td>{{ $row->tanggal }}</td>
                    <td>
                      <a href="{{ route('restore.post', $row->id) }}" class="btn btn-info btn-sm">Restore</a>
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

                                        <form action="{{ route('delete.post') }}" method="post">
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
