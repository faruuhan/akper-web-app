<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style>
  
  </style>
  <title>KPS</title>
</head>
<body>
  <table width="100%">
  <tr>
    <td align="left">
      <img src="<?php echo base_url(); ?>assets/logo-akpr.png" alt="" style="width:100px;hight:100px">
    </td>
    <td width="80%">
      <center>
      <b>AKADEMIK KEPERAWATAN PASAR REBO</b>
      <br>
      <b>PROGRAM PENDIDIKAN DIPLOMA III KEPERAWATAN</b>
      </center>

      <p class="mt-5">
      <b>KARTU PROGRAM STUDI (KPS)</b>
      <br>
      <b>TAHUN AKADEMIK <?= $kps[0]->tahun_akademik ?></b>
    </td>
  </tr>
  </table>

  <table>
    <tr>
      <th>NIM </th>
      <td>: <?= $kps[0]->nim ?></td>
    </tr>
    <tr>
      <th>Nama Mahasiswa </th>
      <td>: <?= $kps[0]->nama_mahasiswa ?></td>
    </tr>
    <tr>
      <th>Angkatan Tahun </th>
      <td>: <?= $kps[0]->angkatan_tahun ?></td>
    </tr>
    <tr>
      <th>Semester </th>
      <td>: 
        <?= $kps[0]->semester == 1 ? 'I Ganjil' : null ?>
        <?= $kps[0]->semester == 2 ? 'II Genap' : null ?>
        <?= $kps[0]->semester == 3 ? 'III Ganjil' : null ?>
        <?= $kps[0]->semester == 4 ? 'VI Genap' : null ?>
        <?= $kps[0]->semester == 5 ? 'X Ganjil' : null ?>
        <?= $kps[0]->semester == 6 ? 'IV Genap' : null ?>
      </td>
    </tr>
  </table>

  <table class="table table-bordered mt-5">
    <thead>
      <tr>
        <th style="width:15px">#</th>
        <th style="width:90%">Matakuliah</th>
        <th>SKS</th>
      </tr>
    </thead>
    <tbody>
    <?php $total=0; $no=1; foreach($kps as $row) { ?>
      <tr>
        <th><?= $no ?></th>
        <td><?= $row->matakuliah ?></td>
        <td><?= $row->sks ?></td>
      </tr>
    <?php $total += $row->sks; $no++; } ?>
      <tr>
        <td colspan="2" align="center">Total SKS</td>
        <td><?= $total ?></td>
      </tr>
    </tbody>
  </table>
</body>
</html>