<?php
	include("sess_check.php");
		$id = $_GET['id_kendaraan'];	
		$sql = "DELETE FROM kendaraan WHERE id_kendaraan='". $id ."'";
		$ress = mysqli_query($conn, $sql);
		header("location: kendaraan.php?act=delete&msg=success");
?>