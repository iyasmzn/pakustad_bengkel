<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$id = $_POST['id_kendaraan'];
	$nopol = $_POST['nopol'];
	$merk = $_POST['merk'];
	$tipe = $_POST['tipe'];
	$transmisi = $_POST['transmisi'];
	$kapasitas = $_POST['kapasitas'];
	$tahun = $_POST['tahun'];
	$ktp = $_POST['ktp'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$sql = "UPDATE kendaraan SET
				nopol='" . $nopol . "',
				merk='" . $merk . "',
				tipe='" . $tipe . "',
				transmisi='" . $transmisi . "',
				kapasitas='" . $kapasitas . "',
				tahun='" . $tahun . "',
				ktp_pelanggan='" . $ktp . "',
				id_pelanggan='" . $id_pelanggan . "'
				WHERE id_kendaraan='" . $id . "'";

	$ress = mysqli_query($conn, $sql);
	header("location: kendaraan.php?act=update&msg=success");
}
