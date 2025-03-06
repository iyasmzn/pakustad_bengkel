<!-- Printing -->
<link rel="stylesheet" href="css/printing.css">

<?php
include("sess_check.php");
include("dist/function/format_tanggal.php");
include("dist/function/format_rupiah.php");
if ($_GET) {
	$kode = $_GET['code'];
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
	$grand = ($result['harga_servis'] ?? 0) + ($result['harga_sparepart'] ?? 0);
} else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>

<head>
</head>

<body>
	<div id="section-to-print">
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
							<th class="text-right"><?= format_rupiah($grand); ?></th>
						</tr>
					</tfoot>
				</table>
				<br />
			</div><!-- /.container -->
		</section>
		<div class="modal-footer">
			<a href="reservation_cetak.php?id=<?php echo $kode; ?>" target="_blank" class="btn btn-warning">Cetak</a>
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
	</div>

</body>

</html>