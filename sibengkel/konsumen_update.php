<?php
	include("sess_check.php");
	
	// query database memperbarui data pada database
	if(isset($_POST['perbarui'])) {
		$id=$_POST['kon'];
		$nama=$_POST['nama'];
		$alamat=$_POST['alamat'];
		$telp=$_POST['telp'];
		$ktp=$_POST['ktp'];
		$sql = "UPDATE pelanggan SET
				nama='". $nama ."',
				alamat='". $alamat ."',
				hp='". $telp ."',
				ktp='". $ktp ."'
				WHERE id_pelanggan='". $id ."'";
				
		$ress = mysqli_query($conn, $sql);
		header("location: konsumen.php?act=update&msg=success");
	}
?>