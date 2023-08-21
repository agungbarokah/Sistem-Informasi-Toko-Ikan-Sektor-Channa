            <div id="layoutSidenav_content">
              <main>
                <div class="container-fluid px-4">
                  <h1 class="mt-4"><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
                  <ol class="breadcrumb mb-4">
                  </ol>
                  <div class="row">
                    <div class="col-xl-3 col-md-6">
                      <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Jumlah Data Ikan</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                          <?php echo $this->m_ikan->get_data('admin')->num_rows(); ?>
                          <a class="small text-white stretched-link" href="<?php echo base_url().'admin/ikan'; ?>">Lihat Detail</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                      <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Jumlah Data Barang</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                          <?php echo $this->m_ikan->get_data('barang')->num_rows(); ?>
                          <a class="small text-white stretched-link" href="<?php echo base_url().'admin/barang'; ?>">Lihat Detail</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                      <div class="card bg-success text-white mb-4">
                        <div class="card-body">Jumlah Data Transaksi</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                          <?php echo $this->m_ikan->get_data('transaksi')->num_rows(); ?>
                          <a class="small text-white stretched-link" href="<?php echo base_url().'admin/transaksi'; ?>">Lihat Detail</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                      <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Status Transaksi Selesai</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                          <?php echo $this->m_ikan->edit_data(array('transaksi_status' =>2), 'transaksi')->num_rows(); ?>
                          <a class="small text-white stretched-link" href="<?php echo base_url().'admin/transaksi'; ?>">Lihat Detail</a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
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
