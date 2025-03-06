<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$kode = mysqli_real_escape_string($conn, $_POST['kode']);
	$nama = mysqli_real_escape_string($conn, $_POST['nama']);
	$harga = mysqli_real_escape_string($conn, $_POST['harga']);
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);

	// check if exist kode when update data which is kode unique
	$cek = mysqli_query($conn, "SELECT * FROM barang WHERE kode='$kode' AND id!='$id'");
	if (mysqli_num_rows($cek) > 0) {
		$pesan = "Kode sudah ada";
		echo "<script>alert('$pesan');</script>";
		header("location: barang.php?act=update&msg=failed");
		exit;
	} else {
		$sql = "UPDATE sparepart SET
                kode='$kode',
                nama='$nama',
                harga='$harga',
                jumlah='$jumlah'
                WHERE id='$id'";
		if (mysqli_query($conn, $sql)) {
			header("location: barang.php?act=update&msg=success");
			exit;
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
}
