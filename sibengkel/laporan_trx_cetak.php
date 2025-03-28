<?php
include("sess_check.php");

include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
$mulai 	 = $_GET['awal'];
$selesai = $_GET['akhir'];
$sql = "SELECT reservations.*, pelanggan.*, karyawan.*, 
            sparepart.harga as harga_sparepart,
            jasa_servis.harga as harga_jasa
            FROM reservations
            LEFT JOIN pelanggan ON pelanggan.id_pelanggan=reservations.id_pelanggan
            LEFT JOIN karyawan ON karyawan.id_karyawan=reservations.id_karyawan
            LEFT JOIN sparepart ON sparepart.kode=reservations.kode_sparepart
            LEFT JOIN jasa_servis ON jasa_servis.id=reservations.id_jasa_servis
            WHERE reservations.tanggal BETWEEN '$mulai' AND '$selesai' ORDER BY reservations.id_reservation DESC";
$ress = mysqli_query($conn, $sql);
// deskripsi halaman
$pagedesc = "Laporan Data Transaksi - Periode " . IndonesiaTgl($mulai) . " - " . IndonesiaTgl($selesai);
$pagetitle = str_replace(" ", "_", $pagedesc)
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
			<h5 class="text-center">Laporan Transaksi Periode Tanggal <?php echo format_tanggal($mulai); ?> s/d <?php echo format_tanggal($selesai); ?></h5>
			<br />
			<table class="table table-striped table-bordered table-hover" id="tabel-data">
				<thead>
					<tr>
						<th width="1%">No</th>
						<th width="10%">ID Trx</th>
						<th width="10%">Tgl Trx</th>
						<th width="10%">Konsumen</th>
						<th width="10%">Kasir</th>
						<th width="10%">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$ttl = 0;
					$i = 1;
					while ($data = mysqli_fetch_array($ress)) {
						$hargaSparepart = $data['harga_sparepart'] ?? 0;
						$hargaJasa = $data['harga_jasa'] ?? 0;
						$tot = $hargaSparepart + $hargaJasa;
						echo '<tr>';
						echo '<td class="text-center">' . $i . '</td>';
						echo '<td class="text-center">' . $data['id_trx'] . '</td>';
						echo '<td class="text-center">' . $data['tanggal'] . '</td>';
						echo '<td class="text-center">' . $data['nama'] . '</td>';
						echo '<td class="text-center">' . $data['nama_karyawan'] . '</td>';
						echo '<td class="text-center">' . format_rupiah($tot) . '</td>';
						echo '</tr>';
						$i++;
						$ttl += $tot;
					}
					?>
				<tfoot>
					<tr>
						<th colspan="5" class="text-center">Total </th>
						<th class="text-right"><?php echo format_rupiah($ttl); ?></th>
					</tr>
				</tfoot>
				</tbody>
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