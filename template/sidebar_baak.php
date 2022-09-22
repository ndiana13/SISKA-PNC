<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../dist/img/pnc.png" alt="SISKA" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">S I S K A | P N C</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../dist/img/<?= $row['foto'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $row['nama_pegawai']; ?></a>
          <span class="right badge badge-info"><?php echo $row['level'] ?></span>
        </div>
      </div>
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column mt-3" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tb_pengajuan.php" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>Pengajuan</p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="tb_pegawai.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pegawai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="acc_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Akun User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tb_jurusan.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jurusan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tb_thn_ajaran.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tahun Ajaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="tb_jns_sk.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis SK</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="tb_print_sk.php" class="nav-link">
              <i class="nav-icon fas fa-envelope-open-text"></i>
              <p>SK</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
  </div>
</aside>