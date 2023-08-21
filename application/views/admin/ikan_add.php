  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h3 class="mt-4">Tambah Data Ikan</h3>
        <hr>
        <?php echo form_open_multipart('admin/ikan_add_act'); ?>
        <div class="form-group mb-2">
          <label>Nama Ikan</label>
          <input type="text" name="nama_ikan" class="form-control" placeholder="Masukkan nama ikan...">
          <?php echo form_error('nama_ikan'); ?>
        </div>
        <div class="form-group mb-2">
          <label>Jenis Ikan</label>
          <input type="text" name="jenis_ikan" class="form-control" placeholder="Masukkan jenis ikan...">
        </div>
        <div class="form-group mb-2">
          <label>Ukuran Ikan </label>
          <input type="text" name="ukuran_ikan" class="form-control" placeholder="Masukkan ukuran ikan...">
        </div>
        <div class="form-group mb-2">
          <label>Stok Ikan </label>
          <input type="text" name="stok_ikan" class="form-control" placeholder="Masukkan stok ikan...">
        </div>
        <div class="form-group mb-2">
          <label>Harga Ikan </label>
          <input type="number" name="harga_ikan" class="form-control" placeholder="Masukkan harga ikan...">
        </div>
        <div class="form-group mb-2">
          <label>Gambar</label>
          <input type="file" name="gambar" class="form-control" size="20" >
        </div>
        <br>
        <center>
          <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
          <a href="<?php echo base_url().'admin/pembeli'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
        </center>
        <?php echo form_close(); ?>
      </div>
    </main>