            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><i class="bi bi-currency-dollar"> Data Transaksi</h1></i>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <a href="<?php echo base_url().'admin/transaksi_add'; ?>" class="btn btn-primary bi bi-plus"></span> Tambah Transaksi</a>
                        <br /><br />
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Transaksi
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                   <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Transaksi Tanggal</th>
                                        <th>Nama Pembeli</th>
                                        <th>Nama Ikan</th>
                                        <th>Jenis Ikan</th>
                                        <th>Jumlah Beli</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                 $no = 1;
                                 foreach ($transaksi as $t) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo date('d/m/Y',strtotime($t->transaksi_tanggal)); ?></td>
                                        <td><?php echo $t->pembeli_nama; ?></td>
                                        <td><?php echo $t->nama_ikan; ?></td>
                                        <td><?php echo $t->jenis_ikan; ?></td>
                                        <td><?php echo $t->transaksi_jumlah; ?></td>
                                        <td><?php echo "Rp. ".number_format ($t->transaksi_total); ?></td>
                                        <td>
                                            <?php
                                            if($t->transaksi_status == "1"){
                                                echo "<div class='btn btn-warning btn-sm'>Dalam Proses</div>";
                                            }elseif($t->transaksi_status == "2"){
                                                echo "<div class='btn btn-success btn-sm'>Selesai</div>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary bi bi-gear" href="<?php echo base_url() . 'admin/transaksi_edit/' . $t->transaksi_id; ?>"> Edit</a>
                                            <a onclick ="return confirm('Apakah anda yakin ?'
                                            )" class="btn btn-danger bi bi-trash" href="<?php echo base_url() . 'admin/transaksi_hapus/' . $t->transaksi_id; ?>"> Hapus</a>
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


