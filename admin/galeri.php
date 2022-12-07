<?php
include("../config/koneksi.php");
if (isset($_SESSION) && $_SESSION['login'] != true) {
  header('location: ../index.php');
}

$formTambah = '`<div class="card w-100" id="tambahForm">
        <div class="card-header">
        <div class="row">
        <div class="col-md-6">
        <h3 class="card-title mt-2">
        <i class="fa-solid fa-pen-to-square"></i> Tambah Data Kuisioner
        </h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
        <button class="btn bg-secondary float-end" id="kembali">
        <i class="fa-solid fa-arrow-left"></i> Kembali
        </button>
        </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form id="form">
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="foto">Foto</label>
        <div class="custom-file">
        <input type="file" class="custom-file-input" name="foto" id="foto">
        <label class="custom-file-label" for="foto">Upload Foto</label>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal" />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <select class="form-control" id="lokasi" name="lokasi">
        <option value="Taar">Taar</option>
        <option value="Mangon">Mangon</option>
        <option value="Lebetawi">Lebetawi</option>
        <option value="Ohoitel">Ohoitel</option>
        <option value="Yamtel">Yamtel</option>
        <option value="Dullah">Dullah</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="Keterangan" placeholder="Keterangan" name="keterangan"></textarea>
        </div>
        </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-2" id="simpan">
        <i class="fa-solid fa-floppy-disk"></i> Simpan
        </button>
        <button type="reset" onclick="reset()" class="btn btn-primary">
        <i class="fa-solid fa-arrows-rotate"></i> Reset
        </button>
        </form>
        </div>
        </div>`';

$formEdit = '`<div class="card w-100" id="tambahForm">
        <div class="card-header">
        <div class="row">
        <div class="col-md-6">
        <h3 class="card-title mt-2">
        <i class="fa-solid fa-pen-to-square"></i> Tambah Data Kuisioner
        </h3>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
        <button class="btn bg-secondary float-end" id="kembali">
        <i class="fa-solid fa-arrow-left"></i> Kembali
        </button>
        </div>
        </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form id="form">
        <div class="row">
        <div class="col-md-6">
        <input type="hidden" class="form-control" id="idGaleri" name="idGaleri" value="${result[0].galeri_id}"/>
        <div class="form-group">
        <label for="foto">Foto</label>
        <div class="custom-file">
        <img class="w-25" height="300" src="../upload/galeri/${result[0].foto}" alt="foto ktp">
        <input type="file" class="custom-file-input" name="foto" id="foto">
        <label class="custom-file-label" for="foto">Upload Foto</label>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" value="${result[0].tanggal}" />
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6">
        <div class="form-group">
        <label for="lokasi">Lokasi</label>
        <select class="form-control" id="lokasi" name="lokasi">
        <option value="Taar" ${(result[0].lokasi == "Taar" ? "selected" : "")}>Taar</option>
        <option value="Mangon" ${(result[0].lokasi == "Mangon" ? "selected" : "")}>Mangon</option>
        <option value="Lebetawi" ${(result[0].lokasi == "Lebetawi" ? "selected" : "")}>Lebetawi</option>
        <option value="Ohoitel" ${(result[0].lokasi == "Ohoitel" ? "selected" : "")}>Ohoitel</option>
        <option value="Yamtel" ${(result[0].lokasi == "Yamtel" ? "selected" : "")}>Yamtel</option>
        <option value="Dullah" ${(result[0].lokasi == "Dullah" ? "selected" : "")}>Dullah</option>
        </select>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" id="Keterangan" placeholder="Keterangan" name="keterangan">${result[0].keterangan}</textarea>
        </select>
        </div>
        </div>
        </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-2" id="update">
        <i class="fa-solid fa-floppy-disk"></i> Update
        </button>
        <button type="reset" onclick="reset()" class="btn btn-primary">
        <i class="fa-solid fa-arrows-rotate"></i> Reset
        </button>
        </form>
        </div>
        </div>`';
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
                <li class="breadcrumb-item active">Galeri</li>
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
    })


    $(document).on("click", "#update", function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Galeri akan diupdate",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          const form = document.getElementById('form');
          const formData = new FormData(form);

          $.ajax({
            url: "../backend/updateGaleri.php",
            type: "POST",
            enctype: 'multipart/form-data',
            data: formData,
            processData: false,
            contentType: false,
            cache: false,
            success: function(resp) {
              console.log(resp);
              result = JSON.parse(resp);
              if (result != "failed") {
                Toast.fire({
                  icon: 'success',
                  title: 'Berhasil mengubah galeri.'
                })
                setTimeout(() => {
                  taghtml =
                    '<div class="col-12">' +
                    '<div class="card">' +
                    '<div class="card-header">' +
                    '<div class="row">' +
                    '<div class="col-md-6">' +
                    '<h3 class="card-title mt-2">' +
                    '<i class="fa-solid fa-table"></i> Data Galeri' +
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
                    "<th>Foto</th>" +
                    "<th>Tanggal</th>" +
                    "<th>Lokasi</th>" +
                    "<th>Keterangan</th>" +
                    "<th>Aksi</th>" +
                    "</tr>" +
                    "</thead>" +
                    "<tbody id='dataGaleri'>" +
                    "</tbody>" +
                    "</table>" +
                    "</div>" +
                    "<!-- /.card-body -->" +
                    "</div>" +
                    "<!-- /.card -->" +
                    "</div>";
                  $("#isi").html(taghtml);

                  $.ajax({
                    url: "../backend/getGaleri.php",
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
                            "<img src='../upload/galeri/" +
                            result[i].foto +
                            "' class='w-50' height='100' alt='foto'>" +
                            "</td>" +
                            "<td>" +
                            result[i].tanggal +
                            "</td>" +
                            "<td>" +
                            result[i].lokasi +
                            "</td>" +
                            "<td>" +
                            result[i].keterangan +
                            "</td>" +
                            "<td>" +
                            "<div class='mx-auto container-aksi container-aksi__galeri'>" +
                            '<button class="btn-xs btn-success btn-aksi" id="exportGaleri" idGaleri="' +
                            result[i].galeri_id +
                            '">' +
                            '<i class="fa-solid fa-download"></i>' +
                            "</button>" +
                            '<button class="btn-xs btn-primary btn-aksi" id="editGaleri" idGaleri="' +
                            result[i].galeri_id +
                            '">' +
                            '<i class="fa-solid fa-pen-to-square"></i>' +
                            "</button>" +
                            ' <button class="btn-xs btn-danger btn-aksi" id="hapusGaleri" idGaleri="' +
                            result[i].galeri_id +
                            '">' +
                            '<i class="fa-solid fa-trash-can"></i>' +
                            "</button>" +
                            "</div>" +
                            "</td>" +
                            "</tr>";
                        }
                        $("#dataGaleri").html(resultTag);
                      } else {
                        resultTag +=
                          "<tr>" +
                          "<td colspan='13' class='text-center'>Data Masih Kosong :)</td>" +
                          "</tr>";
                        $("#dataGaleri").html(resultTag);
                      }
                    },
                    error: function() {
                      console.log("error");
                    },
                  });
                }, 3000);
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

    $(document).on("click", "#hapusGaleri", function() {
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Galeri akan dihapus",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          var data = new Object();
          data.id = $(this).attr("idGaleri");
          console.log(data);
          $.ajax({
            url: "../backend/deleteGaleri.php",
            type: "POST",
            data: JSON.stringify(data),
            cache: false,
            success: function(resp) {
              if (result != false) {
                Toast.fire({
                  icon: 'success',
                  title: 'Berhasil menghapus galeri.'
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

    $(document).on("click", "#editGaleri", function() {
      var data = new Object();
      data.id = $(this).attr("idGaleri");

      $.ajax({
        url: "../backend/getGaleriById.php",
        type: "POST",
        data: JSON.stringify(data),
        cache: false,
        success: function(resp) {
          var result = JSON.parse(resp);
          console.log(resp);
          resultTag = <?= $formEdit; ?>;
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
        },
        error: function() {
          console.log("error");
        },
      });


    });

    $(document).on("click", "#exportGaleri", function() {
      var data = new Object();
      data.id = $(this).attr("idGaleri");

      $.ajax({
        url: "./exportGaleri.php",
        type: "POST",
        data: JSON.stringify(data),
        cache: false,
        success: function(resp) {
          var result = JSON.parse(resp);
          console.log(resp);
        },
        error: function(error) {
          console.log(error);
        },
      });
    });

    $(document).on("click", "#simpan", function(e) {
      e.preventDefault();
      Swal.fire({
        title: 'Apakah Anda Yakin?',
        text: "Galeri akan disimpan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
      }).then((result) => {
        if (result.isConfirmed) {
          const form = document.getElementById('form');
          const formData = new FormData(form);

          $.ajax({
            url: "../backend/addGaleri.php",
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
                title: 'Berhasil menambah galeri.'
              })
              setTimeout(() => {
                taghtml =
                  '<div class="col-12">' +
                  '<div class="card">' +
                  '<div class="card-header">' +
                  '<div class="row">' +
                  '<div class="col-md-6">' +
                  '<h3 class="card-title mt-2">' +
                  '<i class="fa-solid fa-table"></i> Data Galeri' +
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
                  "<th>Foto</th>" +
                  "<th>Tanggal</th>" +
                  "<th>Lokasi</th>" +
                  "<th>Keterangan</th>" +
                  "<th>Aksi</th>" +
                  "</tr>" +
                  "</thead>" +
                  "<tbody id='dataGaleri'>" +
                  "</tbody>" +
                  "</table>" +
                  "</div>" +
                  "<!-- /.card-body -->" +
                  "</div>" +
                  "<!-- /.card -->" +
                  "</div>";
                $("#isi").html(taghtml);

                $.ajax({
                  url: "../backend/getGaleri.php",
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
                          "<img src='../upload/galeri/" +
                          result[i].foto +
                          "' class='w-50' height='100' alt='foto'>" +
                          "</td>" +
                          "<td>" +
                          result[i].tanggal +
                          "</td>" +
                          "<td>" +
                          result[i].lokasi +
                          "</td>" +
                          "<td>" +
                          result[i].keterangan +
                          "</td>" +
                          "<td>" +
                          "<div class='mx-auto container-aksi container-aksi__galeri'>" +
                          '<button class="btn-xs btn-success btn-aksi" id="exportGaleri" idGaleri="' +
                          result[i].galeri_id +
                          '">' +
                          '<i class="fa-solid fa-download"></i>' +
                          "</button>" +
                          '<button class="btn-xs btn-primary btn-aksi" id="editGaleri" idGaleri="' +
                          result[i].galeri_id +
                          '">' +
                          '<i class="fa-solid fa-pen-to-square"></i>' +
                          "</button>" +
                          ' <button class="btn-xs btn-danger btn-aksi" id="hapusGaleri" idGaleri="' +
                          result[i].galeri_id +
                          '">' +
                          '<i class="fa-solid fa-trash-can"></i>' +
                          "</button>" +
                          "</div>" +
                          "</td>" +
                          "</tr>";
                      }
                      $("#dataGaleri").html(resultTag);
                    } else {
                      resultTag +=
                        "<tr>" +
                        "<td colspan='13' class='text-center'>Data Masih Kosong :)</td>" +
                        "</tr>";
                      $("#dataGaleri").html(resultTag);
                    }
                  },
                  error: function() {
                    console.log("error");
                  },
                });
              }, 3000);
            },
            error: function() {
              console.log("error");
            },
          });
        }
      });
    });

    $(document).on("change", "#darkmode", function() {
      if ($(this).is(":checked")) {
        $("body").addClass("dark-mode");
      } else {
        $("body").removeClass("dark-mode");
      }
    });

    var formTambah = <?= $formTambah ?>;

    function reset() {
      document.getElementById("foto").value = "";
      document.getElementById("tanggal").value = "";
      document.getElementById("lokasi").value = "";
      document.getElementById("keterangan").value = "";

    }

    $(document).on("click", "#kembali", function() {
      taghtml =
        '<div class="col-12">' +
        '<div class="card">' +
        '<div class="card-header">' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<h3 class="card-title mt-2">' +
        '<i class="fa-solid fa-table"></i> Data Galeri' +
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
        "<th>Foto</th>" +
        "<th>Tanggal</th>" +
        "<th>Lokasi</th>" +
        "<th>Keterangan</th>" +
        "<th>Aksi</th>" +
        "</tr>" +
        "</thead>" +
        "<tbody id='dataGaleri'>" +
        "</tbody>" +
        "</table>" +
        "</div>" +
        "<!-- /.card-body -->" +
        "</div>" +
        "<!-- /.card -->" +
        "</div>";
      $("#isi").html(taghtml);

      $.ajax({
        url: "../backend/getGaleri.php",
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
                "<img src='../upload/galeri/" +
                result[i].foto +
                "' class='w-50' height='100' alt='foto'>" +
                "</td>" +
                "<td>" +
                result[i].tanggal +
                "</td>" +
                "<td>" +
                result[i].lokasi +
                "</td>" +
                "<td>" +
                result[i].keterangan +
                "</td>" +
                "<td>" +
                "<div class='mx-auto container-aksi container-aksi__galeri'>" +
                '<button class="btn-xs btn-success btn-aksi" id="exportGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-download"></i>' +
                "</button>" +
                '<button class="btn-xs btn-primary btn-aksi" id="editGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-pen-to-square"></i>' +
                "</button>" +
                ' <button class="btn-xs btn-danger btn-aksi" id="hapusGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-trash-can"></i>' +
                "</button>" +
                "</div>" +
                "</td>" +
                "</tr>";
            }
            $("#dataGaleri").html(resultTag);
          } else {
            resultTag +=
              "<tr>" +
              "<td colspan='13' class='text-center'>Data Masih Kosong :)</td>" +
              "</tr>";
            $("#dataGaleri").html(resultTag);
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
    });


    $(document).ready(function() {
      taghtml =
        '<div class="col-12">' +
        '<div class="card">' +
        '<div class="card-header">' +
        '<div class="row">' +
        '<div class="col-md-6">' +
        '<h3 class="card-title mt-2">' +
        '<i class="fa-solid fa-table"></i> Data Galeri' +
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
        "<th>Foto</th>" +
        "<th>Tanggal</th>" +
        "<th>Lokasi</th>" +
        "<th>Keterangan</th>" +
        "<th>Aksi</th>" +
        "</tr>" +
        "</thead>" +
        "<tbody id='dataGaleri'>" +
        "</tbody>" +
        "</table>" +
        "</div>" +
        "<!-- /.card-body -->" +
        "</div>" +
        "<!-- /.card -->" +
        "</div>";
      $("#isi").html(taghtml);

      $.ajax({
        url: "../backend/getGaleri.php",
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
                "<img src='../upload/galeri/" +
                result[i].foto +
                "' class='w-50' height='100' alt='foto'>" +
                "</td>" +
                "<td>" +
                result[i].tanggal +
                "</td>" +
                "<td>" +
                result[i].lokasi +
                "</td>" +
                "<td>" +
                result[i].keterangan +
                "</td>" +
                "<td>" +
                "<div class='mx-auto container-aksi container-aksi__galeri'>" +
                '<button class="btn-xs btn-success btn-aksi" id="exportGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-download"></i>' +
                "</button>" +
                '<button class="btn-xs btn-primary btn-aksi" id="editGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-pen-to-square"></i>' +
                "</button>" +
                ' <button class="btn-xs btn-danger btn-aksi" id="hapusGaleri" idGaleri="' +
                result[i].galeri_id +
                '">' +
                '<i class="fa-solid fa-trash-can"></i>' +
                "</button>" +
                "</div>" +
                "</td>" +
                "</tr>";
            }
            $("#dataGaleri").html(resultTag);
          } else {
            resultTag +=
              "<tr>" +
              "<td colspan='13' class='text-center'>Data Masih Kosong :)</td>" +
              "</tr>";
            $("#dataGaleri").html(resultTag);
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