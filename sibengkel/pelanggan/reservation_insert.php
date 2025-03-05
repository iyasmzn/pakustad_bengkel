<?php
include("sess_check.php");

$id = $sess_pelangganid;
$tanggal = $_POST['tanggal'];
$keluhan = $_POST['keluhan'];
$status = 0;
// $keterangan = $_POST['keterangan'];

$sql = "INSERT INTO reservations(tanggal,keluhan,status,id_pelanggan)
		  VALUES('$tanggal','$keluhan','$status','$id')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Reservasi Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation_form.php'; </script>";
}
