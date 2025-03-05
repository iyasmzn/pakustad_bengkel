<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$jenis = $_POST['jenis'];
	$harga = $_POST['harga'];
	$brg = $_POST['id'];

	$sql = "UPDATE jasa_servis SET
				jenis='" . $jenis . "',
				harga='" . $harga . "'
				WHERE id='" . $brg . "'";
	$ress = mysqli_query($conn, $sql);
	if ($ress) {
		echo "<script>alert('Ubah Data Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'jasa.php'; </script>";
	} else {
		echo ("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'jasa.php'; </script>";
	}
}
