<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Data Barang";
include("layout_top.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
include("../dist/function/reservation_status.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Riwayat Service</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="reservation_form.php" class="btn btn-success">Reservasi</a>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="tabel-data">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th width="10%">Tanggal</th>
									<th width="10%">Keluhan</th>
									<th width="5%">Penanganan</th>
									<th width="10%">Catatan</th>
									<th width="10%">Nopol</th>
									<th width="10%">Jenis Jasa</th>
									<th width="10%">Sparepart</th>
									<th width="10%">Status</th>
									<th width="10%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = "SELECT * FROM reservations WHERE id_pelanggan = " . $sess_pelangganid . " ORDER BY tanggal DESC";
								$ress = mysqli_query($conn, $sql);
								while ($data = mysqli_fetch_array($ress)) {
									echo '<tr>';
									echo '<td class="text-center">' . $i . '</td>';
									echo '<td class="text-center">' . $data['tanggal'] . '</td>';
									echo '<td class="text-center">' . $data['keluhan'] . '</td>';
									echo '<td class="text-center">' . $data['penanganan'] . '</td>';
									echo '<td class="text-center">' . $data['catatan'] . '</td>';
									echo '<td class="text-center">' . $data['nopol'] . '</td>';
									echo '<td class="text-center">' . $data['id_jasa_servis'] . '</td>';
									echo '<td class="text-center">' . $data['kode_sparepart'] . '</td>';
									echo '<td class="text-center">' . getStatusReservation($data['status']) . '</td>';
									echo '<td class="text-center">'; ?>
									<a href="barang_hapus.php?brg=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['id']; ?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
								<?php
									echo '</td>';
									echo '</tr>';
									$i++;
								}
								?>
							</tbody>
						</table>
						<div class="form-group">
							<!-- <a href="barang_stok.php" target="_blank" class="btn btn-warning">Cetak</a> -->
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
				"targets": [5]
			}]
		});

		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
<script>
	var app = {
		code: '0'
	};

	$('[data-load-code]').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var code = $this.data('load-code');
		if (code) {
			$($this.data('remote-target')).load('karyawan_detail.php?code=' + code);
			app.code = code;

		}
	});
</script>
<?php
include("layout_bottom.php");
?>