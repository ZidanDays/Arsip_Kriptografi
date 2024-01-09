<?php
session_start();
include "../config.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['encrypt_now'])) {
    // Pastikan session username dan id_user telah di-set
    if (isset($_SESSION['username'], $_SESSION['id_user'])) {
        $user     = $_SESSION['username'];
        // $id_user  = $_SESSION['id_user'];
        $id_file  = $_POST['fileid'];

        // Validasi ID file
        if (!empty($id_file) && is_numeric($id_file)) {
            // Update status file menjadi '1' (enkripsi berhasil)
            $sql1   = "UPDATE file SET status='1' WHERE id_file = ?";
            $stmt1  = mysqli_prepare($connect, $sql1);

            // Binding parameter
            mysqli_stmt_bind_param($stmt1, 'i', $id_file);

            // Eksekusi query
            if (mysqli_stmt_execute($stmt1)) {
                echo "<script language='javascript'>
                        window.location.href='arsip.php';
                        window.alert('Enkripsi Berhasil ..');
                      </script>";
            } else {
                echo "<script language='javascript'>
                        window.alert('Terjadi kesalahan saat mengupdate status file.');
                      </script>";
            }

            // Tutup statement
            mysqli_stmt_close($stmt1);
        } else {
            echo "<script language='javascript'>
                    window.alert('ID file tidak valid.');
                  </script>";
        }
    } else {
        echo "<script language='javascript'>
                window.alert('Session user tidak valid.');
              </script>";
    }
}
?>
