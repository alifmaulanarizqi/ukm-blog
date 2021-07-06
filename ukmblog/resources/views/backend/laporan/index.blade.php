@extends('backend.user_master')

@section('user')

  <div class="content-wrapper">
    <div class="content">

      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Jumlah Post Setiap Kategori</h2>
        </div>
        <div class="card-body table-font">
          <div class="chart-bar">
            <canvas id="myBarChart"></canvas>
          </div>
        </div>
      </div>

      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Perbandingan Viewer</h2>
        </div>
        <div class="card-body table-font">
          <div class="chart-pie">
            <canvas id="myPiechart"></canvas>
          </div>
        </div>
      </div>

      <div class="card card-default">
        <div class="card-header card-header-border-bottom">
          <h2>Jumlah Viewer Setiap Post</h2>
        </div>
        <div class="card-body table-font">
          <table id="dtBasicExample" class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Post Title</th>
                <th scope="col">Image</th>
                <th scope="col">Viewer</th>
              </tr>
            </thead>
            <tbody>
              @php($i = 1)
              @foreach($post_data as $row)
                  <tr>
                    <td scope="row" width="10%">{{ $i++ }}</td>
                    <td width="20%">{{ $row->title }}</td>
                    <td><img style="width: 5rem;" src="{{ (!empty($row->image)) ? asset($row->image) : url('image/no_image.jpg') }}" class="square-image" alt=""></td>
                    <td>{{ $row->viewer }}</td>
                  </tr>
              @endforeach
            </tbody>
          </table>
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
      var chartdata = {
        labels: <?php echo json_encode($kategori); ?>,
        datasets: [{
          label: "Banyak post",
          backgroundColor: "#4e73df",
          hoverBackgroundColor: "#2e59d9",
          borderColor: "#4e73df",
          data: <?php echo json_encode($jumlah_post); ?>
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
  </script>

  <!-- pie chart -->
    <script>
      $(document).ready(function () {
        showGraph2();
      });

      function showGraph2() {
        var chartdata = {
          labels: <?php echo json_encode($nama_post); ?>,
          datasets: [{
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc', '#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf', '#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: 'rgba(234, 236, 244, 1)',
            data: <?php echo json_encode($jumlah_viewer); ?>
          }]
        };

        var graphTarget = $("#myPiechart");

        var barGraph = new Chart(graphTarget, {
          type: 'doughnut',
          data: chartdata,
          options: {
            maintainAspectRatio: false,
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              caretPadding: 10,
            },
            legend: {
              display: false
            },
            cutoutPercentage: 50,
          }
        });
      }
    </script>

@endsection
