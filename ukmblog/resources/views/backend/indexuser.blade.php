@extends('backend.user_master')

@section('user')

<div class="content">

  <div class="row">
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">

          @php
              use App\Models\User;
              use App\Models\Backend\Kategori;
              use App\Models\Backend\Post;
              use App\Models\Frontend\UserPendaftar;

              $anggota_terdaftar = User::select('id')->where('ukm_id', Auth::user()->ukm_id)->get();
              $anggota_pending = UserPendaftar::select('id')->where('ukm_id', Auth::user()->ukm_id)->get();
              $kategori = Kategori::select('id')->where('ukm_id', Auth::user()->ukm_id)->get();
              $post = Post::select('id')->where('ukm_id', Auth::user()->ukm_id)->get();
          @endphp

          <h2 class="mb-1">{{ $anggota_terdaftar->count() }}</h2>
          <p>User Terdaftar</p>
          <div class="text-right text-success">
            <i class="mdi mdi-account-check mdi-dashboard-icon"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini  mb-4">
        <div class="card-body">
          <h2 class="mb-1">{{ $anggota_pending->count() }}</h2>
          <p>User Pending</p>
          <div class="text-right text-warning">
            <i class="mdi mdi-account-clock mdi-dashboard-icon"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">{{ $kategori->count() }}</h2>
          <p>Jumlah Kategori</p>
          <div class="text-right text-primary">
            <i class="mdi mdi-text-subject mdi-dashboard-icon"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card card-mini mb-4">
        <div class="card-body">
          <h2 class="mb-1">{{ $post->count() }}</h2>
          <p>Jumlah Post</p>
          <div class="text-right text-info">
            <i class="mdi mdi-folder-edit mdi-dashboard-icon"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">

    @php
        use Illuminate\Support\Facades\DB;

        $anggotas = DB::table('users')
                        ->join('role_user', 'users.id', 'role_user.user_id')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->select('users.name', 'users.email', 'roles.title')
                        ->where('ukm_id', Auth::user()->ukm_id)
                        ->get();
    @endphp

    <div class="col-md-12">
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
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Chartjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
<!-- style chart -->
<script src="{{ asset('backend_assets/assets/js/stylechart.js') }}">

@endsection
