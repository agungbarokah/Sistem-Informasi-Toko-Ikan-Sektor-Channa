            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="bi bi-folder2"> Data Ikan</h1></i>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <a href="<?php echo base_url().'admin/ikan_add'; ?>" class="btn btn-primary bi bi-plus"></span> Tambah Ikan</a>
                        <br /><br />
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Ikan
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                 <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ikan</th>
                                        <th>Jenis Ikan</th>
                                        <th>Ukuran Ikan</th>
                                        <th>Stok Ikan</th>
                                        <th>Harga Ikan</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php
                                   $no = 1;
                                   foreach ($ikan as $i) {
                                    ?>
                                    <tr>
                                       <td><?php echo $no++ ?></td>
                                       <td><?php echo $i->nama_ikan ?></td>
                                       <td><?php echo $i->jenis_ikan ?></td>
                                       <td><?php echo $i->ukuran_ikan ?></td>
                                       <td><?php echo $i->stok_ikan ?></td>
                                       <td><?php echo $i->harga_ikan ?></td>
                                       <td><center><img width="213" height="120" src="<?php echo base_url();?>assets/gambar/<?php echo $i->gambar;?>"></td></center>
                                       <td>
                                        <a class="btn btn-primary bi bi-gear" href="<?php echo base_url() . 'admin/ikan_edit/' . $i->ikan_id; ?>"> Edit</a>
                                        <a onclick ="return confirm('Apakah anda yakin ?'
                                        )" class="btn btn-danger bi bi-trash" href="<?php echo base_url() . 'admin/ikan_hapus/' . $i->ikan_id; ?>"> Hapus</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
