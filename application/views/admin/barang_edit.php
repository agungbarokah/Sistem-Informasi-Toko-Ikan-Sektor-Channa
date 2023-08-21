<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Edit Data Barang</h3>
            <hr>
            <?php foreach ($barang as $b) { ?>
                <form action="<?php echo base_url() . 'admin/barang_update' ?>" method="post">
                    <div class="form-group mb-2">
                        <label>Kategori Barang</label>
                        <input type="hidden" name="id" value="<?php echo $b->barang_id; ?>">
                        <select name="kategori_barang" class="form-control">
                           <option value="" disabled="">-Pilih Kategori-</option>
                            <option <?php if($b->kategori_barang == "Aksesoris"){echo "selected='selected'";} echo $b->barang_id; ?> value="Aksesoris">Aksesoris</option>
                            <option <?php if($b->kategori_barang == "Pakan Ikan"){echo "selected='selected'";} echo $b->barang_id; ?> value="Pakan Ikan">Pakan Ikan</option>
                        </select>
                        <?php echo form_error('kategori_barang'); ?>
                    </div>
                    <div class="form-group mb-2">
                        <label>Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="<?php echo $b->nama_barang; ?>">
                    </div>
                    <div class="form-group mb-2">
                        <label>Stok Barang</label>
                        <input type="number" name="stok_barang" class="form-control" value="<?php echo $b->stok_barang; ?>">
                    </div>
                    <br>
                    <center>
                        <button type="submit" class="btn btn-primary" value="Simpan"><i class="bi bi-check-circle"></i> Simpan</button>
                        <a href="<?php echo base_url() . 'admin/barang'; ?>" class="btn btn-danger"></span><i class="bi bi-dash-circle"></i> Batal</a>
                    </center>
                </form>
            <?php } ?>
        </div>
    </main>