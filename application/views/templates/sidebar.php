<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">APP PENGGAJIAN</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if ($this->uri->segment(1) == 'dashboard'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if ($this->uri->segment(2) == 'pegawai'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/pegawai') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Data Pegawai</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item <?php if ($this->uri->segment(2) == 'jabatan'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/jabatan') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Jabatan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if ($this->uri->segment(2) == 'kehadiran'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/kehadiran') ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Data Kehadiran</span></a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'potongan'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/potongan') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Data Potongan</span></a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'gaji'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/gaji') ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Data Gaji</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if ($this->uri->segment(2) == 'laporan_gaji'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/laporan_gaji') ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan Gaji</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item <?php if ($this->uri->segment(2) == 'laporan_kehadiran'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/laporan_kehadiran') ?>">
          <i class="fas fa-fw fa-file"></i>
          <span>Laporan Kehadiran</span></a>
      </li>

      <li class="nav-item <?php if ($this->uri->segment(2) == 'slip_gaji'){ echo"active";} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/slip_gaji') ?>">
          <i class="fas fa-fw fa-print"></i>
          <span>Cetak Slip</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('auth/logout') ?>">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
  <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $pengguna['nama_pegawai'];  ?></span>
                <img  class="img-profile rounded-circle" src="<?php echo base_url('assets/upload/'.$pengguna['foto']) ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->