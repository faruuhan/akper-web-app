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
  <title>Jadwal Perkuliahan <?= $jadwal[0]->ruangan ?></title>
</head>
<body>
  <h4>JADWAL KEGIATAN KULIAH</h4>
  <p>TAHUN AKADEMIK <?= $jadwal[0]->tahun_akademik ?></p>
  <p>Semester : <?= $jadwal[0]->semester ?></p>
  
  <table class="table table-striped">
    <thead>
      <tr>
        <td>#</td>
        <td>Matakuliah</td>
        <td>Dosen</td>
        <td>Hari</td>
        <td>Jam</td>
        <td>Ruangan</td>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($jadwal as $row) { ?>
      <tr>
        <td><?= $no ?></td>
        <td><?= $row->matakuliah ?></td>
        <td><?= $row->nama_dosen ?></td>
        <td><?= $row->hari ?></td>
        <td><?= date('g:i a',strtotime($row->jam)) ?></td>
        <td><?= $row->ruangan ?></td>
      </tr>
    <?php $no++; } ?>
    </tbody>
  </table>
</body>
</html>