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
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />

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
                <h2>Galeri</h2>
            </div>
        </div>
        <div class="row galeri">
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


    <script src="./admin/plugins/jquery/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <!-- Bootstrap -->

    <script>
        $(document).ready(function() {

            $.ajax({
                url: "./backend/getGaleri.php",
                type: "GET",
                cache: false,
                success: function(resp) {
                    result = JSON.parse(resp);
                    resultTag = "";
                    if (result != false) {
                        for (i = 0; i < result.length; i++) {
                            no = i + 1;
                            resultTag +=
                                '<div class="col-12 col-md-3">' +
                                '<a href="./upload/galeri/' +
                                result[i].foto +
                                '" data-fancybox="group" data-caption="' +
                                result[i].keterangan +
                                '" >' +
                                '<img src="./upload/galeri/' +
                                result[i].foto +
                                '" class="img-fluid fancybox foto-galeri" style="width: 100%; height: 100%;"/>' +
                                '</a>' +
                                '</div>';
                        }
                        $(".galeri").html(resultTag);
                    } else {
                        resultTag +=
                            "Galeri Masih Kosong :)";
                        $(".galeri").html(resultTag);
                    }
                },
                error: function() {
                    console.log("error");
                },
            });
            Fancybox.bind("[data-fancybox]", {
                // Your options go here
            });

        });
    </script>
</body>

</html>