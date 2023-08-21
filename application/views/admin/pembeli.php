            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="bi bi-person"></i> Data Pembeli</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <a href="<?php echo base_url() . 'admin/pembeli_add'; ?>" class="btn btn-primary bi bi-plus"></span> Tambah Pembeli</a>
                        <br /><br />

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Pembeli
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pembeli</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat Pembeli</th>
                                            <th>Nomor Handphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($pembeli as $p) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $p->pembeli_nama ?></td>
                                                <td><?php echo $p->jenis_kelamin ?></td>
                                                <td><?php echo $p->pembeli_alamat ?></td>
                                                <td><?php echo $p->pembeli_hp ?></td>
                                                <td>
                                                    <a class="btn btn-primary bi bi-gear" href="<?php echo base_url() . 'admin/pembeli_edit/' . $p->pembeli_id; ?>"> Edit</a>
                                                    <a onclick ="return confirm('Apakah anda yakin ?'
                                                    )" class="btn btn-danger bi bi-trash" href="<?php echo base_url() . 'admin/pembeli_hapus/' . $p->pembeli_id; ?>"> Hapus</a>
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