<?php
session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password']; // Anda perlu mengenkripsi kata sandi
    // $role = $_POST['role'];

    // Contoh enkripsi kata sandi dengan hash bcrypt
    // $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $hashedPassword = md5($password);

    // Query SQL untuk menambahkan pengguna ke dalam database
    $sql = "INSERT INTO users (username, password, fullname, job_title) VALUES ('$username', '$hashedPassword', '$fullname', 'user')";

    if (mysqli_query($connect, $sql)) {
        // Jika berhasil, arahkan kembali ke halaman manajemen pengguna
        // header("location: manajemen-user.php?alert=success");
        // header("location: tambah-user.php");
        echo "<script language=\"JavaScript\">\n";
		echo "alert('User Telah Ditambahkan!');\n";
		echo "window.location='tambah-user.php'";
		echo "</script>";
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($connect);
    }
} else {
    // Jika bukan metode POST, arahkan ke halaman lain atau tampilkan pesan kesalahan
    echo "Metode yang digunakan tidak diizinkan.";
}

mysqli_close($connect);
?>
