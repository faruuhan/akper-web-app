<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Matakuliah</a></li>
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
						<div class="float-sm-right mt-3 mt-sm-0">
							<button class="btn btn-primary mr-1" type="button" data-toggle="modal" data-target="#myModal"><i data-feather="file-plus" class="icons-xxl"></i> Tambah Matkul</button>
						</div>
						<h4 class="header-title mt-2 mb-4"><?= $title_form; ?></h4>
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
									<td>Kode Matakuliah</td>
									<td style="width:800px">Matakuliah</td>
									<td style="width:40px">SKS</td>
									<td>Action</td>
								</tr>
							</thead>
							<tbody>
								<?php $no=1; foreach($list_matkul as $row) {?>
								<tr>
									<th style="width:5px"><?= $no ?></th>
									<td><?= $row->kd_matkul ?></td>
									<td><?= $row->matakuliah ?></td>
									<td><?= $row->sks ?></td>
                  <td><button class="btn btn-primary" id="btnEdit" data-toggle="modal" data-target="#myModal" 
                  data-kd_matkul="<?= $row->kd_matkul ?>" 
                  data-matkul="<?= $row->matakuliah ?>" 
                  data-sks="<?= $row->sks ?>" ><i
												data-feather="edit-2" class="icons-sm"></i> Edit</button> <a class="btn btn-danger"
											href="<?= base_url('index.php/matkul/hapus/'.$row->kd_matkul) ?>" onclick="return confirm('Are you sure you want to delete this data?');"><i data-feather="trash-2"
                        class="icons-sm"></i> Delete</a>
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
				<h5 class="modal-title" id="myModalLabel">Form Matakuliah</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" method="POST" action="<?php echo site_url('matkul/simpan') ?>">
          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="matkul">Matakuliah</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="matkul" name="matakuliah" required>
                  <input type="hidden" name="kd_matkul" id="kd-matkul">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-lg-2 col-form-label" for="sks">SKS</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" id="sks" name="sks" required>
                </div>
              </div>
            </div>
          </div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
      </div>
        </form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $(document).ready(function () {
		$(document).on('click', '#btnEdit', function () {
      var kdmatkul = $(this).data('kd_matkul');
			var matakuliah = $(this).data('matkul');
			var sks = $(this).data('sks');
			$('#kd-matkul').val(kdmatkul);
      $('#matkul').val(matakuliah);
      $('#sks').val(sks);
    });
  });
</script>