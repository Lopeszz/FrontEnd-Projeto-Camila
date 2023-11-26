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

$get_id = $_GET['post_id'];

if (isset($_POST['add_comment'])) {

    $admin_id = $_POST['admin_id'];
    $admin_id = filter_var($admin_id, FILTER_SANITIZE_STRING);
    $user_name = $_POST['user_name'];
    $user_name = filter_var($user_name, FILTER_SANITIZE_STRING);
    $comment = $_POST['comment'];
    $comment = filter_var($comment, FILTER_SANITIZE_STRING);

    $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ? AND admin_id = ? AND user_id = ? AND user_name = ? AND comment = ?");
    $verify_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);

    if ($verify_comment->rowCount() > 0) {
        $message[] = 'comment already added!';
    } else {
        $insert_comment = $conn->prepare("INSERT INTO `comments`(post_id, admin_id, user_id, user_name, comment) VALUES(?,?,?,?,?)");
        $insert_comment->execute([$get_id, $admin_id, $user_id, $user_name, $comment]);
        $message[] = 'new comment added!';
    }

}

if (isset($_POST['edit_comment'])) {
    $edit_comment_id = $_POST['edit_comment_id'];
    $edit_comment_id = filter_var($edit_comment_id, FILTER_SANITIZE_STRING);
    $comment_edit_box = $_POST['comment_edit_box'];
    $comment_edit_box = filter_var($comment_edit_box, FILTER_SANITIZE_STRING);

    $verify_comment = $conn->prepare("SELECT * FROM `comments` WHERE comment = ? AND id = ?");
    $verify_comment->execute([$comment_edit_box, $edit_comment_id]);

    if ($verify_comment->rowCount() > 0) {
        $message[] = 'comment already added!';
    } else {
        $update_comment = $conn->prepare("UPDATE `comments` SET comment = ? WHERE id = ?");
        $update_comment->execute([$comment_edit_box, $edit_comment_id]);
        $message[] = 'your comment edited successfully!';
    }
}

if (isset($_POST['delete_comment'])) {
    $delete_comment_id = $_POST['comment_id'];
    $delete_comment_id = filter_var($delete_comment_id, FILTER_SANITIZE_STRING);
    $delete_comment = $conn->prepare("DELETE FROM `comments` WHERE id = ?");
    $delete_comment->execute([$delete_comment_id]);
    $message[] = 'comment deleted successfully!';
}

$select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
$select_posts->execute(['active', $get_id]);

if ($select_posts->rowCount() > 0) {
    while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {
        $post_id = $fetch_posts['id'];
        $file_name = $fetch_posts['file']; // Supondo que o nome do arquivo seja armazenado no banco de dados
    }
}

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


</head>

<body>
    <!-- header section starts  -->
    <?php include 'components/user_header-blog-not-view.php'; ?>
    <!-- header section ends -->
    <?php
    require_once("menu.php");
    ?>

    <?php
    if (isset($_POST['open_edit_box'])) {
        $comment_id = $_POST['comment_id'];
        $comment_id = filter_var($comment_id, FILTER_SANITIZE_STRING);
        ?>
        <section class="comment-edit-form">
            <p>edit your comment</p>
            <?php
            $select_edit_comment = $conn->prepare("SELECT * FROM `comments` WHERE id = ?");
            $select_edit_comment->execute([$comment_id]);
            $fetch_edit_comment = $select_edit_comment->fetch(PDO::FETCH_ASSOC);
            ?>
            <form action="" method="POST">
                <input type="hidden" name="edit_comment_id" value="<?= $comment_id; ?>">
                <textarea name="comment_edit_box" required cols="30" rows="10"
                    placeholder="please enter your comment"><?= $fetch_edit_comment['comment']; ?></textarea>
                <button type="submit" class="inline-btn" name="edit_comment">edit comment</button>
                <div class="inline-option-btn" onclick="window.location.href = 'view_post.php?post_id=<?= $get_id; ?>';">
                    cancel
                    edit</div>
            </form>
        </section>
        <?php
    }
    ?>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <!-- <ul>
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="blog-grid-sidebar-left.html">Blog</a></li>
                                    <li class="active" aria-current="page">Blog Single Left Sidebar</li>
                                </ul> -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Blog Single Section:::... -->
    <div class="blog-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Search</h6>
                            <div class="default-search-style d-flex">
                                <input class="default-search-style-input-box" type="search" placeholder="Search..."
                                    required>
                                <button class="default-search-style-input-btn" type="submit"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li><a href="#">Audio</a></li>
                                    <li><a href="#">Company</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Other</a></li>
                                    <li><a href="#">Travel</a></li>
                                    <li><a href="#"> Uncategorized</a></li>
                                    <li><a href="#"> Video</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tags</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">Technology</a>
                                    <a href="#">Information</a>
                                    <a href="#">Wordpress</a>
                                    <a href="#">Devs</a>
                                    <a href="#">Program</a>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Meta</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li><a href="#">Log in</a></li>
                                    <li><a href="#">Entries feed</a></li>
                                    <li><a href="#">Comments feed</a></li>
                                    <li><a href="#">WordPress.org</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">PRODUCT CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            <!-- Start Single Menu Collapse List -->
                                            <li class="sidebar-menu-collapse-list">
                                                <div class="accordion">
                                                    <a href="shop-grid-sidebar-left.html"
                                                        class="accordion-title collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#men-fashion" aria-expanded="false">Men <i
                                                            class="ion-ios-arrow-right"></i></a>
                                                    <div id="men-fashion" class="collapse">
                                                        <ul class="accordion-category-list">
                                                            <li><a href="#">Dresses</a></li>
                                                            <li><a href="#">Jackets &amp; Coats</a></li>
                                                            <li><a href="#">Sweaters</a></li>
                                                            <li><a href="#">Jeans</a></li>
                                                            <li><a href="#">Blouses &amp; Shirts</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li> <!-- End Single Menu Collapse List -->
                                        </ul>
                                    </li>
                                    <li><a href="#">Football</a></li>
                                    <li><a href="#"> Men's</a></li>
                                    <li><a href="#"> Portable Audio</a></li>
                                    <li><a href="#"> Smart Watches</a></li>
                                    <li><a href="#">Tennis</a></li>
                                    <li><a href="#"> Uncategorized</a></li>
                                    <li><a href="#"> Video Games</a></li>
                                    <li><a href="#">Women's</a></li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>

                <div class="col-lg-9">
                    <!-- Start Blog Single Content Area -->
                    <div class="blog-single-wrapper">
                        <?php
                        $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE status = ? AND id = ?");
                        $select_posts->execute(['active', $get_id]);
                        if ($select_posts->rowCount() > 0) {
                            while ($fetch_posts = $select_posts->fetch(PDO::FETCH_ASSOC)) {

                                $post_id = $fetch_posts['id'];

                                $count_post_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                                $count_post_comments->execute([$post_id]);
                                $total_post_comments = $count_post_comments->rowCount();

                                $count_post_likes = $conn->prepare("SELECT * FROM `likes` WHERE post_id = ?");
                                $count_post_likes->execute([$post_id]);
                                $total_post_likes = $count_post_likes->rowCount();

                                $confirm_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ? AND post_id = ?");
                                $confirm_likes->execute([$user_id, $post_id]);
                                ?>

                                <form class="box" method="post">
                                    <?php
                                    if ($fetch_posts['image'] != '') {
                                        ?>
                                        <div class="blog-single-img" data-aos="fade-up" data-aos-delay="0">
                                            <img class="img-fluid" src="uploaded_img/<?= $fetch_posts['image']; ?>" alt="">
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <input type="hidden" name="post_id" value="<?= $post_id; ?>">
                                    <input type="hidden" name="admin_id" value="<?= $fetch_posts['admin_id']; ?>">

                                    <ul class="post-meta" data-aos="fade-up" data-aos-delay="200">
                                        <li>POSTED BY :
                                            <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>" class="author">
                                                <?= $fetch_posts['name']; ?>
                                            </a>
                                        </li>
                                        <li>ON :
                                            <a href="#" class="date">
                                                <?= $fetch_posts['date']; ?>
                                            </a>
                                        </li>
                                    </ul>

                                    <h4 class="post-title" data-aos="fade-up" data-aos-delay="400">
                                        <?= $fetch_posts['title']; ?>
                                    </h4>
                                    <div class="para-content" data-aos="fade-up" data-aos-delay="600">
                                        <?= $fetch_posts['content']; ?>
                                    </div>

                                    <?php if (!empty($file_name)) { ?>
                                        <div class="para-content" data-aos="fade-up" data-aos-delay="800">
                                            <a href="uploaded_file/<?= $file_name; ?>" download>
                                                Download File
                                            </a>

                                        </div>

                                    <?php } ?>
                                    <!-- <div class="icons">
                                        <div><i class="fas fa-comment"></i><span>(
                                                <?= $total_post_comments; ?>)
                                            </span></div>
                                        <button type="submit" name="like_post"><i class="fas fa-heart" style="<?php if ($confirm_likes->rowCount() > 0) {
                                            echo 'color:var(--red);';
                                        } ?>  "></i><span>(
                                                <?= $total_post_likes; ?>)
                                            </span></button>
                                    </div> -->
                                </form>


                                <?php
                            }
                        } else {
                            echo '<p class="empty">no posts found!</p>';
                        }
                        ?>
                        <div class="comment-area">

                            <div class="comment-box" data-aos="fade-up" data-aos-delay="0">
                                <?php
                                $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE post_id = ?");
                                $select_comments->execute([$get_id]);
                                $num_comments = $select_comments->rowCount();

                                if ($select_comments->rowCount() > 0) {
                                    ?>
                                    <h4 class="title mb-4">
                                        <?= $num_comments ?> Comentários
                                    </h4>
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <?php
                                        while ($fetch_comments = $select_comments->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <li class="comment-list">
                                                <div class="comment-wrapper">
                                                    <div class="comment-img">
                                                        <img src="assets/images/user/image-1.png" alt="">
                                                    </div>

                                                    <div class="comment-content">
                                                        <div class="comment-content-top">
                                                            <div class="comment-content-left">
                                                                <h6 class="comment-name">
                                                                    <?= $fetch_comments['user_name']; ?>
                                                                </h6>
                                                                <h6 class="">
                                                                    <?= $fetch_comments['date']; ?>
                                                                </h6>
                                                            </div>

                                                        </div>
                                                        <div class="para-content">
                                                            <p>
                                                                <?= $fetch_comments['comment']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                if ($fetch_comments['user_id'] == $user_id) {
                                                    ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="comment_id"
                                                            value="<?= $fetch_comments['id']; ?>">
                                                        <button type="submit" class="inline-option-btn" name="open_edit_box">edit
                                                            comment</button>
                                                        <button type="submit" class="inline-delete-btn" name="delete_comment"
                                                            onclick="return confirm('delete this comment?');">delete
                                                            comment</button>
                                                    </form>
                                                    <?php
                                                }
                                                ?>
                                            </li> <!-- End - Review Comment list-->
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <?php
                                } else {
                                    echo '<p class="empty">no comments added yet!</p>';
                                }
                                ?>
                            </div>
                            <!-- Start comment Form -->
                            <div class="comment-form" data-aos="fade-up" data-aos-delay="0">
                                <div class="coment-form-text-top mt-30">
                                    <h4 class="title mb-3 mt-3">Escreva um comentário</h4>
                                    <?php
                                    if ($user_id != '') {
                                        $select_admin_id = $conn->prepare("SELECT * FROM `posts` WHERE id = ?");
                                        $select_admin_id->execute([$get_id]);
                                        $fetch_admin_id = $select_admin_id->fetch(PDO::FETCH_ASSOC);
                                        ?>
                                        <form action="" method="post" class="add-comment">

                                            <input type="hidden" name="admin_id"
                                                value="<?= $fetch_admin_id['admin_id']; ?>">
                                            <input type="hidden" name="user_name" value="<?= $fetch_profile['name']; ?>">
                                            <p class="user">
                                                <i class="fas fa-user"></i>
                                                <a href="update.php">
                                                    <?= $fetch_profile['name']; ?>
                                                </a>
                                            </p>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="default-form-box mb-20">
                                                        <label for="comment-review-text">Seu comentário <span>*</span></label>
                                                        <textarea id="comment-review-text" placeholder="Escreva seu comentário"
                                                            name="comment" maxlength="1000" 
                                                            required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-golden" type="submit" value="add comment"
                                                        name="add_comment">Post
                                                        Comment
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="add-comment">
                                            <p>please login to add or edit your comment</p>
                                            <a href="login.php" class="inline-btn">login now</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>

                                <form action="#" method="post">

                                </form>
                                <!-- End comment Form -->
                            </div>
                        </div>


                    </div>


                </div>
                <!-- <div class="para-tags" data-aos="fade-up" data-aos-delay="0">
                            <span>Tags: </span>
                            <ul>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">t-shirt</a></li>
                                <li><a href="#">white</a></li>
                            </ul>
                        </div> -->
                <!-- End Blog Single Content Area -->
            </div>
        </div>
    </div>


    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- End Blog Slider Section -->
    <?php
    require_once("footer.php");
    ?>

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