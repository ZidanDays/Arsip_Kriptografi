<?php include "auth.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas Perpustakaan & Kearsipan Kabupaten Minahasa</title>
    <link rel="stylesheet" href="dashboard/css/login.css">
    <link rel="icon" type="image/png" href="dashboard/img/logo/logosn.png">
</head>

<body>
    <div class="login-box">

    <div>
    <img src="dashboard/img/logo-minahasa.png" alt="">
    </div>
    <br><br>

        <!-- <h2>Login</h2> -->
        <form action="auth.php" method="post">
    <div class="user-box">
        <input type="text" name="username" required>
        <label>𝐮𝐬𝐞𝐫𝐧𝐚𝐦𝐞</label>
    </div>
    <div class="user-box">
        <input type="password" name="password" required>
        <label>𝐩𝐚𝐬𝐬𝐰𝐨𝐫𝐝</label>
    </div>
    <!-- Mengganti elemen <a> menjadi <button> -->
    <button type="submit" name="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Submit
    </button>
</form>

    </div>
</body>

</html>