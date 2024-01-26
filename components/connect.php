<?php

$db_name = 'mysql:host=localhost;dbname=blog_db';
$user_name = 'admin';
$user_password = '12345';

$conn = new PDO($db_name, $user_name, $user_password);

?>
