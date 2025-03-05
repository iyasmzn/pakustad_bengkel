<?php
	include("sess_check.php");
		$id = $_GET['kas'];	
		$sql = "DELETE FROM karyawan WHERE id_karyawan='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: kasir.php?act=delete&msg=success");
?>