<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset ('img/PTSP.png') }}"  class="brand-image" width="100" height="100" alt="Logo">
      <span class="brand-text font-weight-light"><h3>DUMIK PRO</h3></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset ('img/pemda.png') }}"  >
        </div>
        <div class="info">
            <a href="#" class="d-block">Selamat Datang {{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('admin') }}" class="nav-link {{ request ()->is('admin') ? 'active' : ''}}">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>

        <li class="nav-item">
            <a href="{{ url('admin/kecamatan') }}" class="nav-link {{ request ()->is('admin/kecamatan') ? 'active' : ''}}">
              <i class="nav-icon fas fa-map"></i>
              <p>Kecamatan</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ request ()->is('admin/pemilik','admin/category','admin/umkm') ? 'active' : ''}}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data UMKM
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ url('admin/umkm') }}" class="nav-link {{ request ()->is('admin/umkm') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>UMKM Terdata</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/pemilik') }}" class="nav-link {{ request ()->is('admin/pemilik') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Pemilik UMKM</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/category') }}" class="nav-link {{ request ()->is('admin/category') ? 'active' : ''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Skala Umkm</p>
                </a>
              </li>

            </ul>
        </li>

        <li class="nav-item">
            <a href="{{ url('admin/user') }}" class="nav-link {{ request ()->is('admin/user') ? 'active' : ''}}">
              <i class="nav-icon fas fa-users"></i>
              <p>User</p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link {{ request ()->is('logout') ? 'active' : ''}}">
              <i class="fas fa-power-off mr-2"></i>
              <p>Logout</p>
            </a>
        </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
