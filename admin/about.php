<?php
include("../config/koneksi.php");
if (isset($_SESSION) && $_SESSION['login'] != true) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,&nbsp;initial-scale=1" />
  <title>Taan Eb | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
  <script src="https://kit.fontawesome.com/5a6c86310d.js" crossorigin="anonymous"></script>
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css" />
  <link rel="stylesheet" href="./../assets/css/style.css" />
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.html" class="nav-link">Home</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <label for="checkbox">
            <input type="checkbox" id="darkmode" data-toggle="toggle" data-size="small" />
            <span class="slider round"></span>
          </label>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="dist/img/taan_eb.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Taan Eb</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/ppi.jpg" class="img-circle elevation-2" alt="User Image" />
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/index.php' ? '<a href="index.php" class="nav-link active">' : '<a href="index.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/profil_pembudidaya.php' ? '<a href="profil_pembudidaya.php" class="nav-link active">' : '<a href="profil_pembudidaya.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-users"></i>
              <p>
                Profil Pembudidaya
              </p>
              </a>
            </li>
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/kuisioner.php' ? '<a href="kuisioner.php" class="nav-link active">' : '<a href="kuisioner.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-layer-group"></i>
              <p>
                Kuisioner
              </p>
              </a>
            </li>
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/galeri.php' ? '<a href="galeri.php" class="nav-link active">' : '<a href="galeri.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-images"></i>
              <p>
                Galeri
              </p>
              </a>
            </li>
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/statistika.php' ? '<a href="statistika.php" class="nav-link active">' : '<a href="statistika.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-chart-column"></i>
              <p>
                Statistika
              </p>
              </a>
            </li>
            <li class="nav-item">
              <?= $_SERVER['PHP_SELF'] == '/taan_eb/admin/about.php' ? '<a href="about.php" class="nav-link active">' : '<a href="about.php" class="nav-link">'; ?>
              <i class="nav-icon fas fa-info"></i>
              <p>
                Tentang Aplikasi
              </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <div class="sidebar-custom d-flex justify-content-center">

        <a href="../backend/logout.php" class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Tentang Aplikasi</li>
              </ol>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row" id="isi">
            <div class="card card-primary card-outline w-100">
              <div class="card-body px-5">
                <div class="text-center h3">Taan Eb</div>
                <p style="text-indent: 20px;">
                  Aplikasi ini dibuat untuk memudahkan petugas dalam mengisi kuisioner.
                </p>
                <br>
                <h4>Panduan</h4>
                <ol type="1" class="pr-0">
                  <li>Profil Pembudidaya</li>
                  <ol type="a">
                    <li>
                      Menambahkan Profil Pembudidaya
                    </li>
                    <ul>
                      <li>pilih menu Profil Pembudidaya</li>
                      <li>klik tombol tambah Data</li>
                      <li>masukan data profil pembudidaya</li>
                      <li>klik simpan</li>
                    </ul>
                    <li>
                      Mengubah Profil Pembudidaya
                    </li>
                    <ul>
                      <li>pilih menu Profil Pembudidaya</li>
                      <li>pilih data yang akan diubah</li>
                      <li>klik icon edit</li>
                      <li>masukkan data profil pembudidaya</li>
                      <li>klik simpan</li>
                    </ul>
                    <li>
                      Menghapus Profil Pembudidaya
                    </li>
                    <ul>
                      <li>pilih menu Profil Pembudidaya</li>
                      <li>pilih data yang akan dihapus</li>
                      <li>klik icon hapus</li>
                    </ul>
                  </ol>
                  <li>Kuisioner</li>
                  <ol type="a">
                    <li>
                      Menambahkan Kuisioner
                    </li>
                    <ul>
                      <li>pilih menu Kuisioner</li>
                      <li>klik tombol tambah Data</li>
                      <li>masukan data kuisioner</li>
                      <li>klik simpan</li>
                    </ul>
                    <li>
                      Mengubah Kuisioner
                    </li>
                    <ul>
                      <li>pilih menu Kuisioner</li>
                      <li>pilih data yang akan diubah</li>
                      <li>klik icon edit</li>
                      <li>masukkan data kuisioner</li>
                      <li>klik simpan</li>
                    </ul>
                    <li>
                      Menghapus Kuisioner
                    </li>
                    <ul>
                      <li>pilih menu Kuisioner</li>
                      <li>pilih data yang akan dihapus</li>
                      <li>klik icon hapus</li>
                    </ul>
                  </ol>
                  <li>Galeri</li>
                  <ol type="a">
                    <li>
                      Menambahkan Galeri
                    </li>
                    <ul>
                      <li>pilih menu Galeri</li>
                      <li>pilih data yang akan diubah</li>
                      <li>klik icon Tambah</li>
                      <li>masukkan data Galeri</li>
                      <li>klik simpan</li>
                    </ul>
                    <li>
                      Mengubah Galeri
                    </li>
                    <ul>
                      <li>pilih menu Galeri</li>
                      <li>pilih data yang akan diubah</li>
                      <li>klik icon Update</li>
                      <li>masukkan data Galeri</li>
                      <li>klik simpan</li>
                    </ul>
                  </ol>
                </ol>
              </div>
              <!-- /.card-body-->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022
        <a href="https://taan-eb.com">Taab Eb</a>.</strong>
      All rights reserved.
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="plugins/jszip/jszip.min.js"></script>
  <script src="plugins/pdfmake/pdfmake.min.js"></script>
  <script src="plugins/pdfmake/vfs_fonts.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <script>
    $(document).on("change", "#darkmode", function() {
      if ($(this).is(":checked")) {
        $("body").addClass("dark-mode");
      } else {
        $("body").removeClass("dark-mode");
      }
    });

    $(function() {
      $("#example1").DataTable({
        responsive: true,
        lengthChange: true,
        autoWidth: false,
      });
    });
  </script>

  <!-- OPTIONAL SCRIPTS -->
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>