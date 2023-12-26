<?php 
include '../config.php';
// session_start();
// $id = $_SESSION['id'];
$password = md5($_POST['password']);

mysqli_query($connect, "UPDATE users SET password='$password' WHERE username='admin'")or die(mysqli_errno());

header("location:gantipassword.php?alert=sukses");