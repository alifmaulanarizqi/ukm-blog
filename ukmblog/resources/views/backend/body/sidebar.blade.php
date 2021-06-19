<aside class="left-sidebar bg-sidebar">
  <div id="sidebar" class="sidebar sidebar-with-footer">
    <!-- Aplication Brand -->
    <div class="app-brand sidebar-logo">
      <a href="{{ url('/dashboard') }}">
         <p class="navbar-brand mr-0"><span class="font-weight-bold">UKM</span></p>
        </svg>
        <span class="brand-name ml-0">BLOG - Dashboard</span>
      </a>
    </div>
    <!-- begin sidebar scrollbar -->
    <div class="sidebar-scrollbar">

      <!-- sidebar menu -->
      @php
          $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
          $urlParts = explode('/', str_ireplace(array('http://', 'https://'), '', $actual_link));
      @endphp

      <ul class="nav sidebar-inner" id="sidebar-menu">

          <li class="has-sub <?php if($urlParts[1] == 'dashboard') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="{{ route('dashboard') }}">
              <i class="mdi mdi-view-dashboard-outline"></i>
              <span class="nav-text">Dashboard</span>
            </a>
          </li>

          @can('ukm_access')
          <li class="has-sub <?php if($urlParts[1] == 'ukm') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ukm"
              aria-expanded="false" aria-controls="ukm">
              <i class="mdi mdi-folder-multiple-outline"></i>
              <span class="nav-text">UKM</span> <b class="caret"></b>
            </a>
            <ul class="collapse <?php if($urlParts[1] == 'ukm') echo "show"; ?>" id="ukm"
              data-parent="#sidebar-menu">
              <div class="sub-menu">

                <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'ukm') { if($urlParts[2] == 'all') echo "active"; }  } ?>">
                  <a class="sidenav-item-link" href="{{ route('ukm.semua') }}">
                    <span class="nav-text">Semua UKM</span>
                  </a>
                </li>

                <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'ukm') { if($urlParts[2] == 'pendaftar') echo "active"; }  } ?>">
                  <a class="sidenav-item-link" href="{{ route('ukm.pendaftar') }}">
                    <span class="nav-text">UKM Pendaftar</span>
                  </a>
                </li>

              </div>
            </ul>
          </li>
          @endcan

          @can('kategori_access')
          <li class="has-sub <?php if($urlParts[1] == 'kategori') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="{{ route('kategori') }}">
              <i class="mdi mdi-text-subject"></i>
              <span class="nav-text">Kategori</span>
            </a>
          </li>
          @endcan

          @can('post_access')
          <li class="has-sub <?php if($urlParts[1] == 'post') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="{{ route('post') }}">
              <i class="mdi mdi-folder-edit"></i>
              <span class="nav-text">Post</span>
            </a>
          </li>
          @endcan

          @can('user_access')
          <li class="has-sub <?php if($urlParts[1] == 'anggota') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#user"
              aria-expanded="false" aria-controls="user">
              <i class="mdi mdi-account"></i>
              <span class="nav-text">User</span> <b class="caret"></b>
            </a>
            <ul class="collapse <?php if($urlParts[1] == 'anggota') echo "show"; ?>" id="user"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                    <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'anggota') { if($urlParts[2] == 'all') echo "active"; }  } ?>">
                      <a class="sidenav-item-link" href="{{ route('anggota.ukm') }}">
                        <span class="nav-text">Anggota</span>
                      </a>
                    </li>
                    <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'anggota') { if($urlParts[2] == 'pendaftar') echo "active"; }  } ?>">
                      <a class="sidenav-item-link" href="{{ route('pendaftar.ukm') }}">
                        <span class="nav-text">Pendaftar</span>
                      </a>
                    </li>
              </div>
            </ul>
          </li>
          @endcan

          @can('laporan_access')
          <li class="has-sub <?php if($urlParts[1] == 'laporan') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="{{ route('laporan') }}">
              <i class="mdi mdi-file-document"></i>
              <span class="nav-text">Laporan</span>
            </a>
          </li>
          @endcan

          @can('setting_access')
          <li class="has-sub <?php if($urlParts[1] == 'pengaturan') echo "active expand"; ?>">
            <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#pengaturan"
              aria-expanded="false" aria-controls="pengaturan">
              <i class="mdi mdi-settings"></i>
              <span class="nav-text">Pengaturan</span> <b class="caret"></b>
            </a>
            <ul class="collapse <?php if($urlParts[1] == 'pengaturan') echo "show"; ?>" id="pengaturan"
              data-parent="#sidebar-menu">
              <div class="sub-menu">
                    <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'pengaturan') { if($urlParts[2] == 'livetv') echo "active"; }  } ?>">
                      <a class="sidenav-item-link" href="{{ route('pengaturan.livetv') }}">
                        <span class="nav-text">Live Tv</span>
                      </a>
                    </li>
                    <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'pengaturan') { if($urlParts[2] == 'sosial-media') echo "active"; }  } ?>">
                      <a class="sidenav-item-link" href="{{ route('pengaturan.sosial') }}">
                        <span class="nav-text">Sosial Media</span>
                      </a>
                    </li>
                    <li class="<?php if(!empty($urlParts[2])) { if($urlParts[1] == 'pengaturan') { if($urlParts[2] == 'buka-pendaftaran') echo "active"; }  } ?>">
                      <a class="sidenav-item-link" href="{{ route('pengaturan.bukapendaftaran') }}">
                        <span class="nav-text">Buka Pendaftaran</span>
                      </a>
                    </li>
              </div>
            </ul>
          </li>
          @endcan

      </ul>

    </div>

  </div>
</aside>
