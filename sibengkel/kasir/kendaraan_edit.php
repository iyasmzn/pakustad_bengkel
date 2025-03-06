<?php
include("sess_check.php");

if (isset($_GET['id_kendaraan'])) {
	$sql = "SELECT * FROM kendaraan WHERE id_kendaraan='" . $_GET['id_kendaraan'] . "'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
}
// deskripsi halaman
$pagedesc = "Data Kendaraan";
$menuparent = "kendaraan";
include("layout_top.php");
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
				<form class="form-horizontal" action="kendaraan_update.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Edit Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Nopol</label>
								<div class="col-sm-4">
									<input type="text" name="nopol" class="form-control" placeholder="Nopol" value="<?php echo $data['nopol'] ?>" required>
									<input type="hidden" name="id_kendaraan" class="form-control" placeholder="ID Pelanggan" value="<?php echo $data['id_kendaraan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Merk</label>
								<div class="col-sm-4">
									<input type="text" name="merk" class="form-control" placeholder="Merk" value="<?php echo $data['merk'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tipe</label>
								<div class="col-sm-4">
									<input type="text" name="tipe" class="form-control" placeholder="Tipe" value="<?php echo $data['tipe'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Transmisi</label>
								<div class="col-sm-4">
									<input type="text" name="transmisi" class="form-control" placeholder="Transmisi" value="<?php echo $data['transmisi'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Kapasitas</label>
								<div class="col-sm-4">
									<input type="number" name="kapasitas" min="0" class="form-control" placeholder="Kapasitas" value="<?php echo $data['kapasitas'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Tahun</label>
								<div class="col-sm-4">
									<input type="number" name="tahun" min="0" class="form-control" placeholder="Tahun" value="<?php echo $data['tahun'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">KTP</label>
								<div class="col-sm-4">
									<input type="text" name="ktp" class="form-control" placeholder="KTP" value="<?php echo $data['ktp_pelanggan'] ?>" required>
								</div>
							</div>
						</div>
						<div class="panel-footer">
							<button type="submit" name="perbarui" class="btn btn-success">Update</button>
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