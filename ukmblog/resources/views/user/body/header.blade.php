<header class="main-header " id="header">
  <nav class="navbar navbar-static-top navbar-expand-lg d-flex justify-content-between">
    <!-- Sidebar toggle button -->
    <button id="sidebar-toggler" class="sidebar-toggle">
      <span class="sr-only">Toggle navigation</span>
    </button>

    <div class="navbar-right">
      <ul class="nav navbar-nav">

        <!-- User Account -->
        <li class="dropdown user-menu">
          <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <img src="{{ asset('backend_assets/assets/img/user/user.png') }}" class="user-image" alt="User Image" />
            <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <!-- User image -->
            <li class="dropdown-header">
              <img src="{{ asset('backend_assets/assets/img/user/user.png') }}" class="img-circle" alt="User Image" />
              <div class="d-inline-block">
                {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
              </div>
            </li>

            <li>
              <a href="profile.html">
                <i class="mdi mdi-account"></i> My Profile
              </a>
            </li>
            <li>
              <a href="#"> <i class="mdi mdi-settings"></i> Change Password </a>
            </li>

            <li class="dropdown-footer">
              <a href="{{ route('dev.logout') }}"> <i class="mdi mdi-logout"></i> Log Out </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

</header>
