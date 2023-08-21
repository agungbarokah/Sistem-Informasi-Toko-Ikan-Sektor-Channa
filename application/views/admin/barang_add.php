  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h3 class="mt-4">Tambah Data Barang</h3>
        <hr>
        <form action="<?php echo base_url() . 'admin/barang_add_act' ?>" method="post">
          <div class="form-group mb-2">
            <label>Kategori Barang</label>
            <select class="form-control" name="kategori_barang">
                <option value="-Pilih Kategori-" disabled="">-Pilih Kategori-</option>
                <option value="Aksesoris">Aksesoris</option>
                <option value="Pakan Ikan">Pakan Ikan</option>
              </select>
          </div>
          <div class="form-group mb-2">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang...">
            <?php echo form_error('nama_barang'); ?>
          </div>
          <div class="form-group mb-2">
            <label>Stok Barang</label>
            <input type="number" name="stok_barang" class="form-control" placeholder="Masukkan stok barang...">
          </div>
          <center>
            <br>
            <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
            <a href="<?php echo base_url() . 'admin/barang'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
          </center>
        </form>
      </div>
    </main>