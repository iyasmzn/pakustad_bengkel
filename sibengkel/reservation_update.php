<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui']) && isset($_POST['id_reservation'])) {
	$id = $_POST['id_reservation'];
	$tanggal = $_POST['tanggal'];
	$id_pelanggan = $_POST['id_pelanggan'];
	$nopol = $_POST['nopol'];
	$keluhan = $_POST['keluhan'];
	$penanganan = $_POST['penanganan'];
	$kode_sparepart = $_POST['kode_sparepart'];
	$catatan = $_POST['catatan'];
	$status = $_POST['status'];
	$id_karyawan = $sess_admid;
	$sql = "UPDATE reservations SET 
		tanggal='" . $tanggal . "', 
		id_pelanggan='" . $id_pelanggan . "', 
		nopol='" . $nopol . "', 
		keluhan='" . $keluhan . "', 
		penanganan='" . $penanganan . "', 
		kode_sparepart='" . $kode_sparepart . "', 
		catatan='" . $catatan . "', 
		id_karyawan='" . $id_karyawan . "',
		status='" . $status . "'
		WHERE id_reservation='" . $id . "'";

	$ress = mysqli_query($conn, $sql);
	if ($ress) {
		echo "<script>alert('Ubah Data Berhasil!');</script>";
		header("location: reservation.php?act=update&msg=success");
	} else {
		echo ("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		// echo "<script type='text/javascript'> document.location = 'reservation.php'; </script>";
	}
} else {
	echo "<script type='text/javascript'> document.location = 'reservation.php'; </script>";
}
