  <div id="layoutSidenav_content">
  	<main>
  		<div class="container-fluid px-4">
  			<h3 class="mt-4"><i class="bi bi-file-earmark"> Laporan Transaksi</h3></i>
  			<hr>
  			<form action="<?php echo base_url() . 'admin/laporan' ?>" method="post">
  				<div class="form-group">
  					<label>Dari Tanggal</label>
  					<input type="date" name="dari" class="form-control">
  					<?php echo form_error('dari'); ?>
  				</div>
  				<div class="form-group">
  					<label>Sampai Tanggal</label>
  					<input type="date" name="sampai" class="form-control">
  					<?php echo form_error('sampai'); ?>
  				</div>
  				<br>
  				<div class="form-group">
  					<button type="submit" class="btn btn-primary" name="cari" value="CARI"><i class="bi bi-search"></i> Cari</button>
  				</div>
  			</form>
  		</div>
  	</main>