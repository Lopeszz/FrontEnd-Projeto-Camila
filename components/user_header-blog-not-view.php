<div class="profile">
   <?php
   $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
   $select_profile->execute([$user_id]);
   if ($select_profile->rowCount() > 0) {
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
      ?>

      <?php
   } else {
      ?>
      <p class="name">please login first!</p>
      <a href="login.php" class="option-btn">login</a>
      <?php
   }
   ?>
</div>