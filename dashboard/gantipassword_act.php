<?php 
include '../config.php';
session_start();
$id = $_SESSION['id_user'];

$passworda = $_POST['passworda'];
$passwordb = $_POST['passwordb'];
$passwordc = $_POST['passwordc'];

$hashedPassword = password_hash($passwordb, PASSWORD_BCRYPT);

//ambil data dari database
$sql = mysqli_query($connect, "SELECT * FROM users WHERE id_user = '$id'");
$rows = mysqli_fetch_assoc($sql);

//verifikasi password sekarang
if ($rows) {
    if (password_verify($passworda, $rows['password'])) {
        if ($passwordb === $passwordc) {
            mysqli_query($connect, "UPDATE users SET password='$hashedPassword' WHERE id_user='$id'") or die(mysqli_error());

            header("location:gantipassword.php?alert=sukses");
        } else {
            header("location:gantipassword.php?alert=gagal");
        }
    } else {
        echo "<script language=\"JavaScript\">\n";
        echo "alert('Password Lama anda Tidak Sesuai!');\n";
        echo "window.location='gantipassword.php'";
        echo "</script>";
    }
} else {
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Password tidak ada!');\n";
    echo "window.location='index.php'";
    echo "</script>";
}
?>
