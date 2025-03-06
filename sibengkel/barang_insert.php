<?php
include("sess_check.php");

$id = $sess_admid;
$kode = $_POST['kode'] ?? '';
$nama = $_POST['nama'] ?? '';
$harga = $_POST['harga'] ?? '';
$jumlah = $_POST['jumlah'] ?? '';

// check exist kode
$cek = mysqli_query($conn, "SELECT * FROM sparepart WHERE kode='$kode'");
if (mysqli_num_rows($cek) > 0) {
	echo "<script>alert('Kode sudah digunakan. Silahkan coba lagi');</script>";
	echo "<script type='text/javascript'> document.location = 'barang_tambah.php'; </script>";
	exit;
}

if (empty($kode) || empty($nama) || empty($harga) || empty($jumlah)) {
	echo "<script>alert('Semua field harus diisi');</script>";
	echo "<script type='text/javascript'> document.location = 'barang_tambah.php'; </script>";
	exit;
}

$sql = "INSERT INTO sparepart(nama,jumlah,harga,kode)
		  VALUES('$nama','$jumlah','$harga','$kode')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Tambah Barang Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'barang.php'; </script>";
} else {
	$error = mysqli_error($conn);
	echo ("Error description: " . $error);
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi. Error: $error');</script>";
	echo "<script type='text/javascript'> document.location = 'barang_tambah.php'; </script>";
}
