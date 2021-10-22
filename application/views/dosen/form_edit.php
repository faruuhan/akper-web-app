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

						<form class="form-horizontal" method="POST" action="<?php echo site_url('dosen/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="NIDN">NIDN</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="NIDN"
												value="<?= $dosen[0]->nidn; ?>" name="nidn" required>
											<input type="hidden" value="<?= $this->uri->segment(2); ?>" name="page">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="namaDosen">Nama Dosen</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="namaDosen" value="<?= $dosen[0]->nama_dosen; ?>" name="nama_dosen" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="gender">Jenis Kelamin</label>
										<div class="col-lg-10">
											<select id="gender" class="form-control" name="jenis_kelamin" required>
												<option value="">--Jenis Kelamin--</option>
												<option value="L" <?= $dosen[0]->jenis_kelamin == 'L' ? 'selected' : null ; ?>>Laki - Laki</option>
												<option value="P" <?= $dosen[0]->jenis_kelamin == 'P' ? 'selected' : null ; ?>>Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="alamat">Alamat</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="alamat" value="<?= $dosen[0]->alamat; ?>" name="alamat" required>
										</div>
									</div>
									<div class="form-group text-right mb-0">
										<button class="btn btn-primary mr-1" type="submit">Submit</button>
										<button type="reset" class="btn btn-secondary">Cancel</button>
									</div>
								</div>
							</div>
						</form>

					</div> <!-- end card-body -->
				</div> <!-- end card-->
			</div><!-- end col -->
		</div>
		<!-- end row -->

	</div> <!-- container-fluid -->

</div> <!-- content -->
