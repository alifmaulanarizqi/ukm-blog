<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/title-img.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend_template/assets/css/style.css') }}">
    <title>UKM Blog</title>
  </head>
  <body>

    <div class="container" style="height: 100vh;">
      <div class="row" style="height: 100vh;">
        <div class="col-lg-5 mx-auto my-auto">
          <div class="card shadow">
            <div class="card-body px-5 py-4 form-text">
              <h4 class="mb-5 font-weight-bold">Verify Email</h4>
              <div class="">
                Terima kasih sudah mendaftar! Sebelum mulai, bisakah Anda mem-verifikasi email dengan cara meng-klik tombol di bawah?
              </div>

              @if (session('status') == 'verification-link-sent')
                  <div class="mb-4 font-medium text-sm text-primary mt-3">
                      {{ __('Link verifikasi baru telah dikirim ke alamat email yang Anda isikan') }}
                  </div>
              @endif

              <form action="{{ route('verification.send') }}" method="post" class="">
                @csrf
                <div class="d-flex justify-content-between">
                  <div class="form-group ">
                    <button class="btn btn-primary btn-block mt-4" type="submit">Kirim Ulang Link Verifikasi</button>
                  </div>
              </form>
                  <div class="d-flex form-group align-items-center">
                    <form action="{{ route('logout') }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-primary mt-4">
                          {{ __('Log Out') }}
                      </button>
                    </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="{{ asset('frontend_template/assets/script/script.js') }}"></script>
  </body>
</html>
