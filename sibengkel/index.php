<?php
include("sess_check.php");
include("dist/function/format_rupiah.php");

$tgl = date('Y-m-d');
$ttl = 0;
$filter_karyawan = $_GET['filter_k'] ?? null;
$sql = "SELECT reservations.*, sparepart.harga as harga_sparepart, jasa_servis.harga as harga_jasa FROM reservations 
    LEFT JOIN sparepart ON sparepart.kode=reservations.kode_sparepart
    LEFT JOIN jasa_servis ON jasa_servis.id=reservations.id_jasa_servis
WHERE tanggal='$tgl'" . ($filter_karyawan ? "AND id_karyawan = '$filter_karyawan'" : "");
$ress = mysqli_query($conn, $sql);
$jmltrx = mysqli_num_rows($ress);
// query database mencari data admin
while ($data = mysqli_fetch_array($ress)) {
    $sparepart = $data['harga_sparepart'] ?? 0;
    $jasa = $data['harga_jasa'] ?? 0;
    $tot = $sparepart + $jasa;
    $ttl += $tot;
}
// deskripsi halaman
$pagedesc = "Beranda";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Beranda</h1>
            </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->

        <!-- Filter Karyawan -->
        <div class="row">
            <div class="col-lg-6">
                <select id="input-filter_k" name="id_karyawan" class="form-control" required style="margin-bottom: 10px;">
                    <option value="">Pilih Karyawan</option>
                    <?php
                    $sqlKaryawan = "SELECT * FROM karyawan ORDER BY nama_karyawan ASC";
                    $ressKaryawan = mysqli_query($conn, $sqlKaryawan);
                    while ($dataKaryawan = mysqli_fetch_array($ressKaryawan)) {
                        $selectedKaryawan = ($dataKaryawan['id_karyawan'] == $filter_karyawan) ? 'selected' : '';
                        echo "<option value='" . $dataKaryawan['id_karyawan'] . "' $selectedKaryawan>" . $dataKaryawan['nama_karyawan'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-check-circle fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $jmltrx; ?></div>
                                <div>
                                    <h4>Transaksi Hari Ini</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="reservation.php">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat Rincian</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div><!-- /.panel-green -->

            <div class="col-lg-6 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plus-circle fa-3x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo format_rupiah($ttl); ?></div>
                                <div>
                                    <h4>Pendapatan Hari Ini</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="reservation.php">
                        <div class="panel-footer">
                            <span class="pull-left">Lihat Rincian</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div><!-- /.panel-green -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script>
    $('document').ready(function() {
        $('#input-filter_k').on('change', function() {
            if (isNaN(this.value))
                return;
            else {
                let url = new URL(window.location.href);
                url.searchParams.set('filter_k', this.value);
                window.location.href = url.href;
            }
        });
    })
</script>
<?php
include("layout_bottom.php");
?>