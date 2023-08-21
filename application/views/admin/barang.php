            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="bi bi-folder2"> Data Barang</h1></i>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <a href="<?php echo base_url().'admin/barang_add'; ?>" class="btn btn-primary bi bi-plus"></span> Tambah Barang</a>
                        <br /><br />
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Barang
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $no = 1;
                                 foreach ($barang as $b) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $b->kategori_barang ?></td>
                                        <td><?php echo $b->nama_barang ?></td>
                                        <td><?php echo $b->stok_barang ?></td>
                                        <td>
                                            <a class="btn btn-primary bi bi-gear" href="<?php echo base_url() . 'admin/barang_edit/' . $b->barang_id; ?>"> Edit</a>
                                            <a onclick ="return confirm('Apakah anda yakin ?'
                                            )" class="btn btn-danger bi bi-trash" href="<?php echo base_url() . 'admin/barang_hapus/' . $b->barang_id; ?>"> Hapus</a>
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
