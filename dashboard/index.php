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
<?php include 'header.php' ?>
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
        <div class="section-admin container-fluid">
            <div class="row admin text-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>Total Arsip</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <h1><i class="icon nalika-user icon-wrap" style="color:tomato;"></i></h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaluser FROM file");
                                            $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datauser['totaluser']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-15">
                                <h4 class="text-left text-uppercase"><b>User</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <h1><i class="icon nalika-user icon-wrap" style="color:tomato;"></i></h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaluser FROM users");
                                            $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datauser['totaluser']; ?></h2>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12" style="margin-bottom:1px;">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Total File Enkripsi</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <h1><i class="icon nalika-unlocked icon-wrap" style="color:tomato;"></i>
                                        </h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totalencrypt FROM file WHERE status='1'");
                                            $dataencrypt = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $dataencrypt['totalencrypt']; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Enkripsi</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <h1><i class="icon nalika-unlocked icon-wrap" style="color:tomato;"></i>
                                        </h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totalencrypt FROM file WHERE status='1'");
                                            $dataencrypt = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $dataencrypt['totalencrypt']; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Total File Dekripsi</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <h1><i class="icon nalika-unlocked icon-wrap" style="color:tomato;"></i>
                                        </h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaldecrypt FROM file WHERE status='2'");
                                            $datadecrypt = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datadecrypt['totaldecrypt']; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Dekripsi</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="text-left col-xs-3 mar-bot-15">
                                        <h1><i class="icon nalika-unlocked icon-wrap" style="color:tomato;"></i>
                                        </h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaldecrypt FROM file WHERE status='2'");
                                            $datadecrypt = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datadecrypt['totaldecrypt']; ?>
                                        </h2>
                                    </div>
                                </div>
                            </div> -->
                        </div>

                        <!-- <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Total Arsip</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <h1><i class="icon nalika-user icon-wrap" style="color:tomato;"></i></h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaluser FROM users");
                                            $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datauser['totaluser']; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>Kategori Arsip</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <h1><i class="icon nalika-user icon-wrap" style="color:tomato;"></i></h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaluser FROM users");
                                            $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datauser['totaluser']; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                            <br><br>
                            <div class="admin-content analysis-progrebar-ctn res-mg-t-30">
                                <h4 class="text-left text-uppercase"><b>c</b></h4>
                                <div class="row vertical-center-box vertical-center-box-tablet">
                                    <div class="col-xs-3 mar-bot-15 text-left">
                                        <h1><i class="icon nalika-user icon-wrap" style="color:tomato;"></i></h1>
                                    </div>
                                    <div class="col-xs-9 cus-gh-hd-pro">
                                        <?php
                                            $query = mysqli_query($connect,"SELECT count(*) totaluser FROM users");
                                            $datauser = mysqli_fetch_array($query);
                                        ?>
                                        <h2 class="text-right no-margin"><?php echo $datauser['totaluser']; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- begin col-12 -->
            <div class="col-md-12">
                <div class="panel panel-inverse" data-sortable-id="index-1">
                    <div class="panel-heading">
                        <h4 class="panel-title"><i class="ion-stats-bars fa-lg text-warning"></i>
                            &nbsp;Statistik
                            Penyimpanan Arsip</h4>
                    </div>
                    <div class="panel-body">
                        <div id="container" class="height-sm"></div>
                    </div>
                </div>
            </div>
            <!-- end col-12 -->

            <div class="row">
                <!-- begin col-12 -->
                <div class="col-md-12">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <h4 class="panel-title"><i class="ion-stats-bars fa-lg text-warning"></i> &nbsp;Statistik
                                Jenis Surat</h4>
                        </div>
                        <div class="panel-body">
                            <div id="container-statistik-kategori" class="height-sm"></div>
                        </div>
                    </div>
                </div>
                <!-- end col-12 -->
            </div>
        </div>

    </div>
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

    </html>

    <?php
$R01 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R01'");
$R02 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R02'");
$R03 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R03'");
$R04 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R04'");
$R05 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R05'");
$R06 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R06'");
$R07 = mysqli_query($connect,"SELECT ruang.kode_ruang, file.rak, file.map, file.box, file.urut FROM ruang INNER JOIN file ON ruang.ruang_id=file.id_ruang WHERE kode_ruang = 'R07'");

?>

    <script src="../assets/js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'column'
            },
            title: {
                text: 'Statistik Jumlah Penyimpanan Arsip di Tiap - Tiap Ruang'
            },
            xAxis: {
                categories: ['Ruang']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Dokumen'
                }
            },
            series: [{
                    name: 'R01',
                    data: [<?php echo mysqli_num_rows($R01); ?>]
                },
                {
                    name: 'R02',
                    data: [<?php echo mysqli_num_rows($R02); ?>]
                },
                {
                    name: 'R03',
                    data: [<?php echo mysqli_num_rows($R03); ?>]
                },
                {
                    name: 'R04',
                    data: [<?php echo mysqli_num_rows($R04); ?>]
                },
                {
                    name: 'R05',
                    data: [<?php echo mysqli_num_rows($R05); ?>]
                },
                {
                    name: 'R06',
                    data: [<?php echo mysqli_num_rows($R06); ?>]
                },
                {
                    name: 'R07',
                    data: [<?php echo mysqli_num_rows($R07); ?>]
                },
            ]
        });
    });
    </script>


    <?php
$k1 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '1'");
$k2 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '3'");
$k3 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '4'");
$k4 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '5'");
$k5 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '6'");
$k6 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '7'");
$k7 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '8'");
$k8 = mysqli_query($connect,"SELECT kategori.kategori_id, file.rak, file.map, file.box, file.urut FROM kategori INNER JOIN file ON kategori.kategori_id=file.file_kategori WHERE kategori_id = '10'");

?>

    <script src="../assets/js/highcharts.js" type="text/javascript"></script>
    <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container-statistik-kategori',
                type: 'column'

            },
            title: {
                text: 'Statistik Jumlah Jenis - Jenis Arsip'
            },
            xAxis: {
                categories: ['Jenis Surat']
            },
            yAxis: {
                title: {
                    text: 'Jumlah Dokumen'
                }
            },
            series: [{
                    name: 'Tidak Berkategori',
                    data: [<?php echo mysqli_num_rows($k1); ?>]
                },
                {
                    name: 'Surat Keputusan',
                    data: [<?php echo mysqli_num_rows($k2); ?>]
                },
                {
                    name: 'Surat Izin Pelayanan',
                    data: [<?php echo mysqli_num_rows($k3); ?>]
                },
                {
                    name: 'Surat Perintah Kerja Proyek Jalan',
                    data: [<?php echo mysqli_num_rows($k4); ?>]
                },
                {
                    name: 'Surat Perintah Kerja Proyek Jembatan',
                    data: [<?php echo mysqli_num_rows($k5); ?>]
                },
                {
                    name: 'Surat Kesehatan Pegawai',
                    data: [<?php echo mysqli_num_rows($k6); ?>]
                },
                {
                    name: 'Surat Lampiran',
                    data: [<?php echo mysqli_num_rows($k7); ?>]
                },
                {
                    name: 'Curiculum Vitae',
                    data: [<?php echo mysqli_num_rows($k8); ?>]
                },
            ]
        });
    });
    </script>