<!DOCTYPE html>
<html>
<?php
include '../config.php';
// session_start();
$user = $_SESSION['username'];
// $query = mysqli_query($connect,"SELECT * FROM users WHERE username='$user'");
$query = mysqli_query($connect, "SELECT * FROM users WHERE username='$user'");

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>File Enkripsi & Dekripsi AES</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo/logologo1.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.minn.css">
    <!-- Bootstrap CSS
		============================================ -->

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="../assets/assets/fontawesome/css/allxxx.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- nalika Icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/nalika-icon.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/mainnnxx.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-verticalll.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="stylezz.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

<!-- Sidebar -->
<div class="left-sidebar-pro">
    <nav id="sidebar" class="">
    <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logologo1.png" alt="" /></a>
                <strong><img src="img/logo/logos.png" alt=""></strong>
            </div>
            <div class="nalika-profile">
                <div class="profile-dtl">
                    <a href="#"><img src="img\logo.jpg" alt="" /></a>
                    <?php while ($data = mysqli_fetch_array($query)) { ?>
                    <h2><strong><?php echo $data['fullname']; ?><p class="designation icon" style="color:green;">
                            <?php echo $data['job_title']; ?></p></strong>
                    </h2><?php } ?>
                </div>
                <div class="profile-social-dtl">
                    <!-- <ul class="dtl-social">
                        <li><a href="#"><i class="icon nalika-facebook"></i></a></li>
                        <li><a href="#"><i class="icon nalika-twitter"></i></a></li>
                        <li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
                    </ul> -->
                </div>
            </div>
        <!-- ... (kode sidebar yang sudah ada) ... -->
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
            <nav class="sidebar-nav left-sidebar-menu-pro">
                <ul class="metismenu" id="menu1">
                    <!-- ... (menu yang sudah ada) ... -->
                    <li class="active">
                            <a class="nav-link" href="index.php">
                                <i class="fa-solid fa-table-columns"></i>
                                <span class="mini-click-non">Dashboard</span>
                            </a>
                        </li>
                     <li class="active">
                            <a class="nav-link" href="arsip.php">
                                <i class="fa-solid fa-file-zipper"></i>
                                <span class="mini-click-non">Arsip</span>
                            </a>
                      </li>
                      <li>
                          <a class="nav-link" href="#" aria-expanded="false">
                              <i class="fa-solid fa-users" style="margin-right : 12px;"></i> <span class="mini-click-non">Manajemen User</span>
                          </a>
                          <ul class="submenu-angle" aria-expanded="false">
                            <li><a class="nav-link" href="gantipassword.php" aria-expanded="false">
                              <!-- <i class="fa-solid fa-keyboard"></i> -->
                              <i class="fa-solid fa-pen-nib"></i>
                              <span class="mini-click-non">Ganti
                                    Password</span></a>
                            </li>
                              <!-- <li><a title="Log Activity" href="log_activity.php"><span class="mini-sub-pro">log_activity</span></a></li> -->
                              <!-- <li><a title="Pengguna Online" href="pengguna-online.php"><span class="mini-sub-pro">Pengguna Online</span></a></li> -->
                              <!-- Anda dapat menambahkan item dropdown lainnya di sini sesuai kebutuhan -->
                          </ul>
                      </li>
                        <li>
                            <a class="nav-link" href="logout.php" aria-expanded="false"><i
                                    class="fa-solid fa-right-from-bracket"></i> <span
                                    class="mini-click-non">Logout</span></a>
                        </li>
                    <!-- ... (menu yang sudah ada) ... -->
                </ul>
            </nav>
        </div>
    </nav>
</div>
<!-- End Sidebar -->


    


    