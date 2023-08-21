<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h3 class="mt-4">Transaksi Selesai</h3>
      <hr>
      <?php foreach ($transaksi as $t) { ?>
        <form action="<?php echo base_url().'admin/transaksi_update'?>" method="POST">
          <input type="hidden" name="id" value="<?php echo $t->transaksi_id ?>">

          <div class="form-group">
            <label>Nama Pembeli</label>
            <select name="pembeli" class="form-control" disabled="disabled">
              <option value="" disabled="">Pilih Pembeli</option>
              <?php foreach($pembeli as $p) { ?>
                <option <?php if ($t->transaksi_pembeli == $p->pembeli_id) {
                  echo "selected='selected'";
                } ?> value="<?php echo $p->pembeli_id; ?>"><?php echo $p->pembeli_nama; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('pembeli'); ?>
          </div>

          <div class="form-group">
            <label>Nama Ikan</label>
            <select name="ikan" class="form-control" disabled="disabled">
              <option value="" disabled="">Pilih Ikan</option>
              <?php foreach($ikan as $i) { ?>
                <option <?php if ($t->transaksi_ikan == $i->ikan_id) {
                  echo "selected='selected'";
                } ?> value="<?php echo $i->ikan_id; ?>"><?php echo $i->nama_ikan; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('ikan'); ?>
          </div>
          <div class="form-group">
            <label>Jenis Ikan</label>
            <select name="jenis_ikan" class="form-control" disabled="disabled">
              <option value="" disabled="">Pilih Jenis Ikan</option>
              <?php foreach($ikan as $i) { ?>
                <option <?php if ($t->transaksi_ikan == $i->ikan_id) {
                  echo "selected='selected'";
                } ?> value="<?php echo $i->ikan_id; ?>"><?php echo $i->jenis_ikan; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('jenis_ikan'); ?>
          </div>  
          <div class="form-group">
            <label>Jumlah Beli</label>
            <input type="number" name="jumlah" class="form-control" disabled="disabled" value="<?php echo $t->transaksi_jumlah ?>">
            <?php echo form_error('jumlah');?>
          </div>
          <div class="form-group">
            <label>Total Harga</label>
            <input type="number" name="total" class="form-control" disabled="disabled" value="<?php echo $t->transaksi_total ?>">
            <?php echo form_error('total');?>
          </div>
          <div class="form-group">
            <label>Status Pemesanan</label>
            <select name="status" class="form-control">
              <option value="" disabled="">Pilih Status Pemesanan</option>
              <option <?php if($t->transaksi_status == "1"){echo "selected='selected'";}?> value="1">Dalam Proses</option>
              <option <?php if($t->transaksi_status == "2"){echo "selected='selected'";}?> value="2">Selesai</option>
            </select>
            <?php echo form_error('status');?>
          </div>
          <center>
            <br>
            <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
            <a href="<?php echo base_url() . 'admin/transaksi'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
          </center>
        </form>
      <?php } ?>
    </div>
  </main>

