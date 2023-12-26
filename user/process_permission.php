<?php
// Sambungkan ke database Anda
include('../config.php'); // Sesuaikan dengan nama file dan lokasi koneksi database Anda

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $file_id = $_POST['file_id'];
    $user_id = $_POST['user_id'];
    $permissions = isset($_POST['permission']) ? $_POST['permission'] : array();

    // Hapus izin sebelumnya untuk pengguna yang bersangkutan
    $sqlDelete = "DELETE FROM file_permissions WHERE file_id = $file_id AND user_id = $user_id";
    mysqli_query($connect, $sqlDelete);

    // Simpan izin yang baru dipilih
    foreach ($permissions as $permission) {
        $sqlInsert = "INSERT INTO file_permissions (file_id, user_id, permission) VALUES ($file_id, $user_id, '$permission')";
        mysqli_query($connect, $sqlInsert);
    }

    // Redirect atau tampilkan pesan sukses
    header('Location: file_detail.php?id=' . $file_id); // Sesuaikan dengan halaman detail file Anda
    exit();
}
?>
