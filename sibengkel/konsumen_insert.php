<?php
include("sess_check.php");

$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
$ktp=$_POST['ktp'];

	$sql="INSERT INTO pelanggan(nama,alamat,hp,ktp)VALUES('$nama','$alamat','$telp','$ktp')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		echo "<script>alert('Tambah Pelanggan Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'konsumen.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'konsumen_tambah.php'; </script>";
	}
?>