  <div id="layoutSidenav_content">
    <main>
      <div class="container-fluid px-4">
        <h3 class="mt-4">Tambah Data Pembeli</h3>
        <hr>
        <form action="<?php echo base_url() . 'admin/pembeli_add_act' ?>" method="post">
          <div class="form-group mb-2">
            <label>Nama Pembeli</label>
            <input type="text" name="pembeli_nama" class="form-control" placeholder="Masukkan nama pembeli...">
            <?php echo form_error('pembeli_nama'); ?>
          </div>
          <div class="form-group mb-2">
            <label>Jenis Kelamin</label>
            <br>
            <input type="radio" name="jenis_kelamin" value="Laki - Laki"> Laki - Laki
            <br>
            <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
          </div>
          <div class="form-group mb-2">
            <label>Alamat Pembeli</label>
            <textarea type="text" name="pembeli_alamat" class="form-control" required="required" rows="3" placeholder="Masukkan alamat..."></textarea>
          </div>
          <div class="form-group mb-2">
            <label>Nomor Handphone</label>
            <input type="number" name="pembeli_hp" class="form-control" placeholder="Masukkan nomor handphone...">
          </div>
          <center>
            <br>
            <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
            <a href="<?php echo base_url() . 'admin/pembeli'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
          </center>
        </form>
      </div>
    </main>