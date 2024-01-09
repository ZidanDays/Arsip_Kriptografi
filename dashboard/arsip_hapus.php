<?php 
include '../config.php';
$id = $_GET['id'];

// hapus file lama
$lama = mysqli_query($connect,"select * from file where id_file='$id'");
$l = mysqli_fetch_assoc($lama);

// if(mysqli_affected_rows($l) > 1){
//     $nama_file_lama = $l['file_name_source'];
// unlink("../hasil_dekripsi/".$nama_file_lama);
// }elseif{
//     $nama_file_lama = $l['file_name_source'];
// unlink("../hasil_enkripsi/".$nama_file_lama);
// }

$nama_file_lama = $l['file_name_source'];
unlink("hasil_dekripsi/".$nama_file_lama);

$nama_file_lama_enkripsi = $l['file_name_finish'];
unlink("hasil_enkripsi/".$nama_file_lama_enkripsi);

mysqli_query($connect, "delete from file where id_file='$id'");
header("location:arsip.php");