  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h3 class="mt-4">Edit Data Ikan</h3>
        <hr>
        <?php foreach ($ikan as $i) { ?>
          <?php echo form_open_multipart('admin/ikan_update'); ?>
          <div class="form-group mb-2">
            <label>Nama Ikan</label>
            <input type="hidden" name="id" value="<?php echo $i->ikan_id; ?>">
            <input type="text" name="nama_ikan" class="form-control" value="<?php echo $i->nama_ikan; ?>">
            <?php echo form_error('nama_ikan'); ?>
          </div>
          
          <div class="form-group mb-2">
            <label>Jenis Ikan</label>
            <input type="text" name="jenis_ikan" class="form-control" value="<?php echo $i->jenis_ikan; ?>">
          </div>

          <div class="form-group mb-2">
            <label>Ukuran Ikan </label>
            <input type="text" name="ukuran_ikan" class="form-control" value="<?php echo $i->ukuran_ikan; ?>"> 
          </div>
          <div class="form-group mb-2">
            <label>Stok Ikan </label>
            <input type="text" name="stok_ikan" class="form-control" value="<?php echo $i->stok_ikan; ?>">  
          </div>
          <div class="form-group mb-2">
            <label>Harga Ikan </label>
            <input type="number" name="harga_ikan" class="form-control" value="<?php echo $i->harga_ikan; ?>"> 
          </div>
          <div class="form-group mb-2">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" size="20" required="gambar" value="<?php echo $i->gambar; ?>">
          </div>
          <br>
          <center>
            <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
            <a href="<?php echo base_url().'admin/pembeli'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
          </center>
          <?php echo form_close(); ?>
        <?php } ?>
      </div>
    </main>