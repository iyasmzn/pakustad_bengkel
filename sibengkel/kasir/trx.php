<?php
	include("sess_check.php");
	
	// deskripsi halaman
	$pagedesc = "Transaksi";
	include("layout_top.php");
	include("dist/function/format_tanggal.php");
	include("dist/function/format_rupiah.php");
?>
<!-- top of file -->
		<!-- Page Content -->
		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Data Transaksi</h1>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
				
				<div class="row">
					<div class="col-lg-12"><?php include("layout_alert.php"); ?></div>
				</div>
				
				<div class="row">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="tabel-data">
									<thead>
										<tr>
											<th width="1%">No</th>
											<th width="10%">ID Trx</th>
											<th width="10%">Tgl Trx</th>
											<th width="8%">Konsumen</th>
											<th width="8%">Kasir</th>
											<th width="8%">Total</th>
											<th width="10%">Opsi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											$sql = "SELECT trx.*, pelanggan.*, karyawan.* FROM trx, pelanggan, karyawan WHERE
													trx.id_kon=pelanggan.id_pelanggan AND trx.id_kasir=karyawan.id_karyawan ORDER BY trx.id_trx DESC";
											$ress = mysqli_query($conn, $sql);
											while($data = mysqli_fetch_array($ress)) {
												echo '<tr>';
												echo '<td class="text-center">'. $i .'</td>';
												echo '<td class="text-center">'. $data['id_trx'] .'</td>';
												echo '<td class="text-center">'. format_tanggal($data['tgl_trx']) .'</td>';
												echo '<td class="text-center">'. $data['nama'] .'</td>';
												echo '<td class="text-center">'. $data['nama_karyawan'] .'</td>';
												echo '<td class="text-center">'. format_rupiah($data['total']) .'</td>';
												echo '<td class="text-center">
													  <a href="#myModal" data-toggle="modal" data-load-code="'.$data['id_trx'].'" data-remote-target="#myModal .modal-body" class="btn btn-primary btn-xs">Detail</a>
												';?>
													  <a href="trx_cetak.php?id=<?php echo $data['id_trx'];?>" target="_blank" class="btn btn-warning btn-xs">Cetak</a>
													  <a href="trx_hapus.php?trx=<?php echo $data['id_trx'];?>" onclick="return confirm('Apakah anda yakin akan menghapus <?php echo $data['id_trx'];?>?');" class="btn btn-danger btn-xs">Hapus</a>												  
												<?php
													  echo '</td>';
												echo '</tr>';												
												$i++;
											}
										?>
									</tbody>
								</table>
							</div>
			<!-- Large modal -->
			<div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-body">
							<p>One fine body…</p>
						</div>
					</div>
				</div>
			</div>    
						</div><!-- /.panel -->
					</div><!-- /.col-lg-12 -->
				</div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /#page-wrapper -->
<!-- bottom of file -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#tabel-data').DataTable({
			"responsive": true,
			"processing": true,
			"columnDefs": [
				{ "orderable": false, "targets": [5] }
			]
		});
		
		$('#tabel-data').parent().addClass("table-responsive");
	});
</script>
	<script>
		var app = {
			code: '0'
		};
		
		$('[data-load-code]').on('click',function(e) {
					e.preventDefault();
					var $this = $(this);
					var code = $this.data('load-code');
					if(code) {
						$($this.data('remote-target')).load('trx_detail.php?code='+code);
						app.code = code;
						
					}
		});		
    </script>
<?php
	include("layout_bottom.php");
?>