<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Laporan</a></li>
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
									<td>NIM / Nama Mahasiswa</td>
									<td>No KPS</td>
                  <td>Semester</td>
									<td>Tahun Akademik</td>
                  <td>Aksi</td>
								</tr>
							</thead>
							<tbody>
                 <?php $no=1; foreach($list_kps as $row) {?>
								<tr>
									<th style="width:5px"><?= $no ?></th>
									<td><?= $row->nim ?>
										<p> <?= $row->nama_mahasiswa ?>
									</td>
                  <td><?= $row->no_kps ?></td>
                  <td><?= $row->semester ?></td>
									<td><?= $row->tahun_akademik ?></td>
									<td><a class="btn btn-success" href="<?= base_url('index.php/laporan/cetak_kps/'.$row->no_kps) ?>"><i data-feather="printer" class="icons-sm"></i> Cetak</a></td>
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
