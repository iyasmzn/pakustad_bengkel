<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	$brg = $_POST['id'];

	$sql = "UPDATE jasa_servis SET
				jenis='" . $jenis . "',
				harga='" . $harga . "',
				WHERE id='" . $brg . "'";
	$ress = mysqli_query($conn, $sql);
	header("location: jasa.php?act=update&msg=success");
}
