<?php
	include("dist/config/koneksi.php");

	$ktp=$_POST['ktp'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$hp=$_POST['no_hp'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	$target_dir = "foto/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$image_file = basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		$notif = "File is an image - " . $check["mime"] . ".";
		echo "<script>alert($notif);</script>";
		$uploadOk = 1;
	} else {
		echo "<script>alert('File is not an image.');</script>";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
	  echo "<script>alert('Sorry, file already exists.');</script>";
	  $uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	  echo "<script>alert('Sorry, your file is too large.');</script>";
	  $uploadOk = 0;
	}

	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
	  echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
	  $uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	  echo "<script>alert('Sorry, your file was not uploaded.');</script>";
	// if everything is ok, try to upload file
	} else {
	  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	  	$notif = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	    echo "<script>alert($notif);</script>";
	  } else {
	    echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
	  }
	}

	$sql="INSERT INTO pelanggan(ktp,nama,alamat,hp,user_pelanggan,pass_pelanggan,foto_pelanggan)
		  VALUES('$ktp','$nama','$alamat','$hp','$username','$password','$image_file')";
	$ress = mysqli_query($conn, $sql);
	if($ress){
		echo "<script>alert('Register Berhasil!');</script>";
		echo "<script type='text/javascript'> document.location = 'login.php'; </script>";
	}else{
		echo("Error description: " . mysqli_error($conn));
		echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
		echo "<script type='text/javascript'> document.location = 'resgister.php'; </script>";
	}
?>