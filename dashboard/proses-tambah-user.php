<?php
session_start();
include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $fullname = mysqli_real_escape_string($connect, $_POST['fullname']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $password = mysqli_real_escape_string($connect, $_POST['password']); 

    // Peningkatan keamanan: Gunakan prepared statement untuk mencegah serangan SQL injection
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Peningkatan keamanan: Gunakan prepared statement untuk mencegah serangan SQL injection
    $stmt = $connect->prepare("INSERT INTO users (username, password, fullname, job_title) VALUES (?, ?, ?, 'user')");
    $stmt->bind_param("sss", $username, $hashedPassword, $fullname);

    if ($stmt->execute()) {
        // Jika berhasil, arahkan kembali ke halaman manajemen pengguna
        echo "<script language=\"JavaScript\">\n";
        echo "alert('User Telah Ditambahkan!');\n";
        echo "window.location='tambah-user.php'";
        echo "</script>";
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . $stmt->error;
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika bukan metode POST, arahkan ke halaman lain atau tampilkan pesan kesalahan
    echo "Metode yang digunakan tidak diizinkan.";
}

// Tutup koneksi database
mysqli_close($connect);
?>
