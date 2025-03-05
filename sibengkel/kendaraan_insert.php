<?php
include("sess_check.php");

$nopol = mysqli_real_escape_string($conn, $_POST['nopol']);
$merk = mysqli_real_escape_string($conn, $_POST['merk']);
$tipe = mysqli_real_escape_string($conn, $_POST['tipe']);
$transmisi = mysqli_real_escape_string($conn, $_POST['transmisi']);
$kapasitas = mysqli_real_escape_string($conn, $_POST['kapasitas']);
$tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
$ktp = mysqli_real_escape_string($conn, $_POST['ktp']);
$id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);

$sql = "INSERT INTO kendaraan(nopol,merk,tipe,transmisi,kapasitas,tahun,ktp_pelanggan,id_pelanggan)VALUES('$nopol','$merk','$tipe','$transmisi','$kapasitas','$tahun','$ktp','$id_pelanggan')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Tambah Kendaraan Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'kendaraan.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'kendaraan_tambah.php'; </script>";
}
