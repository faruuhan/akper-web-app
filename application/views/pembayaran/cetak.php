<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
  p, h4 {
    text-align: center;
  }
  </style>
  <title>Pembayaran Kuliah</title>
</head>
<body>
  <h4>Laporan Pembayaran</h4>
  <p>TAHUN <?= date('Y') ?></p>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <td>#</td>
        <td>Kode Pembayaran</td>
        <td>No KPS</td>
        <td>Tanggal</td>
        <td>Nama Mahasiswa</td>
        <td>Jumlah Bayar</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($pembayaran as $row) { ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $row->kode_pembayaran ?></td>
        <td><?= $row->no_kps ?></td>
        <td><?= $row->tanggal ?></td>
        <td><?= $row->nama_mahasiswa ?></td>
        <td>Rp. <?= number_format($row->jumlah_disetor) ?></td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
</body>
</html>