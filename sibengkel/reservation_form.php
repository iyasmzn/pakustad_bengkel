<?php
include("sess_check.php");
// deskripsi halaman
$pagedesc = "Reservation";
$menuparent = "reservation";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Reservasi</h1>
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
                            <!-- Tanggal -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Tanggal</label>
                                <div class="col-sm-4">
                                    <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>
                                </div>
                            </div>
                            <!-- Pelanggan -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Pelanggan</label>
                                <div class="col-sm-4">
                                    <select name="id_pelanggan" class="form-control" required>
                                        <option value="">Pilih Pelanggan</option>
                                        <?php
                                        $sqlPelanggan = "SELECT * FROM pelanggan ORDER BY nama ASC";
                                        $ressPelanggan = mysqli_query($conn, $sqlPelanggan);

                                        while ($dataPelanggan = mysqli_fetch_array($ressPelanggan)) {
                                            echo "<option value='" . $dataPelanggan['id_pelanggan'] . "'>" . $dataPelanggan['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Kendaraan -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Kendaraan</label>
                                <div class="col-sm-4">
                                    <select name="nopol" class="form-control">
                                        <option value="">Pilih Kendaraan</option>
                                        <?php
                                        $sqlKendaraan = "SELECT * FROM kendaraan ORDER BY nopol ASC";
                                        $ressKendaraan = mysqli_query($conn, $sqlKendaraan);

                                        while ($dataKendaraan = mysqli_fetch_array($ressKendaraan)) {
                                            echo "<option value='" . $dataKendaraan['nopol'] . "'>" . $dataKendaraan['nopol'] . ' - ' . $dataKendaraan['merk'] . ' '  . $dataKendaraan['tipe']  . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Keluhan -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Keluhan</label>
                                <div class="col-sm-4">
                                    <textarea name="keluhan" class="form-control" placeholder="Keluhan"></textarea>
                                </div>
                            </div>
                            <!-- Penanganan -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Penanganan</label>
                                <div class="col-sm-4">
                                    <textarea name="penanganan" class="form-control" placeholder="Penanganan"></textarea>
                                </div>
                            </div>
                            <!-- Jasa Servis -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Jasa Servis</label>
                                <div class="col-sm-4">
                                    <select name="id_jasa_servis" class="form-control">
                                        <option value="">Pilih Jasa</option>
                                        <?php
                                        $sqlJasa = "SELECT * FROM jasa_servis ORDER BY jenis ASC";
                                        $ressJasa = mysqli_query($conn, $sqlJasa);

                                        while ($dataJasa = mysqli_fetch_array($ressJasa)) {
                                            echo "<option value='" . $dataJasa['id'] . "'>" . $dataJasa['jenis'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Sparepart -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Sparepart</label>
                                <div class="col-sm-4">
                                    <select name="kode_sparepart" class="form-control">
                                        <option value="">Pilih Sparepart</option>
                                        <?php
                                        $sqlSparepart = "SELECT * FROM sparepart ORDER BY nama ASC";
                                        $ressSparepart = mysqli_query($conn, $sqlSparepart);

                                        while ($dataSparepart = mysqli_fetch_array($ressSparepart)) {
                                            echo "<option value='" . $dataSparepart['kode'] . "'>" . $dataSparepart['nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- Catatan -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Catatan</label>
                                <div class="col-sm-4">
                                    <textarea name="catatan" class="form-control" placeholder="Catatan"></textarea>
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="form-group">
                                <label class="control-label col-sm-3">Status</label>
                                <div class="col-sm-4">
                                    <select name="status" class="form-control" required>
                                        <option value="0">Antrian</option>
                                        <option value="1">Proses</option>
                                        <option value="2">Sudah Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <button type="submit" name="perbarui" class="btn btn-success">Simpan</button>
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