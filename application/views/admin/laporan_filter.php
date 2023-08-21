<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><i class="bi bi-file-earmark"> Laporan Transaksi</h3></i>
            <hr>
            <form method="post" action="<?php echo base_url().'admin/laporan' ?>">
                <div class="form-group mb-2">
                    <label>Dari Tanggal</label>
                    <input type="date" name="dari" value="<?php echo set_value('dari'); ?>" class="form-control">
                    <?php echo form_error('dari'); ?>
                </div>
                <div class="form-group mb-2">
                    <label>Sampai Tanggal</label>
                    <input type="date" name="sampai" value="<?php echo set_value('sampai'); ?>" class="form-control">
                    <?php echo form_error('sampai'); ?>
                </div>
                <br>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-primary" name="cari" value="CARI"><i class="bi bi-search"></i> Cari</button>
                </div>
            </form>
            <br>
            <div class="form-group mb-2">
                <a class="btn btn-warning btn-md" href="<?php echo base_url().'admin/laporan_print/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><i class="bi bi-printer"></i> Print</a>
            </div>
            <br/>
            <br/>
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
                     foreach ($laporan as $l) {
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo date('d/m/Y',strtotime($l->transaksi_tanggal)); ?></td>
                          <td><?php echo $l->pembeli_nama; ?></td>
                          <td><?php echo $l->nama_ikan; ?></td>
                          <td><?php echo $l->jenis_ikan; ?></td>
                          <td><?php echo $l->transaksi_jumlah; ?></td>
                          <td><?php echo "Rp. ".number_format ($l->transaksi_total); ?></td>
                          <td>
                            <?php
                            if($l->transaksi_status == "1"){
                              echo "<div class='btn btn-warning btn-sm'>Dalam Proses</div>";
                          }elseif($l->transaksi_status == "2"){
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