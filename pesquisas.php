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
    <!-- Codigo para puxar os posts do banco e colocar em uma lista -->
    <?php
    include 'components/connect.php';

    session_start();
    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location: admin_login.php');
    }

    // Função para buscar os posts no banco de dados
    function getPosts($conn, $admin_id)
    {
        $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE admin_id = ?");
        $select_posts->execute([$admin_id]);
        return $select_posts->fetchAll(PDO::FETCH_ASSOC);
    }

    $posts = getPosts($conn, $admin_id);
    ?>

    <?php
    require_once("menu.php");
    ?>

    <!-- End Service Section -->






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
                                <p>Nessa aba você tera a disponibilidade de diversos documentos adquiridos durante o
                                    projeto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Start Blog Slider Section -->
    <div class="blog-default-slider-section section-top-gap-100 section-fluid">
        <!-- ...:::: Start Blog List Section:::... -->
        <div class="blog-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-wrapper">
                            <div class="row mb-n6">
                                <?php foreach ($posts as $post) { ?>
                                    <div class="col-xl-4 col-md-6 col-12 mb-6">
                                        <div class="blog-list blog-grid-single-item blog-color--golden aos-init aos-animate"
                                            data-aos="fade-up" data-aos-delay="0">
                                            <div class="image-box">
                                                <a href="read_post.php?post_id=<?= $post['id']; ?>" class="image-link">
                                                    <img class="img-fluid" src="uploaded_img/<?= $post['image'] ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <ul class="post-meta">
                                                    <li>POSTED BY : <a href="#" class="author">
                                                            <?= $post['name']; ?>
                                                        </a></li>
                                                    <li>ON : <a href="#" class="date">
                                                            <?= $post['date']; ?>
                                                        </a></li>
                                                </ul>
                                                <h6 class="title"><a href="read_post.php?post_id=<?= $post['id']; ?>">
                                                        <?= $post['title']; ?>
                                                    </a></h6>
                                                <p>
                                                    <?= $post['content']; ?>
                                                </p>
                                                <a href="read_post.php?post_id=<?= $post['id']; ?>"
                                                    class="read-more-btn icon-space-left">Read More <span class="icon"><i
                                                            class="ion-ios-arrow-thin-right"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...:::: End Blog List Section:::... -->
    </div>
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