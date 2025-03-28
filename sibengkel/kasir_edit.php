<?php
include("sess_check.php");

if (isset($_GET['kas'])) {
	$sql = "SELECT * FROM karyawan WHERE id_karyawan='" . $_GET['kas'] . "'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
}
// deskripsi halaman
$pagedesc = "Data Karyawan";
$menuparent = "karyawan";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Karyawan</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="kasir_update.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Edit Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-4">
									<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama_karyawan'] ?>" required>
									<input type="hidden" name="kas" class="form-control" placeholder="ID" value="<?php echo $data['id_karyawan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Alamat</label>
								<div class="col-sm-4">
									<input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $data['alamat_karyawan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Telepon/Hp</label>
								<div class="col-sm-4">
									<input type="number" name="telp" min="0" class="form-control" placeholder="Telepon" value="<?php echo $data['telp_karyawan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Username</label>
								<div class="col-sm-4">
									<input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo $data['user_karyawan'] ?>" required>
									<input type="hidden" name="userlama" class="form-control" placeholder="Username" value="<?php echo $data['user_karyawan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Password</label>
								<div class="col-sm-4">
									<input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo $data['pass_karyawan'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Foto (Abaikan Jika Tidak Diubah)</label>
								<div class="col-sm-4">
									<input type="file" name="foto" class="form-control" accept="image/*">
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