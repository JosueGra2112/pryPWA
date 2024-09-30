<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIGA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="./IMG/SigaLogo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .text-primary {
            color: #007bff !important;
        }

        .carousel-indicators li {
            background-color: #007bff;
        }

        .icon-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            transition: background-color 0.3s ease;
        }

        .icon-circle i {
            font-size: 3rem;
            color: #007bff;
        }

        .icon-circle:hover {
            background-color: #e2e6ea;
            cursor: pointer;
        }

        .text-center {
            text-align: center;
        }

        .icon-link {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>

    <?php include 'HeaderB.php'; ?>

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" width="80%" height="80%" src="./IMG/SigaLogo.png" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-primary"><b>BIENVENIDO</b></h1>
                                <h3 class="h2">SISTEMA INTEGRAL DE GESTIÓN ADMINISTRATIVA</h3>
                                <p>
                                    DESARROLLO<a rel="sponsored" class="text-primary" href="https://templatemo.com" target="_blank"></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="./IMG/TSU.ico" alt="Desarrolladores">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">Desarrolladores</h1>
                                <h3 class="h2">Equipo de Desarrollo CodeNest</h3>
                                <p>
                                    - TSU.Josué Granados Cortes<br>
                                    - TSU.Alvaro Fernando Hernandez Badillo<br>
                                    - TSU.Jaime Bautista Cardona
                                </p>
                                <h3 class="h2">Participación del Personal de la Institución</h3>
                                <p>
                                    Agradecemos la valiosa colaboración del personal de la institución para poner en marcha el Sistema Integral de Gestión Administrativa.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">En desarrollo</h1>
                                <h3 class="h2">Sugerencias</h3>
                                <p>
                                    Datos en desarrollo
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                            <img class="img-fluid" src="" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1">En desarrollo</h1>
                                <h3 class="h2">Sugerencias</h3>
                                <p>
                                    Datos en desarrollo
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Banner Hero -->

    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">DIARIO DE EVENTOS</h1>
                <p>
                    CONSULTA LA BITÁCORA Y LOS BOLETINES
                </p>
            </div>
        </div>
        <div class="row text-center">

            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="#" class="icon-link">
                    <div class="icon-circle">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h2 class="h5 mt-3 mb-3">CALENDARIO</h2>
                </a>
            </div>

            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="./bitacora.php" class="icon-link">
                    <div class="icon-circle">
                        <i class="fas fa-clipboard"></i>
                    </div>
                    <h5 class="mt-3 mb-3">BITÁCORA</h5>
                </a>
            </div>

            <div class="col-12 col-md-4 p-5 mt-3">
                <a href="./boletin.php" class="icon-link">
                    <div class="icon-circle">
                        <i class="fas fa-list-alt"></i>
                    </div>
                    <h2 class="h5 mt-3 mb-3">BOLETÍN</h2>
                </a>
            </div>

        </div>
    </section>

    <?php include 'FooterB.php'; ?>

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->
</body>

</html>
