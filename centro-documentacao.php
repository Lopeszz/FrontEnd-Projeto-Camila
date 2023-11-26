<!DOCTYPE html>
<html lang="br">


<!-- Mirrored from htmldemo.hasthemes.com/hono/hono/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Mar 2021 08:45:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Centro de Documentação</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">


    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<style>
    .main-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 50px;
        box-sizing: border-box;
        background-color: white;
        /* Cor de fundo */
    }

    .content-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 80%;
        max-width: 1200px;
        background-color: #f5f5f5;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        /* Previne que a imagem saia do container */
    }

    .text-section {
        flex: 1;
        padding: 20px;
        margin-right: 20px;
        /* Espaçamento entre o texto e a imagem */
        color: #333;
        /* Cor do texto */
    }

    .image-section {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }

    .image-section img {
        width: 100%;
        max-height: 300px;
        object-fit: cover;
        /* Garante que a imagem cubra o espaço disponível */
    }

    .content-title {
        margin-bottom: 15px;
        color: #a3803e;
        font-size: 24px;
        text-align: center;
    }

    .content-block p {
        font-size: 18px;
        line-height: 1.6;
        text-align: justify;
    }

    .slider-spacer {
        height: 50px;
    }
</style>
</head>

<body>
    <?php require_once("menu.php"); ?>

    <div class="slider-spacer"></div>

    <div class="main-container">
        <div class="content-container">
            <div class="text-section content-block">
                <h3 class="content-title">DEFINIÇÃO</h3>
                <p>Um Centro de Documentação é uma instituição dedicada à coleta, conservação de documentos antigos
                    considerados importantes para a história, cultura e conhecimento.Um Centro de Documentação é uma
                    instituição dedicada à coleta, conservação de documentos antigos considerados importantes para a
                    história, cultura e conhecimento.Um Centro de Documentação é uma instituição dedicada à coleta,
                    conservação de documentos antigos considerados importantes para a história, cultura e conhecimento.
                </p>    
            </div>
            <div class="image-section">
                <img src="assets/images/hero-slider/home-1/hero-slider-1.jpg" alt="Café Especial">
            </div>
        </div>
    </div>
    <!-- ...:::: End Error Section :::... -->

    <?php
    require_once("footer.php");
    ?>

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <!-- <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/vendor/jquery-ui.min.js"></script>  -->

    <!--Plugins JS-->
    <!-- <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/material-scrolltop.js"></script>
    <script src="assets/js/plugins/jquery.nice-select.min.js"></script>
    <script src="assets/js/plugins/jquery.zoom.min.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/plugins/jquery.waypoints.js"></script>
    <script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
    <script src="assets/js/plugins/aos.min.js"></script>
    <script src="assets/js/plugins/jquery.instagramFeed.js"></script>
    <script src="assets/js/plugins/ajax-mail.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>



</html>