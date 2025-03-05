<?php
include("sess_check.php");

$id = $sess_admid;
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
// $keterangan = $_POST['keterangan'];

$sql = "INSERT INTO jasa_servis(jenis,harga)
		  VALUES('$jenis','$harga')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Tambah Jasa Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'jasa.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'jasa_tambah.php'; </script>";
}
