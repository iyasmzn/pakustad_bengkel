<?php
include("sess_check.php");

include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
$kode = $_GET['id'];
$sql = "
			SELECT 
			A.*, 
			B.jenis AS jenis_servis, 
			B.harga AS harga_servis, 
			C.nama AS nama_sparepart, 
			C.harga AS harga_sparepart, 
			D.nama AS nama_pelanggan, 
			E.nama_karyawan 
		FROM 
			reservations AS A 
		LEFT JOIN 
			jasa_servis AS B ON A.id_jasa_servis = B.id 
		LEFT JOIN 
			sparepart AS C ON A.kode_sparepart = C.kode 
		LEFT JOIN 
			pelanggan AS D ON A.id_pelanggan = D.id_pelanggan 
		LEFT JOIN 
			karyawan AS E ON A.id_karyawan = E.id_karyawan 
		WHERE A.id_trx = '" . $kode . "'
		ORDER BY A.tanggal DESC";
$query = mysqli_query($conn, $sql);
$result = mysqli_fetch_array($query);
// deskripsi halaman
$pagedesc = "Cetak Bukti Transaksi";
$pagetitle = str_replace(" ", "_", $pagedesc);
$grand = ($result['harga_servis'] ?? 0) + ($result['harga_sparepart'] ?? 0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">

	<title><?php echo $pagetitle ?></title>

	<link href="foto/logo.png" rel="icon" type="images/x-icon">


	<!-- Bootstrap Core CSS -->
	<link href="libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="dist/css/offline-font.css" rel="stylesheet">
	<link href="dist/css/custom-report.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="libs/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="libs/jquery/dist/jquery.min.js"></script>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<section id="header-kop">
		<div class="container-fluid">
			<table class="table table-borderless">
				<tbody>
					<tr>
						<td class="text-left" width="20%">
							<img src="foto/logo.png" alt="logo-dkm" width="70" />
						</td>
						<td class="text-center" width="60%">
							<b>SiBengkel</b> <br>
							Semarang<br>
							Telp: (021) 192819189<br>
						<td class="text-right" width="20%">
						</td>
					</tr>
				</tbody>
			</table>
			<hr class="line-top" />
		</div>
	</section>

	<section id="body-of-report">
		<div class="container-fluid">
			<h4 class="text-center">Detail Transaksi</h4>
			<br />
			<table width="100%">
				<tr>
					<td width="20%"><b>ID. Transaksi</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['id_trx']; ?></td>
				</tr>
				<tr>
					<td width="20%"><b>Tanggal</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo format_tanggal($result['tanggal']); ?></td>
				</tr>
				<tr>
					<td width="20%"><b>Pelanggan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['nama_pelanggan']; ?></td>
				</tr>
				<tr>
					<td width="20%"><b>Karyawan</b></td>
					<td width="2%"><b>:</b></td>
					<td width="78%"><?php echo $result['nama_karyawan']; ?></td>
				</tr>
			</table>
			</br>
			<table class="table table-bordered table-keuangan">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th width="10%">Nama Barang/Jasa</th>
						<th width="5%">Jumlah</th>
						<th width="10%">Harga Satuan</th>
						<th width="10%">Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1.</td>
						<td><?= $result['jenis_servis'] ?></td>
						<td>1</td>
						<td class="text-right"><?= format_rupiah($result['harga_servis']) ?></td>
						<td class="text-right"><?= format_rupiah($result['harga_servis']) ?></td>
					</tr>
					<?php
					if ($result['nama_sparepart']) {
					?>
						<tr>
							<td>2.</td>
							<td><?= $result['nama_sparepart'] ?></td>
							<td>1</td>
							<td class="text-right"><?= format_rupiah($result['harga_sparepart']) ?></td>
							<td class="text-right"><?= format_rupiah($result['harga_sparepart']) ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<th colspan="4" class="text-center">Total </th>
						<th class="text-right"><?php echo format_rupiah($grand); ?></th>
					</tr>
				</tfoot>
			</table>
			<br />
		</div><!-- /.container -->
	</section>

	<script type="text/javascript">
		$(document).ready(function() {
			window.print();
		});
	</script>

	<!-- Bootstrap Core JavaScript -->
	<script src="libs/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- jTebilang JavaScript -->
	<script src="libs/jTerbilang/jTerbilang.js"></script>

</body>

</html>