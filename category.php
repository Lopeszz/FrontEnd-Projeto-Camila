<?php
include 'components/connect.php';

session_start();

if (isset($_SESSION['user_id'])) {
   $user_id = $_SESSION['user_id'];
} else {
   $user_id = '';
}

include 'components/like_post.php';

// Certifique-se de definir $category mesmo se não estiver definido na URL
$category = isset($_GET['category']) ? $_GET['category'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <!-- Use the minified version files listed below for better performance and remove the files listed above -->
   <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
   <link rel="stylesheet" href="assets/css/plugins/plugins.min.css">
   <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

   <!-- header section starts  -->
   <?php include 'menu.php'; ?>
   <!-- header section ends -->

   <section class="posts-container">

      <h1 class="heading">Post Categories</h1>

      <div class="box-container">

         <?php
         $select_posts = $conn->prepare("SELECT * FROM `posts` WHERE category = ? and status = ?");
         $select_posts->execute([$category, 'active']);
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

               
               
               <div class="post">
                  <?php if ($fetch_posts['image'] != ''): ?>
                     <img class="post-image" src="uploaded_img/<?= $fetch_posts['image']; ?>" alt="">
                  <?php endif; ?>
                  <div class="post-meta">
                     <span class="post-date">
                        <?= $fetch_posts['date']; ?>
                     </span>
                     <span class="post-author">
                        By <a href="author_posts.php?author=<?= $fetch_posts['name']; ?>">
                           <?= $fetch_posts['name']; ?>
                        </a>
                     </span>
                  </div>

                  <div class="post-content">
                     <h2 class="post-title">
                        <?= $fetch_posts['title']; ?>
                     </h2>
                     <p class="post-text">
                        <?= $fetch_posts['content']; ?>
                     </p>

                     <div class="post-actions">
                        <a href="view_post.php?post_id=<?= $post_id; ?>" class="read-more-btn">Read more</a>
                        <div class="icons">
                           <a href="view_post.php?post_id=<?= $post_id; ?>"><i class="fas fa-comment"></i><span>(
                                 <?= $total_post_comments; ?>)
                              </span></a>
                           <button type="submit" name="like_post"><i class="fas fa-heart"
                                 style="<?php if ($confirm_likes->rowCount() > 0) {
                                    echo 'color:var(--red);';
                                 } ?>  "></i><span>(
                                 <?= $total_post_likes; ?>)
                              </span></button>
                        </div>
                     </div>
                  </div>
               </div>

               <?php
            }
         } else {
            echo '<p class="empty">No posts found for this category!</p>';
         }
         ?>
      </div>

   </section>

   <?php include 'footer.php'; ?>

   <!-- custom js file link  -->
   <script src="js/script.js"></script>

</body>

</html>