<?php
include("sess_check.php");

// query database memperbarui data pada database
if (isset($_POST['perbarui'])) {
	$id = $_POST['kas'];
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$user = $_POST['user'];
	$userlama = $_POST['userlama'];
	$telp = $_POST['telp'];
	$pass = $_POST['password'];
	$cekfoto = $_FILES["foto"]["name"];
	$namafoto = date('mdYHis');

	if ($user != $userlama) {
		$sqlcek = "SELECT * FROM karyawan WHERE user_karyawan='$user'";
		$ress = mysqli_query($conn, $sqlcek);
		$rows = mysqli_num_rows($ress);
		if ($rows < 1) {
			updateKaryawan($id, $nama, $alamat, $telp, $user, $pass, $cekfoto, $namafoto, $sess_admid, $conn);
		} else {
			header("location: kasir_edit.php?kas=$id&act=add&msg=double");
		}
	} else {
		updateKaryawan($id, $nama, $alamat, $telp, $user, $pass, $cekfoto, $namafoto, $sess_admid, $conn);
	}
}

function updateKaryawan($id, $nama, $alamat, $telp, $user, $pass, $cekfoto, $namafoto, $id_admin, $conn)
{
	if ($cekfoto != "") {
		$foto = substr($_FILES["foto"]["name"], -5);
		$newfoto = $namafoto . $foto;
		move_uploaded_file($_FILES["foto"]["tmp_name"], "foto/" . $newfoto);
		$sql = "UPDATE karyawan SET
            nama_karyawan='" . $nama . "',
            alamat_karyawan='" . $alamat . "',
            telp_karyawan='" . $telp . "',
            user_karyawan='" . $user . "',
            pass_karyawan='" . $pass . "',
			id_adm='" . $id_admin . "',
            foto_karyawan='" . $newfoto . "'
            WHERE id_karyawan='" . $id . "'";
	} else {
		$sql = "UPDATE karyawan SET
            nama_karyawan='" . $nama . "',
            alamat_karyawan='" . $alamat . "',
            telp_karyawan='" . $telp . "',
            user_karyawan='" . $user . "',
			id_adm='" . $id_admin . "',
            pass_karyawan='" . $pass . "'
            WHERE id_karyawan='" . $id . "'";
	}
	$ress = mysqli_query($conn, $sql);
	header("location: kasir.php?act=update&msg=success");
}
