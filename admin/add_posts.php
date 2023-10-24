<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_POST['publish'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $status = 'active';
   
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $file = $_FILES['file']['name'];
   $file = filter_var($file, FILTER_SANITIZE_STRING);
   $file_size = $_FILES['file']['size'];
   $file_tmp_name = $_FILES['file']['tmp_name'];
   $file_folder = '../uploaded_file/' . $file;

   $select_image = $conn->prepare("SELECT * FROM `posts` WHERE image = ? AND admin_id = ?");
   $select_image->execute([$image, $admin_id]);



   if(isset($image)){
      if($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'image name repeated!';
      }elseif($image_size > 5000000){
         $message[] = 'images size is too large!';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   }else{
      $image = '';
   }

   if($select_image->rowCount() > 0 AND $image != ''){
      $message[] = 'please rename your image!';
   }
   





$select_file = $conn->prepare("SELECT * FROM `posts` WHERE file = ? AND admin_id = ?");
$select_file->execute([$file, $admin_id]);


if(isset($file)){
   if($select_file->rowCount() > 0 AND $file != ''){
      $message[] = 'file name repeated!';
   }elseif($file_size > 5000000){
      $message[] = 'file size is too large!';
   }else{
      move_uploaded_file($file_tmp_name, $file_folder);
   }
}else{
   $file = '';
}

if($select_file->rowCount() > 0 AND $file != ''){
   $message[] = 'please rename your file!';
}else{
   $insert_post = $conn->prepare("INSERT INTO `posts`(admin_id, name, title, content, category, image, file, status) VALUES(?,?,?,?,?,?,?,?)");
   $insert_post->execute([$admin_id, $name, $title, $content, $category, $image, $file, $status]);
   $message[] = 'post published!';
}




}

if (isset($_POST['publish'])) {

   // Verifique se um arquivo foi selecionado
   if (!empty($image)) {
      // Verifique se o arquivo é uma imagem (opcional)
      $allowed_extensions = array('jpg', 'jpeg', 'png', 'webp');
      $file_extension = pathinfo($image, PATHINFO_EXTENSION);
      if (!in_array(strtolower($file_extension), $allowed_extensions)) {
        
      } elseif ($image_size > 5000000) { // Verifique o tamanho máximo
         $message[] = 'O tamanho da imagem é muito grande (máximo de 2MB permitido).';
      } else {
         // Move o arquivo para o diretório de destino
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   } else {
      $image = '';
   }

   if (!empty($file)) {
      // Verifique o tamanho máximo do arquivo (ajuste conforme necessário)
      if ($file_size > 50000000) { // 50MB
          $message[] = 'O tamanho do arquivo é muito grande (máximo de 50MB permitido).';
      } else {
          move_uploaded_file($file_tmp_name, $file_folder);
      }
  }

  
}

if(isset($_POST['draft'])){

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $title = $_POST['title'];
   $title = filter_var($title, FILTER_SANITIZE_STRING);
   $content = $_POST['content'];
   $content = filter_var($content, FILTER_SANITIZE_STRING);
   $category = $_POST['category'];
   $category = filter_var($category, FILTER_SANITIZE_STRING);
   $status = 'deactive';
   
   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = '../uploaded_img/'.$image;

   $select_image = $conn->prepare("SELECT * FROM `posts` WHERE image = ? AND admin_id = ?");
   $select_image->execute([$image, $admin_id]); 

   if(isset($image)){
      if($select_image->rowCount() > 0 AND $image != ''){
         $message[] = 'image name repeated!';
      }elseif($image_size > 2000000){
         $message[] = 'images size is too large!';
      }else{
         move_uploaded_file($image_tmp_name, $image_folder);
      }
   }else{
      $image = '';
   }

   if($select_image->rowCount() > 0 AND $image != ''){
      $message[] = 'please rename your image!';
   }else{
      $insert_post = $conn->prepare("INSERT INTO `posts`(admin_id, name, title, content, category, image, status) VALUES(?,?,?,?,?,?,?)");
      $insert_post->execute([$admin_id, $name, $title, $content, $category, $image, $status]);
      $message[] = 'draft saved!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>posts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<?php include '../components/admin_header.php' ?>

<section class="post-editor">

   <h1 class="heading">add new post</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="name" value="<?= $fetch_profile['name']; ?>">
      <p>post title <span>*</span></p>
      <input type="text" name="title" maxlength="100" required placeholder="add post title" class="box">
      <p>post content <span>*</span></p>
      <textarea name="content" class="box" required maxlength="10000" placeholder="write your content..." cols="30" rows="10"></textarea>
      <p>post category <span>*</span></p>
      <select name="category" class="box" required>
         <option value="" selected disabled>-- select category* </option>
         <option value="nature">nature</option>
         <option value="education">education</option>
         <option value="pets and animals">pets and animals</option>
         <option value="technology">technology</option>
         <option value="fashion">fashion</option>
         <option value="entertainment">entertainment</option>
         <option value="movies and animations">movies</option>
         <option value="gaming">gaming</option>
         <option value="music">music</option>
         <option value="sports">sports</option>
         <option value="news">news</option>
         <option value="travel">travel</option>
         <option value="comedy">comedy</option>
         <option value="design and development">design and development</option>
         <option value="food and drinks">food and drinks</option>
         <option value="lifestyle">lifestyle</option>
         <option value="personal">personal</option>
         <option value="health and fitness">health and fitness</option>
         <option value="business">business</option>
         <option value="shopping">shopping</option>
         <option value="animations">animations</option>
      </select>
      <p>post image</p>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png, image/webp">
      <p>post file</p>
      <input type="file" name="file" class="box">
      
      <div class="flex-btn">
         <input type="submit" value="publish post" name="publish" class="btn">
         <input type="submit" value="save draft" name="draft" class="option-btn">
      </div>
   </form>

</section>










<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>