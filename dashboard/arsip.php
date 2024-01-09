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
<?php include 'header.php'; ?>
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


        <section class="breadcome-list">
        <a href="enkripsi.php" class="btn btn-success mb-10">Upload & Enkripsi</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive" style="color:#fff;">
                        <table id="file" class="table striped">
                            <thead>
                                <tr>
                                    <!-- <td style="color:#fff;"><strong>ID File</strong></td> -->
                                    <td style="color:#fff;"><strong>No</strong></td>
                                    <td style="color:#fff;"><strong>Upload By</strong></td>
                                    <td style="color:#fff;"><strong>Nama File</strong></td>
                                    <td style="color:#fff;"><strong>Arsip</strong></td>
                                    <td style="color:#fff;"><strong>Kategori</strong></td>
                                    <td style="color:#fff;"><strong>Nama File Enkripsi</strong></td>
                                    <td style="color:#fff;"><strong>Ukuran File</strong></td>
                                    <td style="color:#fff;"><strong>Tanggal</strong></td>
                                    <td style="color:#fff;"><strong>Ruang</strong></td>
                                    <td style="color:#fff;"><strong>Rak</strong></td>
                                    <td style="color:#fff;"><strong>Box</strong></td>
                                    <td style="color:#fff;"><strong>Map</strong></td>
                                    <td style="color:#fff;"><strong>Urut</strong></td>
                                    <td style="color:#fff;"><strong>Status</strong></td>
                                    <td class="text-center" width="20%" style=" color:#fff;">
                                        <strong>Opsi</strong>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($connect, "SELECT * FROM file,kategori,ruang WHERE file_kategori=kategori_id and id_ruang=ruang_id  GROUP BY id_file DESC");
                                // $query = mysqli_query($connect,"SELECT * FROM file,kategori,ruang WHERE file_kategori=kategori_id and ruang_id=ruang_id  ORDER BY id_file DESC");
                                while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <!-- <td><?php echo $data['id_file']; ?></td> -->
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['file_name_source']; ?></td>
                                    <td>

                                        <b>KODE</b> : <?php echo $data['arsip_kode'] ?><br>
                                        <b>Nama</b> : <?php echo $data['arsip_nama'] ?><br>
                                        <!-- <b>Jenis</b> : <?php echo $data['arsip_jenis'] ?><br> -->

                                    </td>
                                    <td><?php echo $data['kategori_nama']; ?></td>
                                    <td><?php echo $data['file_name_finish']; ?></td>
                                    <td><?php echo $data['file_size']; ?> KB</td>
                                    <td><?php echo $data['tgl_upload']; ?></td>
                                    <td><?php echo $data['kode_ruang'] ?></td>
                                    <td><?php echo $data['rak'] ?></td>
                                    <td><?php echo $data['box'] ?></td>
                                    <td><?php echo $data['map'] ?></td>
                                    <td><?php echo $data['urut'] ?></td>
                                    <td><?php if ($data['status'] == 1) {
                                                echo "<span class='btn btn-danger'>Encrypt</span>";
                                            } elseif ($data['status'] == 2) {
                                                echo "<span class='btn btn-success'>Decrypt</span>";
                                            } else {
                                                echo "<span class='btn btn-danger'>Status Tidak Diketahui</span>";
                                            }
                                            ?></td>
                                    <td class="text-center">
                                        <div class="modal fade" id="exampleModal_<?php echo $data['id_file']; ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" style="color:#F44336;"
                                                            id="exampleModalLabel">PERINGATAN!</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" style="color:#F44336;">
                                                        Apakah anda yakin ingin menghapus data ini? <br>file dan semua
                                                        yang
                                                        berhubungan akan dihapus secara permanen.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal" style="color:#777777">Batalkan</button>
                                                        <a href=" arsip_hapus.php?id=<?php echo $data['id_file']; ?>"
                                                            class="btn btn-primary"><i class="fa fa-check"></i> &nbsp;
                                                            Ya, hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-group">
                                            <?php if ($data['status'] == 2) { ?>
                                            <a target="_blank" class="btn btn-default"
                                                href="hasil_dekripsi/<?php echo $data['file_name_source']; ?>"><i
                                                    class="fa fa-download"></i></a>

                                            <!-- button lock -->
                                            <a href="encrypt-file.php?id_file=<?php echo $data['id_file']; ?>"
                                                class="btn btn-default">
                                                Lock <i class="fa-solid fa-lock"></i></i></a>

                                            <?php } elseif ($data['status'] == 1) { ?>
                                            <a target="_blank" class="btn btn-default"
                                                href="hasil_enkripsi/<?php echo $data['file_name_finish']; ?>"><i
                                                    class="fa fa-download"></i></a>

                                            <a href="decrypt-file.php?id_file=<?php echo $data['id_file']; ?>"
                                                class="btn btn-default">
                                                Unlock <i class="fa-solid fa-unlock"></i></i></a>
                                            <?php } ?>
                                            <!-- preview -->
                                            <!-- <a target="_blank"
                                                href="arsip_preview.php?id=<?php echo $data['id_file']; ?>"
                                                class="btn btn-default"><i class="fa fa-search"></i> Preview</a> -->
                                            <a href="arsip_edit.php?id=<?php echo $data['id_file']; ?>"
                                                class="btn btn-default"><i class="fa fa-wrench"></i></a>

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal_<?php echo $data['id_file']; ?>">
                                                <i class="fa fa-trash"></i>
                                            </button>


                                        </div>
                                    </td>
                                </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>
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