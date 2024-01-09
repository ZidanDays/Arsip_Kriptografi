<?php include 'header.php'; ?>

<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/favicon.png" alt="" /></a>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="all-content-wrapper">
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                        <div class="panel">

                            <div class="panel-heading">
                                <h3 class="panel-title">Ganti Password</h3>
                            </div>

                            <div class="panel-body">

                            <?php
                                if (isset($_GET['alert'])) {
                                    if ($_GET['alert'] == "sukses") {
                                        echo "<div class='alert alert-success'>Password anda berhasil diganti!</div>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Ulangi Password! Konfirmasi Password Salah !!!</div>";
                                    }
                                }
                            ?>


                                <form action="gantipassword_act.php" method="post">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Masukkan Password Lama .." name="passworda" required="required" min="5">
                                    </div>
                                    <div class="form-group">
                                        <label>Password Baru</label>
                                        <input type="password" class="form-control" placeholder="Masukkan Password Baru .." name="passwordb" required="required" min="5">
                                    </div>
                                    <div class="form-group">
                                        <label>Ulangi Password</label>
                                        <input type="password" class="form-control" placeholder="Ulangi Password Baru .." name="passwordc" required="required" min="5">
                                    </div>
                                    <div class="form-group-simpan">
                                        <input type="submit" class="btn btn-primary-simpan" value="Simpan">
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

        <?php include 'footer.php'; ?>
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