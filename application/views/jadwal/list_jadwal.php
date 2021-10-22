<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Jadwal</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title_tab; ?></li>
					</ol>
				</nav>
				<h4 class="mb-1 mt-0"><?= $title_tab; ?></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<h4 class="header-title mt-0"><?= $title_form; ?></h4>
							<button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target="#myModal"><i data-feather="printer" class="icons-xxl"></i> Cetak</button>
						<?php if($this->session->has_userdata('warning')) { ?>
						<div class="alert alert-warning alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i data-feather="alert-triangle"></i> <?= $this->session->flashdata('warning') ?>
						</div>
						<?php } ?>
						<?php if($this->session->has_userdata('success')) { ?>
						<div class="alert alert-success alert-dismissible fade show">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i data-feather="check"></i> <?= $this->session->flashdata('success') ?>
						</div>
						<?php } ?>
						<table id="basic-datatable" class="table dt-responsive nowrap">
							<thead>
								<tr>
									<th style="width:5px">#</th>
									<td>Matakuliah / </br> Dosen</td>
									<td>Tahun Akademik / </br> Semester</td>
                  <td>Hari</td>
                  <td>Ruangan</td>
                  <td>Jam</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($list_jadwal as $row) {?>
								<tr>
									<th style="width:5px"><?= $no ?></th>
									<td><?= $row->matakuliah ?>, </br>  
									<?= $row->nama_dosen ?>
									</td>
									<td><?= $row->tahun_akademik ?>, </br>  
									<?= $row->semester == 1 ? 'I Ganjil' : null ?>
									<?= $row->semester == 2 ? 'II Genap' : null ?>
									<?= $row->semester == 3 ? 'III Ganjil' : null ?>
									<?= $row->semester == 4 ? 'VI Genap' : null ?>
									<?= $row->semester == 5 ? 'X Ganjil' : null ?>
									<?= $row->semester == 6 ? 'IV Genap' : null ?>
									</td>
                  <td><?= $row->hari ?></td>
									<td><?= $row->ruangan ?></td>
                  <td><?= date('g:i a',strtotime($row->jam)) ?></td>
                  <td><a class="btn btn-primary" href="<?= base_url('index.php/jadwal/edit/'.$row->kd_jadwal) ?>"><i data-feather="edit-2" class="icons-sm"></i> Edit</a>
                  </td>
								</tr>
								<?php $no++; } ?>
							</tbody>
						</table>
					</div> <!-- end card-body -->
				</div> <!-- end card-->
			</div><!-- end col -->
		</div>
		<!-- end row -->

	</div> <!-- container-fluid -->

</div> <!-- content -->

<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="myModalLabel">Cetak Jadwal</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="<?php echo site_url('jadwal/cetak_jadwal') ?>">
          <div class="row">
            <div class="col">
							<div class="form-group row">
                <label class="col-lg-2 col-form-label" for="thn">Tahun Akademik</label>
                <div class="col-lg-10">
                  <select name="tahun_akademik" id="thn" class="form-control">
                    <option value="">Please Select</option>
											<?php
											$thn_skr = date('Y');
											for ($x = $thn_skr; $x >= 2015; $x--) {
											?>
												<option value="<?php echo $x ?>"><?php echo $x ?></option>
											<?php
											}
											?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="semester">semester</label>
                <div class="col-lg-10">
                  <select name="semester" id="semester" class="form-control">
                    <option value="">Please Select</option>
											<?php
											$smst = 1;
											for ($x = $smst; $x < 7; $x++) {
											?>
												<option value="<?php echo $x ?>"><?php echo $x ?></option>
											<?php
											}
											?>
                  </select>
                </div>
              </div>
            </div>
          </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary" target="_blank">Cetak</button>
      </div>
        </form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->