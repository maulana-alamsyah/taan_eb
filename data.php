<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="./admin/dist/css/adminlte.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5a6c86310d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="./admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="./admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="./admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <div class="container-fluid w-100 bg-dark mb-3">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mx-lg-5 px-lg-5">
            <div class="container-fluid">
                <a class="navbar-brand text-light" href="#">
                    Taan Eb
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start text-bg-dark w-25 ps-3" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Taan Eb</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">

                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="./data.php">Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="./galeri.php">Galeri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="./statistik.php">Statistik</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="./login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
        </nav>
    </div>
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-12 text-center">
                <h2>Data</h2>
            </div>
        </div>
        <div class="row" id="isiPembudaya">
            <!-- /.col -->
        </div>
        <div class="row" id="isiKuisioner">
            <!-- /.col -->
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./admin/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- Bootstrap -->

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                searching: false,
            });
            $('#example2').DataTable({
                searching: false,
            });
        });

        /* Pembudidaya */
        taghtml =
            '<div class="col-12">' +
            '<div class="card">' +
            '<div class="card-header">' +
            '<div class="row">' +
            '<div class="col-md-12">' +
            '<h3 class="card-title mt-2">' +
            '<i class="fa-solid fa-table"></i> Profil Pembudidaya' +
            "</h3>" +
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
        $("#isiPembudaya").html(taghtml);

        $.ajax({
            url: "./backend/getPembudidaya.php",
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

        /* Kuisioner */
        taghtml =
            '<div class="col-12">' +
            '<div class="card">' +
            '<div class="card-header">' +
            '<div class="row">' +
            '<div class="col-md-6">' +
            '<h3 class="card-title mt-2">' +
            '<i class="fa-solid fa-table"></i> Data Kuisioner' +
            "</h3>" +
            "</div>" +
            "</div>" +
            "</div>" +
            "<!-- /.card-header -->" +
            '<div class="card-body table-responsive">' +
            '<table id="example2" class="table table-bordered table-striped">' +
            "<thead>" +
            "<tr>" +
            "<th>No</th>" +
            "<th>Petugas</th>" +
            "<th>Tanggal</th>" +
            "<th>Triwulan</th>" +
            "<th>Lokasi</th>" +
            "<th>Pembudidaya</th>" +
            "</tr>" +
            "</thead>" +
            "<tbody id='dataKuisioner'>" +
            "</tbody>" +
            "</table>" +
            "</div>" +
            "<!-- /.card-body -->" +
            "</div>" +
            "<!-- /.card -->" +
            "</div>";
        $("#isiKuisioner").html(taghtml);

        $.ajax({
            url: "./backend/getKuisioner.php",
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
                            result[i].nama_petugas +
                            "</td>" +
                            "<td>" +
                            result[i].tanggal +
                            "</td>" +
                            "<td>" +
                            result[i].triwulan +
                            "</td>" +
                            "<td>" +
                            result[i].lokasi +
                            "</td>" +
                            "<td>" +
                            result[i].nama_pembudidaya +
                            "</td>" +
                            "</tr>";
                    }
                    $("#dataKuisioner").html(resultTag);
                } else {
                    resultTag +=
                        "<tr>" +
                        "<td colspan='13' class='text-center'>Data Masih Kosong :)</td>" +
                        "</tr>";
                    $("#dataKuisioner").html(resultTag);
                }
            },
            error: function() {
                console.log("error");
            },
        });
    </script>
</body>

</html>