<header>
  <!-- navbar -->
  <nav class="navbar navbar-expand-lg fixed-top nav-menu">
    <a href="#" class="navbar-brand"><span class="h3 span">UKM</span><span class="h3">Blog</span></a>
    <button type="button" class="navbar-toggler nav-button" data-toggle="collapse" data-target="#myNavbar">
      <div class="bg-light line1"></div>
      <div class="bg-light line2"></div>
      <div class="bg-light line3"></div>
    </button>
    <div class="collapse navbar-collapse justify-content-end text-uppercase" id="myNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item active">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle m-2 menu-item" href="#" id="navbarUkmDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            UKM
          </a>
          <div class="dropdown-menu dropdown-menu-custom" aria-labelledby="navbarUkmDropdown">
            <a class="dropdown-item" href="#">UKM 1</a>
            <a class="dropdown-item" href="#">UKM 2</a>
            <a class="dropdown-item" href="#">UKM 3</a>
          </div>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item">Daftar UKM</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link m-2 menu-item">Buka UKM</a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link m-2 menu-item">Login</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- end of navbar -->

</header>
