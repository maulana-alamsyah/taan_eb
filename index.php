<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="admin/dist/css/adminlte.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5a6c86310d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css" />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />

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
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    <div class="container-fluid hero">
        <div class="row hero__container__mobile">
            <div class="col-12 col-md-12">
                <div class="hero__image__mobile">
                    <img src="./admin/dist/img/taan_eb.jpeg" alt="AdminLTE Logo" height="300" width="300" class="img-fluid rounded-circle" style="opacity: 0.8" />
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 my-auto">
                <div class="text-description pb-5">
                Merupakan aplikasi penginputan dan penyimpanan data survey teripang. Aplikasi ini dilengkapi dengan fitur profil pembudidaya, kuesioner survey, galeri, dan statistika serta dapat diakses oleh masyarakat umum dan admin.
                </div>
                <a href="./data.php" class="btn btn-primary rounded-3 btn-hero">Lihat Data</a>
            </div>
            <div class="col-md-5 col-lg-3 justify-content-center hero__container__image">
                <div class="hero__image">
                    <img src="./admin/dist/img/taan_eb.jpeg" alt="AdminLTE Logo" height="400" width="400" class="img-fluid rounded-circle" style="opacity: 0.8" />
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
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
</body>

</html>