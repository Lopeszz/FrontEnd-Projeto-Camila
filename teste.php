<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>HONO - Multi Purpose HTML Template</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="assets/images/favicon.ico" type="image/png">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
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
    var_dump($posts);
    ?>

    <?php include 'menu.php'; ?>

    <!-- Restante do conteúdo da sua página HTML aqui -->

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

    <?php include 'footer.php'; ?>

    <!-- Global Vendor, plugins JS -->
    <script src="assets/js/vendor/vendor.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>