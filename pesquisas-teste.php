<?php

include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    $user_id = '';
}
;
include 'components/like_post.php';

?>

<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>HONO - Multi Purpose HTML Template</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
    <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css"> -->

    <!-- Plugin CSS -->
    <!-- <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
    <link rel="stylesheet" href="assets/css/plugins/aos.min.css"> -->

    <!-- Main CSS -->
    <!-- <link rel="stylesheet" href="assets/sass/style.css"> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php
    require_once("menu.php");
    ?>

    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">DOCUMENTOS E PESQUISAS</h3>
                                <p>Nessa aba você tera a disponibilidade de diversos documentos adquiridos durante o projeto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- ...:::: Start Blog List Section:::... -->
    <div class="blog-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-wrapper">
                        <div class="row mb-n6">
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="0">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="assets/images/blog/blog-grid-home-1-img-1.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="blog-list-slider-arrow">
                                        <!-- Slider main container -->
                                        <div class="blog-list-slider swiper-container">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-4.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-2.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-3.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-5.jpg" alt="">
                                                </div>
                                            </div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog Slider post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <div class="blog-video-box">
                                        <img class="img-fluid" src="assets/images/blog/blog-grid-home-1-img-5.jpg"
                                            alt="">
                                        <a href="https://youtu.be/MKjhBO2xQzg" class="video-play-btn"
                                            data-autoplay="true" data-vbtype="video">
                                            <i class="fa fa-youtube-play"></i>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog video post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="0">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="assets/images/blog/blog-grid-home-1-img-2.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <div class="image-box">
                                        <a href="blog-single-sidebar-left.html" class="image-link">
                                            <img class="img-fluid" src="assets/images/blog/blog-grid-home-1-img-5.jpg"
                                                alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog image post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                            <div class="col-xl-4 col-md-6 col-12 mb-6">
                                <!-- Start Product Default Single Item -->
                                <div class="blog-list blog-grid-single-item blog-color--golden" data-aos="fade-up"
                                    data-aos-delay="400">
                                    <div class="blog-list-slider-arrow">
                                        <!-- Slider main container -->
                                        <div class="blog-list-slider swiper-container">
                                            <!-- Additional required wrapper -->
                                            <div class="swiper-wrapper">
                                                <!-- Slides -->
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-5.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-2.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-3.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-1.jpg" alt="">
                                                </div>
                                                <div class="blog-list-slider-img swiper-slide"><img class="img-fluid"
                                                        src="assets/images/blog/blog-grid-home-1-img-4.jpg" alt="">
                                                </div>
                                            </div>

                                            <!-- If we need navigation buttons -->
                                            <div class="swiper-button-prev"></div>
                                            <div class="swiper-button-next"></div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <ul class="post-meta">
                                            <li>POSTED BY : <a href="#" class="author">Admin</a></li>
                                            <li>ON : <a href="#" class="date">APRIL 24, 2018</a></li>
                                        </ul>
                                        <h6 class="title"><a href="blog-single-sidebar-left.html"> Blog Slider post</a>
                                        </h6>
                                        <p>Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex.
                                            Aenean posuere libero eu augue condimentum rhoncus. Praesent</p>
                                        <a href="#" class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                    class="ion-ios-arrow-thin-right"></i></span></a>
                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                            </div>
                        </div>
                    </div>

                    <!-- Start Pagination -->
                   
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Blog List Section:::... -->
    <!-- End Blog Slider Section -->


    
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