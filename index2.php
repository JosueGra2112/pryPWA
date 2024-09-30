<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <style>
        .noticia {
            position: relative;
            overflow: hidden;
            border: 1px solid #ccc;
            border-radius: 3px;
            padding: 10px;
            margin: 10px;
            text-align: center;
            max-width: 300px;
            transition: transform 0.3s ease;
        }
        .noticia img {
            max-width: 40%;
            margin-bottom: 10px;
            position: relative;
            transition: transform 0.3s ease;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
    </style>
</head>
<body>
<?php include 'Header.php'; ?>
    <div class="container">


        <main class="d-flex align-items-center my-4">
            <img src="./IMG/pclup.png" alt="Lup" style="max-width: 30%; margin: 0 50px;">
            <div>
                <center><img src="./IMG/SIGATEXT.png" alt="SIGATEXT" style="max-width: 90%;"></center>
                <br>
                <center><img src="./IMG/SIGA.png" alt="SIGA" style="max-width: 10%;"></center>
            </div>
        </main>

        <center>
            <main class="my-4">
                <h1>Bienvenido</h1>
            </main>
        </center>
        <center>
            <div class="slider">
                <div style="text-align: center;">
                    <center>
                        <img src="./IMG/SIGATEXT.png" alt="SIGATEXT" style="max-width: 50%;">
                        <img src="./IMG/pclup.png" alt="lup" style="max-width: 20%;">
                        <img src="./IMG/SIGA.png" alt="SIGA" style="max-width: 10%; display: inline-block;">
                    </center>
                </div>
                <div style="text-align: center;">
                    <img src="./IMGCAR/IM1.jpeg" alt="IM1" style="max-width: 50%; margin-bottom: 20px; display: inline-block;">
                </div>
                <div style="text-align: center;">
                    <img src="./IMGCAR/IM2.jpg" alt="IM2" style="max-width: 50%; margin-bottom: 20px; display: inline-block;">
                </div>
                <div style="text-align: center;">
                    <img src="./IMGCAR/IM3.webp" alt="IM3" style="max-width: 50%; margin-bottom: 20px; display: inline-block;">
                </div>
            </div>
        </center>

        <main class="d-flex flex-wrap justify-content-center my-4">
            <?php
            $botones = [
                [
                    'titulo' => 'Calendario',
                    'imagen' => './IMG/calendario.png',
                    'descripcion' => 'Calendario de todos los meses de actividad en la institución',
                    'link' => './Calendario.php'
                ],
                [
                    'titulo' => 'Bitácora',
                    'imagen' => './IMG/bitacora.png',
                    'descripcion' => 'Actividades que se realizan al día en la institución',
                    'link' => './Bitacoras.php'
                ],
                [
                    'titulo' => 'Boletín',
                    'imagen' => './IMG/boletin.png',
                    'descripcion' => 'Festividades de la institución, actividades escolares',
                    'link' => './Boletin.php'
                ]
            ];

            foreach ($botones as $index => $boton) {
                echo "
                <a href='{$boton['link']}' style='text-decoration: none; color: inherit;'>
                    <div class='noticia' onmouseover='handleMouseEnter($index)' onmouseout='handleMouseLeave($index)'>
                        <img id='image-$index' src='{$boton['imagen']}' alt='{$boton['titulo']}'>
                        <div class='overlay' id='overlay-$index'>
                            <h2 style='margin: 0;'>{$boton['titulo']}</h2>
                            <p style='margin: 0;'>{$boton['descripcion']}</p>
                        </div>
                    </div>
                </a>
                ";
            }
            ?>
        </main>
    </div>

    <!-- jQuery, Bootstrap JS, and Slick Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.slider').slick({
                dots: true,
                arrows: false,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000
            });
        });

        function handleMouseEnter(index) {
            const element = document.getElementById(`overlay-${index}`);
            const image = document.getElementById(`image-${index}`);
            if (element && image) {
                element.style.opacity = 1;
                image.style.transform = 'scale(1.1)';
            }
        }

        function handleMouseLeave(index) {
            const element = document.getElementById(`overlay-${index}`);
            const image = document.getElementById(`image-${index}`);
            if (element && image) {
                element.style.opacity = 0;
                image.style.transform = 'scale(1)';
            }
        }
    </script>
</body>
<object data="./Footer.html" width="100%" height="100px"></object>
</html>
