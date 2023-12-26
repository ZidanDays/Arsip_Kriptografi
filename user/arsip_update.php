<?php 
include '../config.php';
session_start();
date_default_timezone_set('Asia/Jakarta');

// $waktu = date('Y-m-d H:i:s'); 
// $petugas = $_SESSION['id'];
$id  = $_POST['id'];
$kode  = $_POST['kode'];
$nama  = $_POST['nama'];
$ruang  = $_POST['ruang'];
$rak  = $_POST['rak'];
$box  = $_POST['box'];
$map  = $_POST['map'];
$urut  = $_POST['urut'];

$rand = rand();

// $filename = $_FILES['file']['name'];

$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];

mysqli_query($connect, "update file set arsip_kode='$kode', arsip_nama='$nama', file_kategori='$kategori', id_ruang='$ruang', rak='$rak', box='$box', map='$map', urut='$urut', keterangan='$keterangan' where id_file='$id'")or die(mysqli_error($connect));
header("location:arsip.php");

// if($filename == ""){

// 	mysqli_query($connect, "update file set arsip_kode='$kode', arsip_nama='$nama', file_kategori='$kategori', arsip_ruang='$ruang', rak='$rak', box='$box', map='$map', urut='$urut', arsip_keterangan='$keterangan' where arsip_id='$id'")or die(mysqli_error($connect));
// 	header("location:arsip.php");

// }else{

// 	$jenis = pathinfo($filename, PATHINFO_EXTENSION);

// 	if($jenis == "php") {
// 		header("location:arsip.php?alert=gagal");
// 	}else{

// 		// hapus file lama
// 		$lama = mysqli_query($connect,"select * from arsip where arsip_id='$id'");
// 		$l = mysqli_fetch_assoc($lama);
// 		$nama_file_lama = $l['arsip_file'];
// 		unlink("../arsip/".$nama_file_lama);

// 		// upload file baru
// 		move_uploaded_file($_FILES['file']['tmp_name'], '../arsip/'.$rand.'_'.$filename);
// 		$nama_file = $rand.'_'.$filename;
// 		mysqli_query($connect, "update arsip set arsip_kode='$kode', arsip_nama='$nama', arsip_jenis='$jenis', arsip_kategori='$kategori', arsip_keterangan='$keterangan', arsip_file='$nama_file' where arsip_id='$id'")or die(mysqli_error($connect));
// 		header("location:arsip.php?alert=sukses");
// 	}
// }