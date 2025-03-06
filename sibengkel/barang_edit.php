<?php
include("sess_check.php");

if (isset($_GET['brg'])) {
	$sql = "SELECT * FROM sparepart WHERE kode='" . $_GET['brg'] . "'";
	$ress = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($ress);
}
// deskripsi halaman
$pagedesc = "Data Barang";
$menuparent = "barang";
include("layout_top.php");
?>
<!-- top of file -->
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Data Sparepart</h1>
			</div><!-- /.col-lg-12 -->
		</div><!-- /.row -->

		<div class="row">
			<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<form class="form-horizontal" action="barang_update.php" method="POST" enctype="multipart/form-data">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3>Edit Data</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label class="control-label col-sm-3">Kode</label>
								<div class="col-sm-4">
									<input type="text" name="kode" class="form-control" placeholder="Kode" value="<?php echo $data['kode'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
								<label class="control-label col-sm-3">Nama</label>
								<div class="col-sm-4">
									<div class="form-group">
										<label class="control-label col-sm-3">Nama</label>
										<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama'] ?>" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Jumlah</label>
								<div class="col-sm-4">
									<input type="number" name="jumlah" min="0" class="form-control" placeholder="Jumlah" value="<?php echo $data['jumlah'] ?>" required>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Harga</label>
								<div class="col-sm-4">
									<input type="number" name="harga" min="0" class="form-control" placeholder="Harga" value="<?php echo $data['harga'] ?>" required>
								</div>
							</div>
							<!-- <div class="form-group">
										<label class="control-label col-sm-3">Keterangan</label>
										<div class="col-sm-4">
											<textarea name="keterangan" class="form-control" placeholder="Keterangan" rows="3" required><?php echo $data['keterangan']; ?></textarea>
										</div>
									</div> -->
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