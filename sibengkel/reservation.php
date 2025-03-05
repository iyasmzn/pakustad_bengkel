<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Reservation";
include("layout_top.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
include("dist/function/reservation_status.php");
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
									<th width="10%">Pelanggan</th>
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
								$sql = "
									SELECT 
										A.*,
										B.jenis AS jenis_servis,
										C.nama AS nama_sparepart,
										D.nama AS nama_pelanggan
									FROM 
										reservations AS A
									LEFT JOIN 
										jasa_servis AS B ON A.id_jasa_servis = B.id
									LEFT JOIN 
										sparepart AS C ON A.kode_sparepart = C.kode
									LEFT JOIN 
										pelanggan AS D ON A.id_pelanggan = D.id_pelanggan
									ORDER BY 
										A.tanggal DESC
								";
								$ress = mysqli_query($conn, $sql);
								while ($data = mysqli_fetch_array($ress)) {
									echo '<tr>';
									echo '<td class="text-center">' . $i . '</td>';
									echo '<td class="text-center">' . $data['tanggal'] . '</td>';
									echo '<td class="text-center">' . $data['nama_pelanggan'] . '</td>';
									echo '<td class="text-center">' . $data['keluhan'] . '</td>';
									echo '<td class="text-center">' . $data['penanganan'] . '</td>';
									echo '<td class="text-center">' . $data['catatan'] . '</td>';
									echo '<td class="text-center">' . $data['nopol'] . '</td>';
									echo '<td class="text-center">' . $data['jenis_servis'] . '</td>';
									echo '<td class="text-center">' . $data['nama_sparepart'] . '</td>';
									echo '<td class="text-center">' . getStatusReservation($data['status']) . '</td>';
									echo '<td class="text-center">
										<a href="reservation_edit.php?res=' . $data['id_reservation'] . '" class="btn btn-warning btn-xs">Edit</a>'; ?>
									<a href="reservation_delete.php?id=<?php echo $data['id_reservation']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus?');" class="btn btn-danger btn-xs">Hapus</a></td>
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