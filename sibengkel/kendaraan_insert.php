<?php
include("sess_check.php");

$nopol=$_POST['nopol'];
$merk=$_POST['merk'];
$tipe=$_POST['tipe'];
$transmisi=$_POST['transmisi'];
$kapasitas=$_POST['kapasitas'];
$tahun=$_POST['tahun'];
$ktp=$_POST['ktp'];

	$sql="INSERT INTO kendaraan(nopol,merk,tipe,transmisi,kapasitas,tahun,ktp_pelanggan)VALUES('$nopol','$merk','$tipe','$transmisi','$kapasitas','$tahun','$ktp')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		echo "<script>alert('Tambah Kendaraan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'kendaraan.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'kendaraan_tambah.php'; </script>";
	}
?>