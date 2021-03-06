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
            <img src="{{ !empty(Auth::user()->profile_photo_path) ? asset(Auth::user()->profile_photo_path) : url('image/no_image.jpg') }}" class="user-image" alt="User Image" />
            <span class="d-none d-lg-inline-block">{{ Auth::user()->name }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-right">
            <!-- User image -->
            <li class="dropdown-header">
              <img src="{{ !empty(Auth::user()->profile_photo_path) ? asset(Auth::user()->profile_photo_path) : url('image/no_image.jpg') }}" alt="User Image" />
              <div class="d-inline-block">
                {{ Auth::user()->name }} <small class="pt-1">{{ Auth::user()->email }}</small>
              </div>
            </li>

            <li>
              <a href="{{ route('profile.setting') }}">
                <i class="mdi mdi-account"></i> My Profile
              </a>
            </li>
            <li>
              <a href="{{ route('change.password') }}"> <i class="mdi mdi-settings"></i> Change Password </a>
            </li>

            <li class="dropdown-footer">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a><button type="submit"> <i class="mdi mdi-logout"></i> Log Out </button></a>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

</header>
