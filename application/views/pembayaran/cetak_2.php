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
  <h4>Bukti Pembayaran</h4>
  
  <table>
    <tr>
      <th>Tahun Akademik </th>
      <td>: <?= $pembayaran[0]->tahun_akademik ?></td>
    </tr>
    <tr>
      <th>Semester </th>
      <td>: 
        <?= $pembayaran[0]->semester == 1 ? 'I Ganjil' : null ?>
        <?= $pembayaran[0]->semester == 2 ? 'II Genap' : null ?>
        <?= $pembayaran[0]->semester == 3 ? 'III Ganjil' : null ?>
        <?= $pembayaran[0]->semester == 4 ? 'VI Genap' : null ?>
        <?= $pembayaran[0]->semester == 5 ? 'X Ganjil' : null ?>
        <?= $pembayaran[0]->semester == 6 ? 'IV Genap' : null ?>
      </td>
    </tr>
    <tr>
      <th>Nama Mahasiswa </th>
      <td>: <?= $pembayaran[0]->nama_mahasiswa ?></td>
    </tr>
    <tr>
      <th>NIM </th>
      <td>: <?= $pembayaran[0]->nim ?></td>
    </tr>
    <tr>
      <th>Tanggal </th>
      <td>: <?= $pembayaran[0]->tanggal ?></td>
    </tr>
  </table>

  <table class="table table-striped mt-5">
    <thead>
      <tr>
        <td style="width:5%">#</td>
        <td style="width:70%">Jenis Pembayaran</td>
        <td>Jumlah</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($pembayaran as $row) { ?>
      <tr>
        <td>1</td>
        <td>Sumbangan Pengembagan Pendidikan</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->sumbangan_pendidikan) ?></td>
      </tr>
      <tr>
        <td>2</td>
        <td>Biaya Kuliah / Semester</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_kuliah_semester) ?></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Biaya Seragam & Perlengkapan</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_seragam_perlengkapan) ?></td>
      </tr>
      <tr>
        <td>4</td>
        <td>Biaya Pengenalan Sistem Akademik / PPSM</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_pengenalan_akademik) ?></td>
      </tr>
      <tr>
        <td>5</td>
        <td>Biaya Capping Day</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_capping_day) ?></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Biaya KKN</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_kkn) ?></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Biaya Ujian Akhir Program (Ujian Nagara)</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_ujian_akhir) ?></td>
      </tr>
      <tr>
        <td>8</td>
        <td>Biaya Wisuda & Pengurusan Ijasah</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_wisuda) ?></td>
      </tr>
      <tr>
        <td>9</td>
        <td>Biaya IKM / Semester</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_ikm) ?></td>
      </tr>
      <tr>
        <td>10</td>
        <td>Biaya Formulir Pendaftaran</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_formulir) ?></td>
      </tr>
      <tr>
        <td>11</td>
        <td>Biaya Test Kesehatan</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_test_kesehatan) ?></td>
      </tr>
      <tr>
        <td>12</td>
        <td>Biaya Lain-Lain</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->biaya_lain) ?></td>
      </tr>
      <tr>
        <td colspan="2">Jumlah yang disetor</td>
        <td><?= 'Rp. '.number_format($pembayaran[0]->jumlah_disetor) ?></td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
</body>
</html>