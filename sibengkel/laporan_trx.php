<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Laporan Data Transaksi";
include("layout_top.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">Laporan Data Reservasi</h1>
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <form method="get" name="laporan" onSubmit="return valid();">
              <div class="form-group">
                <div class="col-sm-4">
                  <label>Tanggal Awal</label>
                  <input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
                </div>
                <div class="col-sm-4">
                  <label>Tanggal Akhir</label>
                  <input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
                </div>
                <div class="col-sm-4">
                  <label>&nbsp;</label><br />
                  <input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
                </div>
              </div>
            </form>
          </div>
        </div>
        <?php
        if (isset($_GET['submit'])) {
          $no = 0;
          $mulai    = $_GET['awal'];
          $selesai = $_GET['akhir'];
          $sql = "SELECT reservations.*, pelanggan.*, karyawan.*, 
            sparepart.harga as harga_sparepart,
            jasa_servis.harga as harga_jasa
            FROM reservations
            LEFT JOIN pelanggan ON pelanggan.id_pelanggan=reservations.id_pelanggan
            LEFT JOIN karyawan ON karyawan.id_karyawan=reservations.id_karyawan
            LEFT JOIN sparepart ON sparepart.kode=reservations.kode_sparepart
            LEFT JOIN jasa_servis ON jasa_servis.id=reservations.id_jasa_servis
            WHERE reservations.tanggal BETWEEN '$mulai' AND '$selesai' ORDER BY reservations.id_reservation DESC";
          $ress = mysqli_query($conn, $sql);
        ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover" id="tabel-data">
                    <thead>
                      <tr>
                        <th width="1%">No</th>
                        <th width="10%">ID Reservasi</th>
                        <th width="10%">Tgl</th>
                        <th width="10%">Pelanggan</th>
                        <th width="10%">Karyawan</th>
                        <th width="10%">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $ttl = 0;
                      $i = 1;
                      while ($data = mysqli_fetch_array($ress)) {
                        $hargaSparepart = $data['harga_sparepart'] ?? 0;
                        $hargaJasa = $data['harga_jasa'] ?? 0;
                        $tot = $hargaSparepart + $hargaJasa;
                        echo '<tr>';
                        echo '<td class="text-center">' . $i . '</td>';
                        echo '<td class="text-center">' . $data['id_reservation'] . '</td>';
                        echo '<td class="text-center">' . $data['tanggal'] . '</td>';
                        echo '<td class="text-center">' . $data['nama'] . '</td>';
                        echo '<td class="text-center">' . $data['nama_karyawan'] . '</td>';
                        echo '<td class="text-center">' . format_rupiah($tot) . '</td>';
                        echo '</tr>';
                        $i++;
                        $ttl += $tot;
                      }
                      ?>
                    <tfoot>
                      <tr>
                        <th colspan="5" class="text-center">Total </th>
                        <th class="text-right"><?php echo format_rupiah($ttl); ?></th>
                      </tr>
                    </tfoot>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <a href="laporan_trx_cetak.php?awal=<?php echo $mulai; ?>&akhir=<?php echo $selesai; ?>" target="_blank" class="btn btn-warning">Cetak</a>
                  </div>
                </div>
                <!-- Large modal -->
                <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-body">
                        <p>One fine body…</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div><!-- /.panel -->
            </div><!-- /.col-lg-12 -->
          </div><!-- /.row -->
        <?php } ?>
      </div><!-- /.container-fluid -->
    </div><!-- /#page-wrapper -->
    <!-- bottom of file -->
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tabel-data').DataTable({
          "responsive": true,
          "processing": true,
          "columnDefs": [{
            "orderable": false,
            "targets": [4]
          }]
        });

        $('#tabel-data').parent().addClass("table-responsive");
      });
    </script>
    <script>
      var app = {
        code: '0'
      };
    </script>
    <?php
    include("layout_bottom.php");
    ?>