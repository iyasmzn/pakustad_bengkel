<?php
include("sess_check.php");

// deskripsi halaman
$pagedesc = "Data Kendaraan";
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
				<h1 class="page-header">Data Kendaraan</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<a href="kendaraan_tambah.php" class="btn btn-success">Tambah</a>
					</div>
					<div class="panel-body">
						<table class="table table-striped table-bordered table-hover" id="tabel-data">
							<thead>
								<tr>
									<th width="1%">No</th>
									<th width="10%">Nopol</th>
									<th width="20%">Merk</th>
									<th width="5%">Tipe</th>
									<th width="5%">Transmisi</th>
									<th width="5%">Kapasitas</th>
									<th width="5%">Tahun</th>
									<th width="20%">Pelanggan</th>
									<th width="5%">Opsi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 1;
								$sql = "SELECT kendaraan.*, pelanggan.nama as nama_pelanggan FROM kendaraan 
											LEFT JOIN pelanggan ON pelanggan.id_pelanggan=kendaraan.id_pelanggan
											WHERE id_kendaraan!='0' ORDER BY nopol ASC";
								$ress = mysqli_query($conn, $sql);
								while ($data = mysqli_fetch_array($ress)) {
									echo '<tr>';
									echo '<td class="text-center">' . $i . '</td>';
									echo '<td class="text-center">' . $data['nopol'] . '</td>';
									echo '<td class="text-center">' . $data['merk'] . '</td>';
									echo '<td class="text-center">' . $data['tipe'] . '</td>';
									echo '<td class="text-center">' . $data['transmisi'] . '</td>';
									echo '<td class="text-center">' . $data['kapasitas'] . '</td>';
									echo '<td class="text-center">' . $data['tahun'] . '</td>';
									echo '<td class="text-center">' . $data['nama_pelanggan'] . '</td>';
									echo '<td class="text-center">
													  <a href="kendaraan_edit.php?id_kendaraan=' . $data['id_kendaraan'] . '" class="btn btn-warning btn-xs">Edit</a>'; ?>
									<a href="kendaraan_hapus.php?id_kendaraan=<?php echo $data['id_kendaraan']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['nopol']; ?>?');" class="btn btn-danger btn-xs">Hapus</a></td>
								<?php
									echo '</td>';
									echo '</tr>';
									$i++;
								}
								?>
							</tbody>
						</table>
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