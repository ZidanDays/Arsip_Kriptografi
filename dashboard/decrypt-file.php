<?php
session_start();
include('../config.php');
if(empty($_SESSION['username'])){
header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect,$sqlupdate);
?>

<?php include 'header.php'; ?>
<!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                    <!-- fix bug wkwkwk -->
                    <a href="index.html"><img class="main-logo" src="img/logo/favicon.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="breadcome-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            $id_file = $_GET['id_file'];
                            $query = mysqli_query($connect,"SELECT * FROM file WHERE id_file='$id_file'");
                            $data2 = mysqli_fetch_array($query);
                            ?>
                            <h3 align="center" style="color:#fff;">Dekripsi File <i
                                    style="color:red"><?php echo $data2['file_name_finish'] ?></i></h3><br>
                            <form class="form-horizontal" method="post" action="decrypt-process.php">
                                <div class="table-responsive">
                                    <table class="table striped" style="color:#fff;">
                                        <tr>
                                            <td>Nama File Sumber</td>
                                            <td>:</td>
                                            <td><?php echo $data2['file_name_source']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama File Enkripsi</td>
                                            <td>:</td>
                                            <td><?php echo $data2['file_name_finish']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Ukuran File</td>
                                            <td>:</td>
                                            <td><?php echo $data2['file_size']; ?> KB</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Enkripsi</td>
                                            <td>:</td>
                                            <td><?php echo $data2['tgl_upload']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td><?php echo $data2['keterangan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>PASSWORD</strong></td>
                                            <td>:</td>
                                            <td><strong><?php echo $data2['pwd_ori']; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Masukkan Password Untuk Mendekrip</td>
                                            <td></td>
                                            <td>
                                                <div class="col-md-6">
                                                    <input type="hidden" name="fileid"
                                                        value="<?php echo $data2['id_file'];?>">
                                                    <input class="form-control" id="inputPassword" type="password"
                                                        placeholder="Password" name="pwdfile" required><br>
                                                    <input type="submit" name="decrypt_now" value="Dekripsi File"
                                                        class="form-control btn btn-primary">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <?php include "footer.php";  ?>
        <!-- <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer-copy-right">
                            <h2 style="color:#fff;">Enkripsi File</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <!-- bootstrap JS
		============================================ -->
        <script src="js/bootstrap.min.js"></script>
        <!-- wow JS
		============================================ -->
        <script src="js/wow.min.js"></script>
        <!-- price-slider JS
		============================================ -->
        <script src="js/jquery-price-slider.js"></script>
        <!-- meanmenu JS
		============================================ -->
        <script src="js/jquery.meanmenu.js"></script>
        <!-- owl.carousel JS
		============================================ -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- sticky JS
		============================================ -->
        <script src="js/jquery.sticky.js"></script>
        <!-- scrollUp JS
		============================================ -->
        <script src="js/jquery.scrollUp.min.js"></script>
        <!-- mCustomScrollbar JS
		============================================ -->
        <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
        <!-- metisMenu JS
		============================================ -->
        <script src="js/metisMenu/metisMenu.min.js"></script>
        <script src="js/metisMenu/metisMenu-active.js"></script>
        <!-- sparkline JS
		============================================ -->
        <script src="js/sparkline/jquery.sparkline.min.js"></script>
        <script src="js/sparkline/jquery.charts-sparkline.js"></script>
        <!-- calendar JS
		============================================ -->
        <script src="js/calendar/moment.min.js"></script>
        <script src="js/calendar/fullcalendar.min.js"></script>
        <script src="js/calendar/fullcalendar-active.js"></script>
        <!-- float JS
		============================================ -->
        <script src="js/flot/jquery.flot.js"></script>
        <script src="js/flot/jquery.flot.resize.js"></script>
        <script src="js/flot/curvedLines.js"></script>
        <script src="js/flot/flot-active.js"></script>
        <!-- plugins JS
		============================================ -->
        <script src="js/plugins.js"></script>
        <!-- main JS
		============================================ -->
        <script src="../assets/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#file').dataTable({
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": true,
                "bAutoWidth": true,
                "order": [0, "asc"]
            });
        });
        </script>
        <script src="../assets/js/essential-plugins.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
        <script src="../assets/js/plugins/pace.min.js"></script>
        <script src="../assets/js/main.js"></script>
        </body>

        </html>