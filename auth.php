<?php
session_start();
include 'config.php';

$error='';

if	(empty($_POST['username']) || empty($_POST['password'])) {
	$error = "Username or Password Tidak Valid!";

}else{

$user = mysqli_real_escape_string($connect,$_POST['username']);
$pass = mysqli_real_escape_string($connect,$_POST['password']);

$query = "SELECT id_user, username ,password, job_title FROM users WHERE username='$user' AND password=md5('$pass')";
$sql = mysqli_query($connect,$query);
$rows = mysqli_fetch_array($sql);

$job = $rows["job_title"];
$id_user = $rows["id_user"];


// echo $rows['job_title'];

	if ($rows["job_title"] == 'admin') {
		$_SESSION['username']=$user;
		$_SESSION['id_user']=$id_user;
		header("location: dashboard/index.php");
}if ($rows["job_title"] == 'user') {
	$_SESSION['username'] = $user;
	$_SESSION['id_user']=$id_user;
	echo "<script language=\"JavaScript\">\n";
	echo "window.location='user/index.php'";
	echo "</script>";
}else {
		echo "<script language=\"JavaScript\">\n";
		echo "alert('Username atau Password Salah!');\n";
		echo "window.location='index.php'";
		echo "</script>";
		}
	}

