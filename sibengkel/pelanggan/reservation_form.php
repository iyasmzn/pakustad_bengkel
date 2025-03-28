<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Reservasi";
$menuparent = "reservation";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Buat Reservasi</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <div class="row">
            <div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <form class="form-horizontal" action="reservation_insert.php" method="POST" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Tambah Data</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kendaraan</label>
                                <div class="col-sm-4">
                                    <select name="nopol" class="form-control">
                                        <option value="">Pilih Kendaraan</option>
                                        <?php
                                        $sqlKendaraan = "SELECT * FROM kendaraan WHERE id_pelanggan=" . $sess_pelangganid . " ORDER BY nopol ASC";
                                        $ressKendaraan = mysqli_query($conn, $sqlKendaraan);

                                        while ($dataKendaraan = mysqli_fetch_array($ressKendaraan)) {
                                            echo "<option value='" . $dataKendaraan['nopol'] . "'>" . $dataKendaraan['nopol'] . ' - ' . $dataKendaraan['merk'] . ' '  . $dataKendaraan['tipe']  . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3">Keluhan</label>
                                <div class="col-sm-4">
                                    <textarea name="keluhan" class="form-control" placeholder="Keluhan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                        </div>
                    </div><!-- /.panel -->
                </form>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<?php
include("layout_bottom.php");
?>