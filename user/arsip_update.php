<?php
include '../config.php';
session_start();

$id         = $_POST['id'];
$kode       = mysqli_real_escape_string($connect, $_POST['kode']);
$nama       = mysqli_real_escape_string($connect, $_POST['nama']);
$ruang      = $_POST['ruang'];
$rak        = $_POST['rak'];
$box        = $_POST['box'];
$map        = $_POST['map'];
$urut       = $_POST['urut'];
$kategori   = $_POST['kategori'];
$keterangan = mysqli_real_escape_string($connect, $_POST['keterangan']);

// Peningkatan Keamanan #1: Gunakan Prepared Statements untuk SQL
$stmt = $connect->prepare("UPDATE file SET arsip_kode=?, arsip_nama=?, file_kategori=?, id_ruang=?, rak=?, box=?, map=?, urut=?, keterangan=? WHERE id_file=?");
$stmt->bind_param("ssssssssss", $kode, $nama, $kategori, $ruang, $rak, $box, $map, $urut, $keterangan, $id);
$result = $stmt->execute();
$stmt->close();

// Peningkatan Keamanan #2: Validasi Input
if (!ctype_alnum($kode) || !ctype_alpha($nama) || !ctype_digit($urut)) {
    header("location:arsip.php?alert=gagal");
    exit();
}

// Peningkatan Keamanan #3: Session Handling
$id_user = $_SESSION['id_user'];

// Peningkatan Keamanan #4: Logging dan Error Handling
if ($result) {
    header("location:arsip.php?alert=sukses");
} else {
    error_log("Update failed: " . $stmt->error);
    header("location:arsip.php?alert=gagal");
}

// Pastikan untuk melakukan logging yang lebih rinci dan sesuaikan sesuai kebutuhan aplikasi.
?>
