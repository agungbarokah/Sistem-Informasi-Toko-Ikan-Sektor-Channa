  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h3 class="mt-4">Tambah Data Transaksi</h3>
        <hr>
        <form action="<?php echo base_url().'admin/transaksi_add_act' ?>" method="post">
          <div class="form-group mb-2">
            <label>Nama Pembeli</label>
            <select name="pembeli" class="form-control">
              <option value="" disabled="" selected="selected">Pilih Pembeli</option>
              <?php foreach($pembeli as $p) { ?>
                <option value="<?php echo $p->pembeli_id; ?>"><?php echo $p->pembeli_nama; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('pembeli'); ?>
          </div>

          <div class="form-group mb-2">
            <label>Nama Ikan</label>
            <select name="ikan" class="form-control">
              <option value="" disabled="" selected="selected">Pilih Ikan</option>
              <?php foreach($ikan as $i) { ?>
                <option value="<?php echo $i->ikan_id; ?>"><?php echo $i->nama_ikan; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('ikan'); ?>
          </div>
          <div class="form-group mb-2">
            <label>Jenis Ikan</label>
            <select name="jenis_ikan" class="form-control">
              <option value="" disabled="" selected="selected">Pilih Jenis Ikan</option>
              <?php foreach($ikan as $i) { ?>
                <option value="<?php echo $i->ikan_id; ?>"><?php echo $i->jenis_ikan; ?></option>
              <?php } ?>
            </select>
            <?php  echo form_error('jenis_ikan'); ?>
          </div>  
          <div class="form-group mb-2">
            <label>Jumlah Beli</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Masukan Jumlah Beli...">
            <?php echo form_error('jumlah');?>
          </div>
          <div class="form-group mb-2">
            <label>Harga Ikan</label>
            <input type="number" name="harga_ikan" class="form-control" placeholder="Masukkan Harga Ikan...">
            <?php echo form_error('harga_ikan');?>
          </div>
          <div class="form-group mb-2">
            <label>Status Pemesanan</label>
            <select name="status" class="form-control">
              <option value="" disabled="" selected="selected">Pilih Status Pemesanan</option>
              <option value="1">Dalam Proses</option>
              <option value="2">Selesai</option>
            </select>
            <?php echo form_error('status');?>
          </div>
          <center>
            <br>
            <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
            <a href="<?php echo base_url() . 'admin/transaksi'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
          </center>
        </form>
      </div>
    </main>