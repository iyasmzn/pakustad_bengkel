<?php
include('../../dist/config/koneksi.php');
// create user
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$hp = mysqli_real_escape_string($conn, $_POST['hp']);
$user_pelanggan = mysqli_real_escape_string($conn, $_POST['user_pelanggan']);
$pass_pelanggan = mysqli_real_escape_string($conn, $_POST['pass_pelanggan']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
// create user sql
$sql = "INSERT INTO pelanggan (nama, hp, user_pelanggan, pass_pelanggan,
alamat)
VALUES ('$nama', '$hp', '$user_pelanggan', '$pass_pelanggan', '$alamat')";
// execute query
if (mysqli_query($conn, $sql)) {
	echo "New record created successfully";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	// echo "<script type='text/javascript'> document.location = '../index.html'; </script>";
}

// create reservation
$tanggal = mysqli_real_escape_string($conn, $_POST['tanggal']);
$keluhan = mysqli_real_escape_string($conn, $_POST['keluhan']);
$status = 0;
// get id pelanggan
$last_id = mysqli_insert_id($conn);

$sql = "INSERT INTO reservations(tanggal,keluhan,status,id_pelanggan)
		  VALUES('$tanggal','$keluhan','$status','$last_id')";
$ress = mysqli_query($conn, $sql);
if ($ress) {
	echo "<script>alert('Reservasi Berhasil!');</script>";
	echo "<script type='text/javascript'> document.location = '../../login.php'; </script>";
} else {
	echo ("Error description: " . mysqli_error($conn));
	echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
	// echo "<script type='text/javascript'> document.location = '../index.html'; </script>";
}

// close connection
mysqli_close($conn);
