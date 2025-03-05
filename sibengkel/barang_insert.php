<?php
include("sess_check.php");

$id = $sess_admid;
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
// $keterangan = $_POST['keterangan'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO sparepart(nama,jumlah,harga,kode)
		  VALUES('$nama','$jumlah','$harga','$kode')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Tambah Barang Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'barang.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'barang_tambah.php'; </script>";
}
