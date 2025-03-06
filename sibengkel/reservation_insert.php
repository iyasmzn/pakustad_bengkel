<?php
include("sess_check.php");

// random string trx code
$trx_code = substr(md5(uniqid(rand(), true)), 0, 10);

$tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
$id_pelanggan = mysqli_real_escape_string($conn, $_POST['id_pelanggan']);
$id_jasa_servis = mysqli_real_escape_string($conn, $_POST['id_jasa_servis']);
$nopol = mysqli_real_escape_string($conn, $_POST['nopol']);
$keluhan = mysqli_real_escape_string($conn, $_POST['keluhan']);
$penanganan = mysqli_real_escape_string($conn, $_POST['penanganan']);
$kode_sparepart = mysqli_real_escape_string($conn, $_POST['kode_sparepart']);
$catatan = mysqli_real_escape_string($conn, $_POST['catatan']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$id_karyawan = $sess_admid;

$sql = "INSERT INTO reservations(id_trx,tanggal,keluhan,status,id_pelanggan,id_karyawan,id_jasa_servis,nopol,penanganan,kode_sparepart,catatan)
		  VALUES('$trx_code','$tanggal','$keluhan','$status','$id_pelanggan','$id_karyawan','$id_jasa_servis','$nopol','$penanganan','$kode_sparepart','$catatan')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Reservasi Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	echo "<script type='text/javascript'> document.location = 'reservation_form.php'; </script>";
}
