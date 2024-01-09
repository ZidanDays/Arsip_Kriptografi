<?php include 'header.php'; ?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="breadcome-heading">
                                <h4 style="margin-bottom: 0px">Edit Arsip</h4>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <ul class="breadcome-menu" style="padding-top: 0px">
                                <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                <li><span class="bread-blod">Arsip</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Arsip</h3>
                </div>
                <div class="panel-body">
                    <div class="pull-right">
                        <a href="arsip.php" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    </div>

                    <br>
                    <br>

                    <?php 
                    $id = $_GET['id'];              
                    $data = mysqli_query($connect, "SELECT * FROM file, ruang WHERE id_ruang=ruang_id AND id_file='$id'");
                    while($d = mysqli_fetch_array($data)){
                    ?>

                    <form method="post" action="arsip_update.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><h3>Kode Arsip</h3></label>
                            <input type="hidden" name="id" value="<?php echo $d['id_file']; ?>">
                            <input type="text" class="form-control" name="kode" required="required"
                                value="<?php echo $d['arsip_kode']; ?>">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label><h3>Nama Arsip</h3></label>
                            <input type="text" class="form-control" name="nama" required="required"
                                value="<?php echo $d['arsip_nama']; ?>">
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label><h3>Kategori</h3></label>
                            <select class="form-control" name="kategori" required="required">
                                <option value="">Pilih kategori</option>
                                <?php 
                                $kategori = mysqli_query($connect,"SELECT * FROM kategori");
                                while($k = mysqli_fetch_array($kategori)){
                                ?>
                                <option <?php if($k['kategori_id'] == $d['file_kategori']){echo "selected='selected'";} ?>
                                    value="<?php echo $k['kategori_id']; ?>"><?php echo $k['kategori_nama']; ?></option>
                                <?php 
                                }
                                ?>
                            </select>
                        </div>
                        <br><br>
                        <div>
                            <h3><h3>Lokasi Penyimpanan</h3></h3>
                            <div>
                                <label>Ruang</label>
                                <select class="form-control" name="ruang" required="required">
                                    <option value=""><?php echo $d['kode_ruang']; ?></option>
                                    <?php 
                                    $ruang = mysqli_query($connect, "SELECT * FROM ruang");
                                    while($k = mysqli_fetch_array($ruang)){
                                    ?>
                                    <option <?php if($k['ruang_id'] == $d['id_ruang']){echo "selected='selected'";} ?>
                                    value="<?php echo $k['ruang_id']; ?>"><?php echo $k['kode_ruang']; ?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <label>Rak</label>
                            <input type="text" class="form-control" name="rak" required="required"
                                value="<?php echo $d['rak']; ?>"></input>
                            <br>
                            <label>Box</label>
                            <input type="number" class="form-control" name="box" required="required"
                                value="<?php echo $d['box']; ?>"></input>
                            <br>
                            <label>Map</label>
                            <input type="number" class="form-control" name="map" required="required"
                                value="<?php echo $d['map']; ?>"></input>
                            <br>
                            <label>Urut</label>
                            <input type="number" class="form-control" name="urut" required="required"
                                value="<?php echo $d['urut']; ?>"></input>
                        </div>
                        <br><br>
                        <div class=" form-group">
                            <label><h3>Keterangan</h3></label>
                            <textarea class="form-control" name="keterangan"
                                required="required"><?php echo $d['keterangan']; ?></textarea>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" class="btn btn-primary" value="Ubah">
                        </div>
                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
