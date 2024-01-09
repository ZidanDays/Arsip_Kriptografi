<?php
session_start();
include('../config.php');
if (empty($_SESSION['username'])) {
    header("location:../index.php");
}
$last = $_SESSION['username'];
$sqlupdate = "UPDATE users SET last_activity=now() WHERE username='$last'";
$queryupdate = mysqli_query($connect, $sqlupdate);
?>
<!DOCTYPE html>
<html>
<?php
$user = $_SESSION['username'];
$query = mysqli_query($connect, "SELECT * FROM users WHERE username='$user'");

?>

<?php include 'header.php'; ?>

<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                <a href="index.html"><img class="main-logo" src="img/logo/favicon.png" alt="" /></a>
                    <!-- <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a> -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid" style="background-color: #0a1323;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- Search -->
                                <!-- <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n hd-search-rp">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="text" placeholder="Search..." class="form-control">
                                                <a href=""><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item">
                                                <a href="logout.php"> Log Out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        <section class="breadcome-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" method="post" action="encrypt-process.php" enctype="multipart/form-data">
                                <fieldset>
                                    <legend style="color:#fff;">
                                        <h2>Form Enkripsi</h2>
                                    </legend>
                                    <!-- <div class="form-group">
                          <label class="col-lg-2 control-label" style="color:#484747;" for="inputPassword">Tanggal</label>
                          <div class="col-lg-4">
                            <input class="form-control" id="inputTgl" type="text" placeholder="Tanggal" name="datenow" value="<?php echo date("Y-m-d"); ?>" readonly>
                          </div>
                        </div> -->
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;">
                                            <h3>Kode Arsip</h3>
                                        </label>
                                        <div class="col-lg-4">
                                            <input type="text" class="form-control" name="kode" required="required">
                                        </div>

                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;">
                                            <h3>Nama Arsip</h3>
                                        </label>
                                        <div class="col-lg-4"> <input type="text" class="form-control" name="nama" required="required"> </div>

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;">
                                            <h3>Kategori</h3>
                                        </label>
                                        <div class="col-lg-4">
                                            <select class="form-control" name="kategori" required="required">
                                                <option value="">Pilih kategori</option>
                                                <?php
                                                $kategori = mysqli_query($connect, "SELECT * FROM kategori");
                                                while ($k = mysqli_fetch_array($kategori)) {
                                                ?>
                                                    <option value="<?php echo $k['kategori_id']; ?>">
                                                        <?php echo $k['kategori_nama']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;">
                                            <h3>Lokasi Penyimpanan</h3>
                                        </label>

                                        <div class="col-lg-4">
                                            <label style="color:#fff;">Ruang</label>
                                            <!-- <input type="text" class="form-control" name="ruang" required="required"></input> -->
                                            <select class="form-control" name="ruang" required="required">
                                                <option value="">Pilih Ruang</option>
                                                <?php
                                                $ruang = mysqli_query($connect, "SELECT * FROM ruang");
                                                while ($k = mysqli_fetch_array($ruang)) {
                                                ?>
                                                    <option value="<?php echo $k['ruang_id']; ?>">
                                                        <?php echo $k['kode_ruang']; ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <br>

                                            <label style="color:#fff;">Rak</label>
                                            <input type="number" class="form-control" name="rak" required="required"></input>
                                            <br>

                                            <label style="color:#fff;">Box</label>
                                            <input type="number" class="form-control" name="box" required="required"></input>
                                            <br>

                                            <label style="color:#fff;">Map</label>
                                            <input type="number" class="form-control" name="map" required="required"></input>
                                            <br>

                                            <label style="color:#fff;">Urut</label>
                                            <input type="number" class="form-control" name="urut" required="required"></input>
                                            <br>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;" for="inputFile">
                                            <h3>
                                                File</h3>
                                        </label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="inputFile" placeholder="Input File" type="file" name="file" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;" for="inputPassword">
                                            <h3>Key</h3>
                                        </label>
                                        <div class="col-lg-4">
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Password" name="pwdfile" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" style="color:#fff;" for="textArea">
                                            <h3>Keterangan</h3>
                                        </label>
                                        <div class="col-lg-4">
                                            <textarea class="form-control" id="textArea" rows="3" name="desc" placeholder="Deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="textArea"></label>
                                        <div class="col-lg-2">
                                            <input type="submit" name="encrypt_now" value="Enkripsi File" class="form-control btn btn-info">
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

        </section>
    </div>
    <?php include "footer.php";  ?>
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
    <script src="js/main.js"></script>
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
    <script src="../assets/plugins/datatables/js/jquery.dataTables.js"></script>
    <script src="../assets/js/essential-plugins.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/pace.min.js"></script>
    <script src="../assets/js/main.js"></script>
    </body>



</html>