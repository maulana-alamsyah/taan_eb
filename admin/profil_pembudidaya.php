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

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="">
  </script>
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
                <li class="breadcrumb-item active">Profil Pembudidaya</li>
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
  <script src="plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
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
    });


    const showFormBantuanEdit = () => {
      const form = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="jenisBantuan">Jenis Bantuan</label>' +
        '<input type="text" class="form-control" id="jenisBantuan" name="jenisBantuan" placeholder="Jenis Bantuan" value="' +
        result[0].jenis_bantuan +
        '" />' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="sumberBantuan">Sumber Bantuan</label>' +
        '<input type="text" class="form-control" id="sumberBantuan" name="sumberBantuan" placeholder="Sumber Bantuan" value="' +
        result[0].sumber_bantuan +
        '" />' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="tahunBantuan">Tahun Bantuan</label>' +
        '<input type="tel" class="form-control" id="tahunBantuan" name="tahunBantuan" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Tahun Bantuan" value="' +
        result[0].tahun_bantuan +
        '" />' +
        "</div>" +
        "</div>" +
        "</div>";

      document.querySelector('#formBantuan').innerHTML = form;
    }

    const showFormBantuan = () => {
      const form = '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="jenisBantuan">Jenis Bantuan</label>' +
        '<input type="text" class="form-control" id="jenisBantuan" name="jenisBantuan" placeholder="Jenis Bantuan" />' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="sumberBantuan">Sumber Bantuan</label>' +
        '<input type="text" class="form-control" id="sumberBantuan" name="sumberBantuan" placeholder="Sumber Bantuan" />' +
        "</div>" +
        "</div>" +
        "</div>" +
        '<div class="row">' +
        '<div class="col-md-12">' +
        '<div class="form-group">' +
        '<label for="tahunBantuan">Tahun Bantuan</label>' +
        '<input type="tel" class="form-control" id="tahunBantuan" name="tahunBantuan" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Tahun Bantuan" />' +
        "</div>" +
        "</div>" +
        "</div>";

      document.querySelector('#formBantuan').innerHTML = form;
    }

    const hideFormBantuan = () => {
      document.querySelector('#formBantuan').innerHTML = '';
    }

    $(document).on("click", "#update", function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Profil pembudidaya akan diupdate",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          const form = document.getElementById('form');
          const formData = new FormData(form);
          $.ajax({
            url: "../backend/updatePembudidaya.php",
            type: "POST",
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              console.log(resp)
              result = JSON.parse(resp);
              if (result != false) {
                Toast.fire({
                  icon: 'success',
                  title: 'Berhasil mengubah profil pembudidaya.'
                })
                setTimeout(() => {
                  taghtml =
                    '<div class="col-12">' +
                    '<div class="card">' +
                    '<div class="card-header">' +
                    '<div class="row">' +
                    '<div class="col-md-6">' +
                    '<h3 class="card-title mt-2">' +
                    '<i class="fa-solid fa-table"></i> Profil Pembudidaya' +
                    "</h3>" +
                    "</div>" +
                    '<div class="col-md-6 d-flex justify-content-end">' +
                    '<button class="btn bg-primary float-end" id="tambahData">' +
                    '<i class="fa-solid fa-plus"></i> Tambah Data' +
                    "</button>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "<!-- /.card-header -->" +
                    '<div class="card-body table-responsive">' +
                    '<table id="example1" class="table table-bordered table-striped">' +
                    "<thead>" +
                    "<tr>" +
                    "<th>No</th>" +
                    "<th>Nama Pembudidaya</th>" +
                    "<th>Aksi</th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody id='dataPembudidaya'>" +
                    "</tbody>" +
                    "</table>" +
                    "</div>" +
                    "<!-- /.card-body -->" +
                    "</div>" +
                    "<!-- /.card -->" +
                    "</div>";
                  $("#isi").html(taghtml);
                  $.ajax({
                    url: "../backend/getPembudidaya.php",
                    type: "GET",
                    cache: false,
                    success: function(resp) {
                      result = JSON.parse(resp);
                      resultTag = "";
                      if (result != false) {
                        for (i = 0; i < result.length; i++) {
                          no = i + 1;
                          resultTag +=
                            "<tr>" +
                            "<td>" +
                            no +
                            "</td>" +
                            "<td>" +
                            result[i].nama_pembudidaya +
                            "</td>" +
                            "<td>" +
                            "<div class='mx-auto container-aksi container-aksi__profil'>" +
                            '<button class="btn-xs btn-success btn-aksi" id="exportPembudidaya" idPembudidaya="' +
                            result[i].profil_pembudidaya_id +
                            '">' +
                            '<i class="fa-solid fa-download"></i>' +
                            "</button>" +
                            '<button class="btn-xs btn-primary btn-aksi" id="editPembudidaya" idPembudidaya="' +
                            result[i].profil_pembudidaya_id +
                            '">' +
                            '<i class="fa-solid fa-pen-to-square"></i>' +
                            "</button>" +
                            ' <button class="btn-xs btn-danger btn-aksi" id="hapusPembudidaya" idPembudidaya="' +
                            result[i].profil_pembudidaya_id +
                            '">' +
                            '<i class="fa-solid fa-trash-can"></i>' +
                            "</button>" +
                            "</div>" +
                            "</td>" +
                            "</tr>";
                        }
                        $("#dataPembudidaya").html(resultTag);
                      } else {
                        resultTag +=
                          "<tr>" +
                          "<td colspan='4' class='text-center'>Data Masih Kosong :)</td>" +
                          "</tr>";
                        $("#dataPembudidaya").html(resultTag);
                      }
                    },
                    error: function() {
                      console.log("error");
                    },
                  });
                }, 3000)
              } else {
                alert("Gagal ubah");
              }
            },
            error: function() {
              console.log("error");
            },
          });
        }
      });
    });

    $(document).on("click", "#hapusPembudidaya", function() {
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Profil pembudidaya akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          var data = new Object();
          data.id = $(this).attr("idPembudidaya");
          console.log(data);
          $.ajax({
            url: "../backend/deletePembudidaya.php",
            type: "POST",
            data: JSON.stringify(data),
            cache: false,
            success: function(resp) {
              console.log(resp);
              if (result != false) {
                Toast.fire({
                  icon: 'success',
                  title: 'Berhasil menghapus profil pembudidaya.'
                })
                window.setInterval('location.reload()', 3000);
              } else {
                alert("Gagal hapus");
              }
            },
            error: function() {
              console.log("error");
            },
          });
        }
      });
    });


    $(document).on("click", "#editPembudidaya", function() {
      var data = new Object();
      data.id = $(this).attr("idPembudidaya");

      $.ajax({
        url: "../backend/getPembudidayaById.php",
        type: "POST",
        data: JSON.stringify(data),
        cache: false,
        success: function(resp) {
          var result = JSON.parse(resp);
          const showFormBantuanEdit = () => {
            const form = '<div class="row">' +
              '<div class="col-md-12">' +
              '<div class="form-group">' +
              '<label for="jenisBantuan">Jenis Bantuan</label>' +
              '<input type="text" class="form-control" id="jenisBantuan" name="jenisBantuan" placeholder="Jenis Bantuan" value="' +
              result[0].jenis_bantuan +
              '" />' +
              "</div>" +
              "</div>" +
              "</div>" +
              '<div class="row">' +
              '<div class="col-md-12">' +
              '<div class="form-group">' +
              '<label for="sumberBantuan">Sumber Bantuan</label>' +
              '<input type="text" class="form-control" id="sumberBantuan" name="sumberBantuan" placeholder="Sumber Bantuan" value="' +
              result[0].sumber_bantuan +
              '" />' +
              "</div>" +
              "</div>" +
              "</div>" +
              '<div class="row">' +
              '<div class="col-md-12">' +
              '<div class="form-group">' +
              '<label for="tahunBantuan">Tahun Bantuan</label>' +
              '<input type="tel" class="form-control" id="tahunBantuan" name="tahunBantuan" maxlength="4" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Tahun Bantuan" value="' +
              result[0].tahun_bantuan +
              '" />' +
              "</div>" +
              "</div>" +
              "</div>";

            document.querySelector('#formBantuan').innerHTML = form;
          }
          resultTag =
            '<div class="card w-100" id="tambahForm">' +
            '<div class="card-header">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<h3 class="card-title mt-2">' +
            '<i class="fa-solid fa-pen-to-square"></i> Edit Profil Pembudidaya' +
            "</h3>" +
            "</div>" +
            '<div class="col-md-6 d-flex justify-content-end">' +
            '<button class="btn bg-secondary float-end" id="kembali">' +
            '<i class="fa-solid fa-arrow-left"></i> Kembali' +
            "</button>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<!-- /.card-header -->" +
            '<div class="card-body">' +
            '<form id="form">' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<input type="hidden" class="form-control" id="idPembudidaya" name="idPembudidaya" value="' +
            result[0].profil_pembudidaya_id +
            '" />' +
            '<div class="form-group">' +
            '<label for="namaPembudidaya">Nama Pembudidaya</label>' +
            '<input type="text" class="form-control" id="namaPembudidaya" name="namaPembudidaya" placeholder="Nama Pembudidaya" value="' +
            result[0].nama_pembudidaya +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            "<!-- row -->" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="nik">NIK</label>' +
            '<input type="text" class="form-control" id="nik" name="nik" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="NIK" value="' +
            result[0].nik +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            "<!-- row -->" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="fotoKTP">Foto KTP</label>' +
            '<div class="custom-file">' +
            '<img class="w-25" height="300" src="../upload/' +
            result[0].foto_ktp +
            '" alt="foto ktp">' +
            '<input type="file" class="custom-file-input" name="fotoKTP" id="fotoKTP">' +
            '<label class="custom-file-label" for="fotoKTP">Upload Foto KTP</label>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="fotoKK">Foto KK</label>' +
            '<div class="custom-file">' +
            '<img class="w-25" height="300" src="../upload/' +
            result[0].foto_kk +
            '" alt="foto kk">' +
            '<input type="file" class="custom-file-input" id="fotoKK" name="fotoKK">' +
            '<label class="custom-file-label" for="fotoKK">Upload Foto KK</label>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="fotoLokasi">Foto Lokasi</label>' +
            '<div class="custom-file">' +
            '<img class="w-25" height="300" src="../upload/' +
            result[0].foto_lokasi +
            '" alt="foto lokasi">' +
            '<input type="file" class="custom-file-input" id="fotoLokasi" name="fotoLokasi">' +
            '<label class="custom-file-label" for="fotoLokasi">Upload Foto Lokasi</label>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="fotoJenis">Foto Jenis Teripang</label>' +
            '<div class="custom-file">' +
            '<img class="w-25" height="300" src="../upload/' +
            result[0].foto_jenis_teripang +
            '" alt="foto jenis">' +
            '<input type="file" class="custom-file-input" id="fotoJenis" name="fotoJenis">' +
            '<label class="custom-file-label" for="fotoJenis">Upload Foto Jenis Teripang</label>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="alamat">Alamat</label>' +
            '<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" value="' +
            result[0].alamat +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="no_hp">No HP</label>' +
            '<input type="tel" class="form-control" id="no_hp" placeholder="No HP" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="no_hp" value="' +
            result[0].no_hp +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="lokasi">Lokasi Budidaya</label>' +
            '<select class="form-control" id="lokasi" name="lokasi">' +
            '<option value="Taar" ' +
            (result[0].lokasi_budidaya == "Taar" ? "selected" : "") +
            '>Taar</option>' +
            '<option value="Mangon" ' +
            (result[0].lokasi_budidaya == "Mangon" ? "selected" : "") +
            '>Mangon</option>' +
            '<option value="Lebetawi" ' +
            (result[0].lokasi_budidaya == "Lebetawi" ? "selected" : "") +
            '>Lebetawi</option>' +
            '<option value="Ohoitel" ' +
            (result[0].lokasi_budidaya == "Ohoitel" ? "selected" : "") +
            '>Ohoitel</option>' +
            '<option value="Yamtel" ' +
            (result[0].lokasi_budidaya == "Yamtel" ? "selected" : "") +
            '>Yamtel</option>' +
            '<option value="Dullah" ' +
            (result[0].lokasi_budidaya == "Dullah" ? "selected" : "") +
            '>Dullah</option>' +
            '</select>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="titikKoordinat">Titik Koordinat</label>' +
            '<input type="text" class="form-control" id="titikKoordinat" placeholder="Titik Koordinat" name="titikKoordinat" value="' +
            result[0].titik_koordinat +
            '" />' +
            '<div id="mapEdit" style="border-radius: 8px; width: 100%; height: 400px"></div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="luasLahan">Luas Lahan</label>' +
            '<input type="number" class="form-control" id="luasLahan" placeholder="Luas Lahan" name="luasLahan" value="' +
            result[0].luas_lahan +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="luasLahanTerpakai">Luas Lahan Terpakai</label>' +
            '<input type="number" class="form-control" id="luasLahanTerpakai" placeholder="Luas Lahan Terpakai" name="luasLahanTerpakai" value="' +
            result[0].luas_lahan_terpakai +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="parameterPerairan">Parameter Kualitas Perairan</label>' +
            '<input type="text" class="form-control mb-1" id="parameterPerairanFisik" name="parameterPerairanFisik" placeholder="Fisik" value="' +
            result[0].parameter_fisik +
            '" />' +
            '<input type="text" class="form-control" id="parameterPerairanKimia" name="parameterPerairanKimia" placeholder="Kimia" value="' +
            result[0].parameter_kimia +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="jenisKomoditas">Jenis Komoditas Teripang</label>' +
            '<input type="text" class="form-control" id="jenisKomoditas" name="jenisKomoditas" placeholder="Jenis Komoditas Teripang" value="' +
            result[0].jenis_komoditas +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="metodeBudidaya">Metode Budidaya</label>' +
            '<input type="text" class="form-control" id="metodeBudidaya" name="metodeBudidaya" placeholder="Metode Budidaya" value="' +
            result[0].metode_budidaya +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="punyaKartu">Punya Kartu Kusuka</label>' +
            '<div class="form-check d-flex gap-2">' +
            `<input class="form-check-input" type="radio" id="punyaKartuYa" value="Ya" name="punyaKartu" ${((result[0].punya_kartu_kusuka == 'Ya') ? 'checked' : '')}>` +
            '<label class="form-check-label" for="Ya">Ya</label>' +
            '</div>' +
            '<div class="form-check d-flex gap-2">' +
            `<input class="form-check-input" type="radio" id="punyaKartuTidak" value="Tidak" name="punyaKartu" ${((result[0].punya_kartu_kusuka == 'Tidak') ? 'checked' : '')}>` +
            '<label class="form-check-label" for="Tidak">Tidak</label>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="dapatBantuan">Sudah Pernah Dapat Bantuan</label>' +
            '<div class="d-flex">' +
            '<div class="form-check mr-4">' +
            `<input class="form-check-input" type="radio" id="dapatBantuanYa" value="Ya" name="dapatBantuan" onClick="showFormBantuanEdit()" ${((result[0].dapat_bantuan == 'Ya') ? 'checked' : '')}>` +
            '<label class="form-check-label" for="dapatBantuanYa">Ya</label>' +
            '</div>' +
            '<div class="form-check d-flex gap-2">' +
            `<input class="form-check-input" type="radio" id="dapatBantuanTidak" value="Tidak" name="dapatBantuan" onClick="hideFormBantuan()" ${((result[0].dapat_bantuan == 'Tidak') ? 'checked' : '')}>` +
            '<label class="form-check-label" for="dapatBantuanTidak">Tidak</label>' +
            '</div>' +
            '</div>' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div id="formBantuan"></div>' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="kendala">Kendala Yang Dihadapi</label>' +
            '<input type="text" class="form-control" id="kendala" name="kendala" placeholder="Kendala Yang Dihadapi" value="' +
            result[0].kendala +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="solusi">Solusi</label>' +
            '<input type="text" class="form-control" id="solusi" name="solusi" placeholder="Solusi" value="' +
            result[0].solusi +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="tahunMulai">Tahun Mulai</label>' +
            '<input type="tel" maxlength="4" class="form-control" id="tahunMulai" name="tahunMulai" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Tahun Mulai" value="' +
            result[0].tahun_mulai +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="pengeluaranUsaha">Pengeluaran Usaha Budidaya Teripang</label>' +
            '<input type="text" class="form-control" id="pengeluaranUsaha" name="pengeluaranUsaha" placeholder="Pengeluaran Usaha Budidaya Teripang" value="' +
            result[0].pengeluaran +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="namaPembeli">Nama Pembeli</label>' +
            '<input type="text" class="form-control" id="namaPembeli" name="namaPembeli" placeholder="Nama Pembeli" value="' +
            result[0].nama_pembeli +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<div class="form-group">' +
            '<label for="noHPPembeli">Nomor HP Pembeli</label>' +
            '<input type="tel" class="form-control" id="noHPPembeli" name="noHPPembeli" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Nomor HP Pembeli" value="' +
            result[0].no_hp_pembeli +
            '" />' +
            "</div>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<!-- /.card-body -->" +
            '<div class="card-footer d-flex justify-content-end">' +
            '<button type="submit" class="btn btn-primary mr-2" id="update">' +
            '<i class="fa-solid fa-floppy-disk"></i> Simpan' +
            "</button>" +
            '<button type="reset" onclick="reset()" class="btn btn-primary">' +
            '<i class="fa-solid fa-arrows-rotate"></i> Reset' +
            "</button>" +
            "</form>" +
            "</div>" +
            "</div>";
          $("#isi").html(resultTag);

          $(function() {
            bsCustomFileInput.init();
          });

          $('#btn_submit').click(function() {
            var file_val = $('.file').val();
            if (file_val == "") {
              alert("Please select file.");
              return false;
            }
          });
          $(".add").click(function() {
            $(".file_container").append("<p><input type='file' name='ktp[]' class='file' multiple /><button type='button' class='delete_ btn btn-danger' title='Delete file'><span class='glyphicon glyphicon-remove'></span> Delete file</button> </p>");
          });
          $('.file_container').on('click', '.delete_', function() {
            $(this).parents('p').remove();
          });

          var koordinat = document.getElementById("titikKoordinat").value.split(', ').map(Number);
          console.log(koordinat);
          var mapEdit = L.map("mapEdit").setView(
            koordinat,
            13
          );

          //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
          L.tileLayer(
            "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
              maxZoom: 18,
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              id: "mapbox/streets-v11",
              tileSize: 512,
              zoomOffset: -1,
            }
          ).addTo(mapEdit);

          var marker = L.marker(koordinat)
            .addTo(mapEdit)
            .bindPopup("<b>Letak titik koordinat yang kamu pilih</b>");

          function onMapClick(e) {
            var lat = (e.latlng.lat);
            var lng = (e.latlng.lng);
            document.querySelector('#titikKoordinat').value = `${lat}, ${lng}`;
            marker.setLatLng([lat, lng]).update();
          }

          mapEdit.on('click', onMapClick);

          if ((result[0].dapat_bantuan == 'Ya')) {
            showFormBantuanEdit();
          }

        },
        error: function() {
          console.log("error");
        },
      });
    });

    $(document).on("click", "#exportPembudidaya", function() {
      var data = new Object();
      data.id = $(this).attr("idPembudidaya");

      window.location.href = "./exportProfil.php?id=" + data.id;

      /* $.ajax({
        url: "./exportProfil.php",
        type: "POST",
        data: JSON.stringify(data),
        cache: false,
        success: function(resp) {
          // var result = JSON.parse(resp);
          console.log(resp);
        },
        error: function(error) {
          console.log(error);
        },
      }); */
    });

    $(document).on("click", "#simpan", function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Profil pembudidaya akan disimpan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          const form = document.getElementById('form');
          const formData = new FormData(form);

          const output = document.getElementById('output');

          $.ajax({
            url: "../backend/addPembudidaya.php",
            type: "POST",
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              console.log(resp);
              Toast.fire({
                icon: 'success',
                title: 'Berhasil menyimpan profil pembudidaya.'
              })
              setTimeout(() => {
                taghtml =
                  '<div class="col-12">' +
                  '<div class="card">' +
                  '<div class="card-header">' +
                  '<div class="row">' +
                  '<div class="col-md-6">' +
                  '<h3 class="card-title mt-2">' +
                  '<i class="fa-solid fa-table"></i> Profil Pembudidaya' +
                  "</h3>" +
                  "</div>" +
                  '<div class="col-md-6 d-flex justify-content-end">' +
                  '<button class="btn bg-primary float-end" id="tambahData">' +
                  '<i class="fa-solid fa-plus"></i> Tambah Data' +
                  "</button>" +
                  "</div>" +
                  "</div>" +
                  "</div>" +
                  "<!-- /.card-header -->" +
                  '<div class="card-body table-responsive">' +
                  '<table id="example1" class="table table-bordered table-striped">' +
                  "<thead>" +
                  "<tr>" +
                  "<th>No</th>" +
                  "<th>Nama Pembudidaya</th>" +
                  "<th>Aksi</th>" +
                  "</tr>" +
                  "</thead>" +
                  "<tbody id='dataPembudidaya'>" +
                  "</tbody>" +
                  "</table>" +
                  "</div>" +
                  "<!-- /.card-body -->" +
                  "</div>" +
                  "<!-- /.card -->" +
                  "</div>";
                $("#isi").html(taghtml);
                $.ajax({
                  url: "../backend/getPembudidaya.php",
                  type: "GET",
                  cache: false,
                  success: function(resp) {
                    result = JSON.parse(resp);
                    resultTag = "";
                    if (result != false) {
                      for (i = 0; i < result.length; i++) {
                        no = i + 1;
                        resultTag +=
                          "<tr>" +
                          "<td>" +
                          no +
                          "</td>" +
                          "<td>" +
                          result[i].nama_pembudidaya +
                          "</td>" +
                          "<td>" +
                          "<div class='mx-auto container-aksi container-aksi__profil'>" +
                          '<button class="btn-xs btn-success btn-aksi" id="exportPembudidaya" idPembudidaya="' +
                          result[i].profil_pembudidaya_id +
                          '">' +
                          '<i class="fa-solid fa-download"></i>' +
                          "</button>" +
                          '<button class="btn-xs btn-primary btn-aksi" id="editPembudidaya" idPembudidaya="' +
                          result[i].profil_pembudidaya_id +
                          '">' +
                          '<i class="fa-solid fa-pen-to-square"></i>' +
                          "</button>" +
                          ' <button class="btn-xs btn-danger btn-aksi" id="hapusPembudidaya" idPembudidaya="' +
                          result[i].profil_pembudidaya_id +
                          '">' +
                          '<i class="fa-solid fa-trash-can"></i>' +
                          "</button>" +
                          "</div>" +
                          "</td>" +
                          "</tr>";
                      }
                      $("#dataPembudidaya").html(resultTag);
                    } else {
                      resultTag +=
                        "<tr>" +
                        "<td colspan='4' class='text-center'>Data Masih Kosong :)</td>" +
                        "</tr>";
                      $("#dataPembudidaya").html(resultTag);
                    }
                  },
                  error: function() {
                    console.log("error");
                  },
                });
              }, 3000)
            },
            error: function() {
              console.log("error");
            },
          });
        }
      })
    });


    $(document).on("change", "#darkmode", function() {
      if ($(this).is(":checked")) {
        $("body").addClass("dark-mode");
      } else {
        $("body").removeClass("dark-mode");
      }
    });

    var formTambah =
      '<div class="card w-100" id="tambahForm">' +
      '<div class="card-header">' +
      '<div class="row">' +
      '<div class="col-md-6">' +
      '<h3 class="card-title mt-2">' +
      '<i class="fa-solid fa-pen-to-square"></i> Tambah Profil Pembudidaya' +
      "</h3>" +
      "</div>" +
      '<div class="col-md-6 d-flex justify-content-end">' +
      '<button class="btn bg-secondary float-end" id="kembali">' +
      '<i class="fa-solid fa-arrow-left"></i> Kembali' +
      "</button>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "<!-- /.card-header -->" +
      '<div class="card-body">' +
      '<form id="form">' +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="namaPembudidaya">Nama Pembudidaya</label>' +
      '<input type="text" class="form-control" id="namaPembudidaya" name="namaPembudidaya" placeholder="Nama Pembudidaya" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="nik">NIK</label>' +
      '<input type="number" class="form-control" id="nik" name="nik" maxlength="16" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="NIK" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="fotoKTP">Foto KTP</label>' +
      '<div class="custom-file">' +
      '<input type="file" class="custom-file-input" name="fotoKTP" id="fotoKTP">' +
      '<label class="custom-file-label" for="fotoKTP">Upload Foto KTP</label>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="fotoKK">Foto KK</label>' +
      '<div class="custom-file">' +
      '<input type="file" class="custom-file-input" id="fotoKK" name="fotoKK">' +
      '<label class="custom-file-label" for="fotoKK">Upload Foto KK</label>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="fotoLokasi">Foto Lokasi</label>' +
      '<div class="custom-file">' +
      '<input type="file" class="custom-file-input" id="fotoLokasi" name="fotoLokasi">' +
      '<label class="custom-file-label" for="fotoLokasi">Upload Foto Lokasi</label>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="fotoJenis">Foto Jenis Teripang</label>' +
      '<div class="custom-file">' +
      '<input type="file" class="custom-file-input" id="fotoJenis" name="fotoJenis">' +
      '<label class="custom-file-label" for="fotoJenis">Upload Foto Jenis Teripang</label>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="alamat">Alamat</label>' +
      '<input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="no_hp">No HP</label>' +
      '<input type="tel" class="form-control" id="no_hp" placeholder="No HP" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="no_hp" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="lokasi">Lokasi Budidaya</label>' +
      '<select class="form-control" id="lokasi" name="lokasi">' +
      '<option value="Taar">Taar</option>' +
      '<option value="Mangon">Mangon</option>' +
      '<option value="Lebetawi">Lebetawi</option>' +
      '<option value="Ohoitel">Ohoitel</option>' +
      '<option value="Yamtel">Yamtel</option>' +
      '<option value="Dullah">Dullah</option>' +
      '</select>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="titikKoordinat">Titik Koordinat</label>' +
      '<input type="text" class="form-control" id="titikKoordinat" placeholder="Titik Koordinat" name="titikKoordinat" />' +
      '<div id="map" style="border-radius: 8px; width: 100%; height: 400px"></div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="luasLahan">Luas Lahan</label>' +
      '<input type="number" class="form-control" id="luasLahan" placeholder="Luas Lahan" name="luasLahan" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="luasLahanTerpakai">Luas Lahan Terpakai</label>' +
      '<input type="number" class="form-control" id="luasLahanTerpakai" placeholder="Luas Lahan Terpakai" name="luasLahanTerpakai" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="parameterPerairan">Parameter Kualitas Perairan</label>' +
      '<input type="text" class="form-control mb-1" id="parameterPerairanFisik" name="parameterPerairanFisik" placeholder="Fisik" />' +
      '<input type="text" class="form-control" id="parameterPerairanKimia" name="parameterPerairanKimia" placeholder="Kimia" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="jenisKomoditas">Jenis Komoditas Teripang</label>' +
      '<input type="text" class="form-control" id="jenisKomoditas" name="jenisKomoditas" placeholder="Jenis Komoditas Teripang" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="metodeBudidaya">Metode Budidaya</label>' +
      '<input type="text" class="form-control" id="metodeBudidaya" name="metodeBudidaya" placeholder="Metode Budidaya" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="punyaKartu">Punya Kartu Kusuka</label>' +
      '<div class="form-check d-flex gap-2">' +
      '<input class="form-check-input" type="radio" id="punyaKartuYa" value="Ya" name="punyaKartu">' +
      '<label class="form-check-label" for="Ya">Ya</label>' +
      '</div>' +
      '<div class="form-check d-flex gap-2">' +
      '<input class="form-check-input" type="radio" id="punyaKartuTidak" value="Tidak" name="punyaKartu">' +
      '<label class="form-check-label" for="Tidak">Tidak</label>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="dapatBantuan">Sudah Pernah Dapat Bantuan</label>' +
      '<div class="d-flex">' +
      '<div class="form-check mr-4">' +
      '<input class="form-check-input" type="radio" id="dapatBantuanYa" value="Ya" name="dapatBantuan" onClick="showFormBantuan()">' +
      '<label class="form-check-label" for="dapatBantuanYa">Ya</label>' +
      '</div>' +
      '<div class="form-check d-flex gap-2">' +
      '<input class="form-check-input" type="radio" id="dapatBantuanTidak" value="Tidak" name="dapatBantuan" onClick="hideFormBantuan()">' +
      '<label class="form-check-label" for="dapatBantuanTidak">Tidak</label>' +
      '</div>' +
      '</div>' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div id="formBantuan"></div>' +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="kendala">Kendala Yang Dihadapi</label>' +
      '<input type="text" class="form-control" id="kendala" name="kendala" placeholder="Kendala Yang Dihadapi" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="solusi">Solusi</label>' +
      '<input type="text" class="form-control" id="solusi" name="solusi" placeholder="Solusi" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="tahunMulai">Tahun Mulai</label>' +
      '<input type="tel" maxLength="4" class="form-control" id="tahunMulai" name="tahunMulai" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Tahun Mulai" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="pengeluaranUsaha">Pengeluaran Usaha Budidaya Teripang</label>' +
      '<input type="text" class="form-control" id="pengeluaranUsaha" name="pengeluaranUsaha" placeholder="Pengeluaran Usaha Budidaya Teripang" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="namaPembeli">Nama Pembeli</label>' +
      '<input type="text" class="form-control" id="namaPembeli" name="namaPembeli" placeholder="Nama Pembeli" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      '<div class="row">' +
      '<div class="col-md-12">' +
      '<div class="form-group">' +
      '<label for="noHPPembeli">Nomor HP Pembeli</label>' +
      '<input type="tel" class="form-control" id="noHPPembeli" name="noHPPembeli" maxlength="13" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Nomor HP Pembeli" />' +
      "</div>" +
      "</div>" +
      "</div>" +
      "</div>" +
      "<!-- /.card-body -->" +
      '<div class="card-footer d-flex justify-content-end">' +
      '<button type="submit" class="btn btn-primary mr-2" id="simpan">' +
      '<i class="fa-solid fa-floppy-disk"></i> Simpan' +
      "</button>" +
      '<button type="reset" onclick="reset()" class="btn btn-primary">' +
      '<i class="fa-solid fa-arrows-rotate"></i> Reset' +
      "</button>" +
      "</form>" +
      "</div>" +
      "</div>";

    function reset() {
      document.getElementById("namaPembudidaya").value = "";
    }

    $(document).on("click", "#kembali", function() {
      taghtml =
        '<div class="col-12">' +
        '<div class="card">' +
        '<div class="card-header">' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<h3 class="card-title mt-2">' +
        '<i class="fa-solid fa-table"></i> Profil Pembudidaya' +
        "</h3>" +
        "</div>" +
        '<div class="col-md-6 d-flex justify-content-end">' +
        '<button class="btn bg-primary float-end" id="tambahData">' +
        '<i class="fa-solid fa-plus"></i> Tambah Data' +
        "</button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<!-- /.card-header -->" +
        '<div class="card-body table-responsive">' +
        '<table id="example1" class="table table-bordered table-striped">' +
        "<thead>" +
        "<tr>" +
        "<th>No</th>" +
        "<th>Nama Pembudidaya</th>" +
        "<th>Aksi</th>" +
        "</tr>" +
        "</thead>" +
        "<tbody id='dataPembudidaya'>" +
        "</tbody>" +
        "</table>" +
        "</div>" +
        "<!-- /.card-body -->" +
        "</div>" +
        "<!-- /.card -->" +
        "</div>";
      $("#isi").html(taghtml);

      $.ajax({
        url: "../backend/getPembudidaya.php",
        type: "GET",
        cache: false,
        success: function(resp) {
          result = JSON.parse(resp);
          resultTag = "";
          if (result != false) {
            for (i = 0; i < result.length; i++) {
              no = i + 1;
              resultTag +=
                "<tr>" +
                "<td>" +
                no +
                "</td>" +
                "<td>" +
                result[i].nama_pembudidaya +
                "</td>" +
                "<td>" +
                "<div class='mx-auto container-aksi container-aksi__profil'>" +
                '<button class="btn-xs btn-success btn-aksi" id="exportPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-download"></i>' +
                "</button>" +
                '<button class="btn-xs btn-primary btn-aksi" id="editPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-pen-to-square"></i>' +
                "</button>" +
                ' <button class="btn-xs btn-danger btn-aksi" id="hapusPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-trash-can"></i>' +
                "</button>" +
                "</div>" +
                "</td>" +
                "</tr>";
            }
            $("#dataPembudidaya").html(resultTag);
          } else {
            resultTag +=
              "<tr>" +
              "<td colspan='4' class='text-center'>Data Masih Kosong :)</td>" +
              "</tr>";
            $("#dataPembudidaya").html(resultTag);
          }
        },
        error: function() {
          console.log("error");
        },
      });
    });

    $(document).on("click", "#tambahData", function() {
      $("#isi").html(formTambah);


      $(function() {
        bsCustomFileInput.init();
      });

      $('#btn_submit').click(function() {
        var file_val = $('.file').val();
        if (file_val == "") {
          alert("Please select file.");
          return false;
        }
      });
      $(".add").click(function() {
        $(".file_container").append("<p><input type='file' name='ktp[]' class='file' multiple /><button type='button' class='delete_ btn btn-danger' title='Delete file'><span class='glyphicon glyphicon-remove'></span> Delete file</button> </p>");
      });
      $('.file_container').on('click', '.delete_', function() {
        $(this).parents('p').remove();
      });

      var lokasi = document.getElementById("lokasi");

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      }

      function showPosition(position) {
        var map = L.map("map").setView(
          [position.coords.latitude, position.coords.longitude],
          13
        );

        //setting maps menggunakan api mapbox bukan google maps, daftar dan dapatkan token
        L.tileLayer(
          "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
              '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
              'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/streets-v11",
            tileSize: 512,
            zoomOffset: -1,
          }
        ).addTo(map);

        var marker = L.marker([position.coords.latitude, position.coords.longitude])
          .addTo(map)
          .bindPopup("<b>Letak titik koordinat yang kamu pilih</b>");

        function onMapClick(e) {
          var lat = (e.latlng.lat);
          var lng = (e.latlng.lng);
          document.querySelector('#titikKoordinat').value = `${lat}, ${lng}`;
          marker.setLatLng([lat, lng]).update();
        }

        map.on('click', onMapClick);

      }


    });


    $(document).ready(function() {
      taghtml =
        '<div class="col-12">' +
        '<div class="card">' +
        '<div class="card-header">' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<h3 class="card-title mt-2">' +
        '<i class="fa-solid fa-table"></i> Profil Pembudidaya' +
        "</h3>" +
        "</div>" +
        '<div class="col-md-6 d-flex justify-content-end">' +
        '<button class="btn bg-primary float-end" id="tambahData">' +
        '<i class="fa-solid fa-plus"></i> Tambah Data' +
        "</button>" +
        "</div>" +
        "</div>" +
        "</div>" +
        "<!-- /.card-header -->" +
        '<div class="card-body table-responsive">' +
        '<table id="example1" class="table table-bordered table-striped">' +
        "<thead>" +
        "<tr>" +
        "<th>No</th>" +
        "<th>Nama Pembudidaya</th>" +
        "<th>Aksi</th>" +
        "</tr>" +
        "</thead>" +
        "<tbody id='dataPembudidaya'>" +
        "</tbody>" +
        "</table>" +
        "</div>" +
        "<!-- /.card-body -->" +
        "</div>" +
        "<!-- /.card -->" +
        "</div>";
      $("#isi").html(taghtml);

      $.ajax({
        url: "../backend/getPembudidaya.php",
        type: "GET",
        cache: false,
        success: function(resp) {
          console.log(resp);
          result = JSON.parse(resp);
          resultTag = "";
          if (result != false) {
            for (i = 0; i < result.length; i++) {
              no = i + 1;
              resultTag +=
                "<tr>" +
                "<td>" +
                no +
                "</td>" +
                "<td>" +
                result[i].nama_pembudidaya +
                "</td>" +
                "<td>" +
                "<div class='mx-auto container-aksi container-aksi__profil'>" +
                '<button class="btn-xs btn-success btn-aksi" id="exportPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-download"></i>' +
                "</button>" +
                '<button class="btn-xs btn-primary btn-aksi" id="editPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-pen-to-square"></i>' +
                "</button>" +
                ' <button class="btn-xs btn-danger btn-aksi" id="hapusPembudidaya" idPembudidaya="' +
                result[i].profil_pembudidaya_id +
                '">' +
                '<i class="fa-solid fa-trash-can"></i>' +
                "</button>" +
                "</div>" +
                "</td>" +
                "</tr>";
            }
            $("#dataPembudidaya").html(resultTag);
          } else {
            resultTag +=
              "<tr>" +
              "<td colspan='4' class='text-center'>Data Masih Kosong :)</td>" +
              "</tr>";
            $("#dataPembudidaya").html(resultTag);
          }
        },
        error: function() {
          console.log("error");
        },
      });
    });
  </script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>