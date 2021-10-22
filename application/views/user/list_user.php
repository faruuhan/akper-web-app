<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Dosen</a></li>
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
									<td>ID User</td>
									<td>UserAlias</td>
                  <td>Type</td>
                  <td>Status</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
                <?php $no=1; $i=0; foreach($list_user as $row) {?>
								<tr>
									<th style="width:5px"><?= $no ?></th>
									<td><?= $row->id ?></td>
                  <td><?= $row->userAlias ?></td>
                  <td><?= $row->userType ?></td>
                  <td><?= $row->status == '1' ? '<span class="badge badge-success badge-pill">Aktif</span>' : '<span class="badge badge-danger badge-pill">Non Aktif</span>' ?></td>
									<td><a class="btn btn-primary" href="<?= base_url('index.php/user/edit/'.$row->id) ?>"><i data-feather="edit-2" class="icons-sm"></i> Edit</a> 
                  <?php if($row->status == '0') { ?>
                  <a class="btn btn-danger" href="<?= base_url('index.php/user/hapus/'.$row->id) ?>"><i data-feather="trash-2" class="icons-sm"></i> Delete</a></td>
                  <?php } ?>
                </tr>
                <?php $no++; $i++; } ?>
							</tbody>
						</table>
					</div> <!-- end card-body -->
				</div> <!-- end card-->
			</div><!-- end col -->
		</div>
		<!-- end row -->

	</div> <!-- container-fluid -->

</div> <!-- content -->
