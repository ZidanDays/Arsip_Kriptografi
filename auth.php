<?php
session_start();
include 'config.php';

$error = '';

if (empty($_POST['username']) || empty($_POST['password'])) {
    $error = "Username or Password Tidak Valid!";
} else {
    $user = mysqli_real_escape_string($connect, $_POST['username']);
    $pass = mysqli_real_escape_string($connect, $_POST['password']);

    // Query SQL untuk mendapatkan informasi pengguna berdasarkan username
    $query = "SELECT id_user, username, password, job_title FROM users WHERE username='$user'";
    $sql = mysqli_query($connect, $query);
    $rows = mysqli_fetch_array($sql);

    if ($rows) {
        // Verifikasi password menggunakan password_verify
        if (password_verify($pass, $rows['password'])) {
            $job = $rows["job_title"];
            $id_user = $rows["id_user"];

            if ($job == 'admin') {
                $_SESSION['username'] = $user;
                $_SESSION['id_user'] = $id_user;
                header("location: dashboard/index.php");
            } elseif ($job == 'user') {
                $_SESSION['username'] = $user;
                $_SESSION['id_user'] = $id_user;
                echo "<script language=\"JavaScript\">\n";
                echo "window.location='user/index.php'";
                echo "</script>";
            } else {
                echo "<script language=\"JavaScript\">\n";
                echo "alert('Role pengguna tidak valid!');\n";
                echo "window.location='index.php'";
                echo "</script>";
            }
        } else {
            echo "<script language=\"JavaScript\">\n";
            echo "alert('Username atau Password Salah!');\n";
            echo "window.location='index.php'";
            echo "</script>";
        }
    } else {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Username atau Password Salah!');\n";
        echo "window.location='index.php'";
        echo "</script>";
    }
}
