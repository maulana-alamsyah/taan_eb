<?php
include("../config/koneksi.php");
if (isset($_SESSION) && $_SESSION['login'] != true) {
  header('location: ../index.php');
}

$pembudidaya = array();

$sqlGetPembudidaya = "SELECT nama_pembudidaya from profil_pembudidaya";
$getPembudidaya = $db->mysqli->query($sqlGetPembudidaya);
foreach ($getPembudidaya as $key => $budidaya) {
  $pembudidaya[$budidaya['nama_pembudidaya']] = $budidaya['nama_pembudidaya'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
                <li class="breadcrumb-item active">Kuisioner</li>
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
            <div id="container-chart">
            </div>
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
  <!-- FLOT CHARTS -->
  <script src="plugins/flot/jquery.flot.js"></script>
  <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
  <script src="plugins/flot/plugins/jquery.flot.resize.js"></script>
  <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
  <script src="plugins/flot/plugins/jquery.flot.pie.js"></script>

  <script>
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
    })
    <?php
      $js = '';
      $tahunCount = "SELECT DISTINCT SUBSTR(tanggal,1,4) as tahun from kuisioner";
      $tahunTotal = $db->mysqli->query($tahunCount);
      $dataPT = array();
      foreach ($tahunTotal as $rowTahun) {
        $tahun = $rowTahun['tahun'];
        $tahunContainer = '`<div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">
                      Tahun '.$tahun.'
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body" id="container-tahun">
                  </div>
                </div>`;
        ';
        $triwulanCount = "SELECT DISTINCT triwulan from kuisioner";
        $triwulanTotal = $db->mysqli->query($triwulanCount);
        foreach ($triwulanTotal as $rowTriwulan) {
          $sqlgetAllSumProduksiTerjual = "SELECT 
              SUM(pt_basah.teripang_pasir + pt_basah.gamat + pt_basah.polos + pt_basah.kuasa + pt_basah.bola) as `Basah (ekor)`,
              SUM(pt_kering.teripang_pasir + pt_kering.gamat + pt_kering.polos + pt_kering.kuasa + pt_kering.bola) as `Kering (kg)`,
              SUM(pt_benih.teripang_pasir + pt_benih.gamat + pt_benih.polos + pt_benih.kuasa + pt_benih.bola) as `Benih (ekor)`,
              SUM(pt_farmasi.teripang_pasir + pt_farmasi.gamat + pt_farmasi.polos + pt_farmasi.kuasa + pt_farmasi.bola) as `Farmasi (kg)`
              FROM kuisioner
              INNER JOIN produksi_terjual as pt_basah
                ON pt_basah.kategori_id = kuisioner.basah_id
              INNER JOIN produksi_terjual as pt_kering
                ON pt_kering.kategori_id = kuisioner.kering_id
              INNER JOIN produksi_terjual as pt_benih
                ON pt_benih.kategori_id = kuisioner.benih_id
              INNER JOIN produksi_terjual as pt_farmasi
                ON pt_farmasi.kategori_id = kuisioner.farmasi_id
              WHERE triwulan = ".$rowTriwulan['triwulan']." AND (SUBSTR(tanggal,1,4) = ".$rowTahun['tahun'].")";
              $getAllSumProduksiTerjual = $db->mysqli->query($sqlgetAllSumProduksiTerjual);
              if($getAllSumProduksiTerjual){
                $data = array();;
                $label = array();
                $i=1;
                foreach ($getAllSumProduksiTerjual as $row) {
                  $allSumProduksiTerjual[$rowTriwulan['triwulan']] = $row;
                }
                foreach ($allSumProduksiTerjual[$rowTriwulan['triwulan']] as $key => $value) {
                  $tempData = [$i, (int)$value];
                  array_push($data, $tempData);
                  $tempLabel = [$i, $key];
                  array_push($label, $tempLabel);
                  $i++;
                }
              }
              $js .= '
              var row = document.createElement("div");
              var col = document.createElement("div");
              var title = document.createElement("h5");
              row.setAttribute("class", "row");
              col.setAttribute("class", "col-md-12 text-center");
              title.innerHTML = "Triwulan '.$rowTriwulan['triwulan'].'";
              col.append(title);
              row.append(col);
              var dom = document.createElement("div");
              dom.setAttribute("id", "bar-chart'.$rowTriwulan['triwulan'].'");
              dom.setAttribute("style", "height: 250px;");
              dom.setAttribute("class", "col-12 col-md-6 mb-4");
              document.querySelector("#container-tahun").append(row);
              document.querySelector("#container-tahun").append(dom);
              var bar_data = {
                data : '.json_encode($data) .',
                bars: { show: true }
              }
              $.plot("#bar-chart'.$rowTriwulan['triwulan'].'", [bar_data], {
                grid  : {
                  borderWidth: 1,
                  borderColor: "#f3f3f3",
                  tickColor  : "#f3f3f3"
                },
                series: {
                   bars: {
                    show: true, barWidth: 0.5, align: "center",
                  },
                },
                colors: ["#3c8dbc"],
                xaxis : {
                  ticks: '.json_encode($label).'
                }
              })
              ';
        }
        echo 'document.querySelector("#container-chart").innerHTML = ' . $tahunContainer;
      }
      
    ?>

    <?= $js ?>
  </script>
  <script>
    var bar_data = {
      data : <?= json_encode($data) ?>,
      bars: { show: true }
    }
    $.plot('#bar-chart', [bar_data], {
      grid  : {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor  : '#f3f3f3'
      },
      series: {
         bars: {
          show: true, barWidth: 0.5, align: 'center',
        },
      },
      colors: ['#3c8dbc'],
      xaxis : {
        ticks: <?=json_encode($label);?>
      }
    })
    </script>
    <!-- OPTIONAL SCRIPTS -->
    <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>