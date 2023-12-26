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
$query = mysqli_query($connect, "SELECT fullname,job_title,last_activity FROM users WHERE username='$user'");

?>
<?php include 'header.php'; ?>
<!-- Start Welcome area -->
<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
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
                                        <button type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
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
        <section class="breadcome-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive" style="color:#fff;">
                                <table id="file" class="table striped">
                                    <thead>
                                        <tr>
                                            <td width="5%"><strong>No</strong></td>
                                            <td width="20%"><strong>Nama File Sumber</strong></td>
                                            <td width="20%"><strong>Nama File Enkripsi</strong></td>
                                            <td width="20%"><strong>Path File</strong></td>
                                            <!-- <td width="15%"><strong>Status File</strong></td> -->
                                            <td width="10%"><strong>Aksi</strong></td>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                            <?php
                                            $i = 1;
                                            $query = mysqli_query($connect, "SELECT * FROM file ORDER BY id_file DESC");
                                            while ($data = mysqli_fetch_array($query)) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $data['file_name_source']; ?></td>
                                                <td><?php echo $data['file_name_finish']; ?></td>
                                                <td><?php echo $data['file_url']; ?></td>
                                                <td><?php if ($data['status'] == 1) {
                                                        echo "Enkripsi";
                                                    } elseif ($data['status'] == 2) {
                                                        echo "Dekripsi";
                                                    } else {
                                                        echo "Status Tidak Diketahui";
                                                    }
                                                    ?></td>
                                                <td>
                                                    <?php
                                                    $a = $data['id_file'];
                                                    if ($data['status'] == 1) {
                                                        echo '<a href="decrypt-file.php?id_file=' . $a . '" class="btn btn-primary">Decrypt File</a>';
                                                    } elseif ($data['status'] == 2) {
                                                        echo '<a href="enkripsi.php" class="btn btn-success">Enkripsi File</a>';
                                                    } else {
                                                        echo '<a href="dekripsi.php" class="btn btn-danger">Data Tidak Diketahui</a>';
                                                    }
                                                    ?>

                                                </td>
                                            </tr>
                                            <?php
                                                $i++;
                                            } ?>
                                        </tbody> -->
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $query = mysqli_query($connect, "SELECT * FROM file WHERE status = 1 ORDER BY id_file DESC");
                                        while ($data = mysqli_fetch_array($query)) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $data['file_name_source']; ?></td>
                                            <td><?php echo $data['file_name_finish']; ?></td>
                                            <td><?php echo $data['file_url']; ?></td>
                                            <!-- <td><?php if ($data['status'] == 1) {
                                                                echo "Enkripsi";
                                                            } elseif ($data['status'] == 2) {
                                                                echo "Dekripsi";
                                                            } else {
                                                                echo "Status Tidak Diketahui";
                                                            }
                                                            ?></td> -->
                                            <td>
                                                <?php
                                                    $a = $data['id_file'];
                                                    if ($data['status'] == 1) {
                                                        echo '<a href="decrypt-file.php?id_file=' . $a . '" class="btn btn-primary">Decrypt File</a>';
                                                    } elseif ($data['status'] == 2) {
                                                        echo '<a href="enkripsi.php" class="btn btn-success">Enkripsi File</a>';
                                                    } else {
                                                        echo '<a href="dekripsi.php" class="btn btn-danger">Data Tidak Diketahui</a>';
                                                    }
                                                    ?>

                                            </td>
                                        </tr>
                                        <?php
                                            $i++;
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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