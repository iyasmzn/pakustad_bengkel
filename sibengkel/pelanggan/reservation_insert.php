<?php
include("sess_check.php");

$id = $sess_pelangganid;
$tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
$keluhan = mysqli_real_escape_string($conn, $_POST['keluhan']);
$nopol = mysqli_real_escape_string($conn, $_POST['nopol']);
$status = 0;

$sql = "INSERT INTO reservations(tanggal,keluhan,status,id_pelanggan,nopol)
		  VALUES('$tanggal','$keluhan','$status','$id','$nopol')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Reservasi Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation_form.php'; </script>";
}
