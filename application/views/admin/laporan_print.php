<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <style type=text/css>
        .table-data{
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td{
            border:1px solid black;
            font-size: 10pt;
        }
    </style>
    <h3><center>Laporan Transaksi SEKTOR CHANA</center></h3>
    <table>
        <tr>
            <td>Data Dari Tanggal</td>
            <td>:</td>
            <td><?php echo date('d/m/Y',strtotime($_GET['dari'])); ?></td>
        </tr>
        <tr>
            <td>Data Sampai Tanggal</td>
            <td>:</td>
            <td><?php echo date('d/m/Y',strtotime($_GET['sampai'])); ?></td>
        </tr>
    </table>

    <br/>
    <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          <!-- Data Transaksi -->
      </div>
      <div class="card-body">
        <table class="table-data">
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
          <td><center><?php echo $no++ ?></center></td>
          <td><center><?php echo date('d/m/Y',strtotime($l->transaksi_tanggal)); ?></center></td>
          <td><?php echo $l->pembeli_nama; ?></td>
          <td><?php echo $l->nama_ikan; ?></td>
          <td><?php echo $l->jenis_ikan; ?></td>
          <td><?php echo $l->transaksi_jumlah; ?></td>
          <td><?php echo "Rp. ".number_format ($l->transaksi_total); ?></td>
          <td><center>
            <?php
            if($l->transaksi_status == "1"){
              echo "<div class='btn btn-warning btn-sm'>Dalam Proses</div>";
          }elseif($l->transaksi_status == "2"){
              echo "<div class='btn btn-success btn-sm'>Selesai</div>";
          }
          ?>
      </center></td>
  </tr>
  <?php
}
?>
</tbody>
</table>
</div>
</div>

<script type=text/javascript>
    window.print();
</script>
</body>
</html>