<?php
include("sess_check.php");
$id = $_GET['id'];
$sql = "DELETE FROM reservations WHERE id_reservation='" . $id . "'";
$ress = mysqli_query($conn, $sql);
header("location: reservation.php?act=delete&msg=success");
