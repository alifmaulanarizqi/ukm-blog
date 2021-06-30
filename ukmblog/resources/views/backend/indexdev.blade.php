@extends('backend.user_master')

@section('user')

<div class="content">

        <div class="row">
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">

                @php
                    use App\Models\Backend\Ukm;
                    use App\Models\Frontend\UkmPendaftar;
                    use Illuminate\Support\Facades\DB;

                    $ukm_terdaftar = Ukm::select('id')->get();
                    $ukm_pending = UkmPendaftar::select('id')->get();
                    $jumlah_user = DB::table('role_user')->where('role_id', '!=', '1')->get();
                    $jumlah_developer = DB::table('role_user')->where('role_id', '1')->get();
                @endphp

                <h2 class="mb-1">{{ $ukm_terdaftar->count() }}</h2>
                <p>UKM Terdaftar</p>
                <div class="text-right text-success">
                  <i class="mdi mdi-account-check mdi-dashboard-icon"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini  mb-4">
              <div class="card-body">
                <h2 class="mb-1">{{ $ukm_pending->count() }}</h2>
                <p>UKM Pending</p>
                <div class="text-right text-warning">
                  <i class="mdi mdi-account-clock mdi-dashboard-icon"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">{{ $jumlah_user->count() }}</h2>
                <p>Jumlah User</p>
                <div class="text-right text-primary">
                  <i class="mdi mdi-account-multiple mdi-dashboard-icon"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6">
            <div class="card card-mini mb-4">
              <div class="card-body">
                <h2 class="mb-1">{{ $jumlah_developer->count() }}</h2>
                <p>Jumlah Developer</p>
                <div class="text-right text-info">
                  <i class="mdi mdi-account-key mdi-dashboard-icon"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

  <div class="row">

    @php
        $developer = DB::table('users')
                        ->join('role_user', 'users.id', 'role_user.user_id')
                        ->select('users.*', 'role_user.role_id')
                        ->where('role_user.role_id', 1)
                        ->get();
    @endphp

    @php
        $ukm = Ukm::select('id', 'ukm_name')->get();

        foreach($ukm as $row) {
            $nama_ukm[] = $row['ukm_name'];
            $id_ukm = $row['id'];

            $banyak_user_ukm = DB::table('users')
                                  ->select(DB::raw('count(id) as count'))
                                  ->whereRaw('ukm_id="'.$id_ukm.'"')
                                  ->get();

            $result[] = $banyak_user_ukm->toArray();
            $jumlah_user = array();

            foreach($result as $row2 => $val) {
                $jumlah_user[] = $val[0]->count;
            }
        }
    @endphp

    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Semua Developer</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Image</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($developer as $row)
                  <tr>
                    <td scope="row">{{ $i++ }}</td>
                    <td>{{ $row->name }}</td>
                    <td><img style="width: 5rem;" src="{{ (!empty($row->profile_photo_path)) ? asset($row->profile_photo_path) : url('image/no_image.jpg') }}" class="square-image" alt=""></td>
                    <td>{{ $row->email }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Anggota UKM</h2>
        </div>
        <div class="card-body table-font">
          <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
          </div>
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

</script>

<!-- Bar chart -->
<script>
      $(document).ready(function () {
        showGraph();
      });

      function showGraph() {
        {
            var chartdata = {
              labels: <?php echo json_encode($nama_ukm); ?>,
              datasets: [{
                label: "Banyak user",
                backgroundColor: "#4e73df",
                hoverBackgroundColor: "#2e59d9",
                borderColor: "#4e73df",
                data: <?php echo json_encode($jumlah_user); ?>
              }]
            };

            var graphTarget = $("#myBarChart");

            var barGraph = new Chart(graphTarget, {
              type: 'bar',
              data: chartdata,
              options: {
                maintainAspectRatio: true,
                layout: {
                  padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                  }
                },
                scales: {
                  xAxes: [{
                    barPercentage: 0.5,
                    gridLines: {
                      display: false,
                      drawBorder: false
                    },
                    ticks: {
                      maxTicksLimit: 200
                    }
                  }],
                  yAxes: [{
                    ticks: {
                      maxTicksLimit: 5,
                      beginAtZero: true,
                      padding: 5,
                      callback: function(value, index, values) {
                        return number_format(value);
                      }
                    },
                    gridLines: {
                      color: "rgb(234, 236, 244)",
                      zeroLineColor: "rgb(234, 236, 244)",
                      drawBorder: false,
                      borderDash: [2],
                      zeroLineBorderDash: [2]
                    }
                  }],
                },
                legend: {
                  display: false
                },
                tooltips: {
                  backgroundColor: "rgb(255,255,255)",
                  bodyFontColor: "#858796",
                  titleMarginBottom: 10,
                  titleFontColor: '#6e707e',
                  titleFontSize: 14,
                  borderColor: '#dddfeb',
                  borderWidth: 1,
                  xPadding: 15,
                  yPadding: 15,
                  displayColors: false,
                  intersect: false,
                  mode: 'index',
                  caretPadding: 10,
                  callbacks: {
                    label: function(tooltipItem, chart) {
                      var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                      return datasetLabel + ': ' + number_format(tooltipItem.yLabel);
                    }
                  }
                }
              }
            });
          }
        }
    </script>
@endsection
