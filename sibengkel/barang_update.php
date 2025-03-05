<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$brg = $_POST['kode'];
	$jumlah = $_POST['jumlah'];

	$sql = "UPDATE sparepart SET
				nama='" . $nama . "',
				harga='" . $harga . "',
				jumlah='" . $jumlah . "'
				WHERE kode='" . $brg . "'";
	$ress = mysqli_query($conn, $sql);
	header("location: barang.php?act=update&msg=success");
}
