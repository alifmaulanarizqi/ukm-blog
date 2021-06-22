<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>UKM Blog | Dashboard</title>

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet"/>
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ asset('backend_assets/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend_assets/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend_assets/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('backend_assets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend_assets/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend_assets/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('backend_assets/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />

  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ asset('backend_assets/assets/css/sleek.css') }}" />

  <!-- Datatable -->
  <link href="{{ asset('backend_assets/assets/css/datatables.min.css') }}" rel="stylesheet">

  <!-- FAVICON -->
  <link href="{{ asset('backend_assets/assets/img/favicon.png') }}" rel="shortcut icon" />

  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" />

  <!--
    HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
  -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="{{ asset('backend_assets/assets/plugins/nprogress/nprogress.js') }}"></script>
</head>


  <body class="sidebar-fixed sidebar-dark header-light header-fixed" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">

      <!-- Sidebar -->
      @include('backend.body.sidebar')

      <div class="page-wrapper">

          <!-- Header -->
          @include('backend.body.header')


          <div class="content-wrapper">
              @yield('user')
          </div>

          <!--  -->
          @include('backend.body.footer')

      </div>
    </div>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer></script>
<script src="{{ asset('backend_assets/assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/toaster/toastr.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/ladda/spin.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/ladda/ladda.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend_assets/assets/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ asset('backend_assets/assets/js/sleek.js') }}"></script>
<script src="{{ asset('backend_assets/assets/js/chart.js') }}"></script>
<script src="{{ asset('backend_assets/assets/js/date-range.js') }}"></script>
<script src="{{ asset('backend_assets/assets/js/map.js') }}"></script>
<script src="{{ asset('backend_assets/assets/js/custom.js') }}"></script>

    <!-- Datatables -->
    <script src="{{ asset('backend_assets/assets/js/datatables.min.js') }}"></script>
    <script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable({
            "searching": true
        });
        $('.dataTables_length').addClass('bs-select');
    });

    $(document).ready(function () {
        $('#dtBasicExample2').DataTable({
            "searching": true
        });
        $('.dataTables_length').addClass('bs-select');
    });
    </script>

    <!-- Toastr -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    <!-- Send Delete Data Id To Modal -->
    <script>
        $(document).on("click", ".deleteBtn", function () {
            var deleteID = $(this).data('id');
            $(".modal-body #deleteId").val( deleteID );
        });
    </script>

  </body>
</html>
