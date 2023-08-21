<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Edit Data Pembeli</h3>
            <hr>
            <?php foreach ($pembeli as $p) { ?>
                <form action="<?php echo base_url() . 'admin/pembeli_update' ?>" method="post">
                    <div class="form-group">
                        <label>Nama Pembeli</label>
                        <input type="hidden" name="id" value="<?php echo $p->pembeli_id; ?>">
                        <input type="text" name="pembeli_nama" class="form-control" value="<?php echo $p->pembeli_nama; ?>">
                        <?php echo form_error('pembeli_nama'); ?>
                    </div>
                    <div class=" form-group">
                        <label>Jenis Kelamin</label>
                        <br>
                        <input type="radio" name="jenis_kelamin" value="Laki - Laki"> Laki - Laki
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                    </div>
                    <div class="form-group">
                        <label>Alamat Pembeli</label>
                        <textarea type="text" name="pembeli_alamat" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Handphone</label>
                        <input type="number" name="pembeli_hp" class="form-control" value="<?php echo $p->pembeli_hp; ?>">
                    </div>
                    <center>
                        <br>
                        <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i>Simpan</button>
                        <a href="<?php echo base_url() . 'admin/pembeli'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
                    </center>
                </form>
            <?php } ?>
        </div>
    </main>