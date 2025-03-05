<?php
	// memulai session
	session_start();
	// membaca nilai variabel session 
	$chk_sess = $_SESSION['pelanggan'];
	// memanggil file koneksi
	include("dist/config/koneksi.php");
	include("dist/config/library.php");
	// mengambil data pengguna dari tabel pengguna
	$sql_sess = "SELECT * FROM pelanggan WHERE id_pelanggan='". $chk_sess ."'";
	$ress_sess = mysqli_query($conn, $sql_sess);
	$row_sess = mysqli_fetch_array($ress_sess);
	// menyimpan id_pengguna yang sedang login
	$sess_pelangganid = $row_sess['id_pelanggan'];
	$sess_pelangganuser = $row_sess['user_pelanggan'];
	$sess_pelangganname = $row_sess['nama'];
	$sess_pelangganfoto = $row_sess['foto_pelanggan'];
	// mengarahkan ke halaman login.php apabila session belum terdaftar
	if(! isset($chk_sess)) {
		header("location: ../login.php?login=false");
	}
?>