<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
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

						<form class="form-horizontal" method="POST" action="<?php echo site_url('mahasiswa/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="NIM">NIM</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="NIM"
												value="" name="nim" required>
											<input type="hidden" value="<?= $this->uri->segment(2); ?>" name="page">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="namaMhs">Nama Mahasiswa</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="namaMhs" value="" name="nama_mahasiswa" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="gender">Jenis Kelamin</label>
										<div class="col-lg-10">
											<select id="gender" class="form-control" name="jenis_kelamin" required>
												<option value="">--Jenis Kelamin--</option>
												<option value="L">Laki - Laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="tglLahir">Tanggal Lahir</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" id="tglLahir" value="" name="tgl_lahir" required>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="tahun_angkatan">Tahun Angkatan</label>
										<div class="col-lg-10">
											<select name="angkatan_tahun" id="tahun" class="form-control">
												<option value="">-- Pilih Tahun Akademik --</option>
												<?php
												$thn_skr = date('Y');
												for ($x = $thn_skr; $x >= '2015'; $x--) {
												?>
														<option value="<?php echo $x ?>"><?php echo $x ?></option>
												<?php
												}
												?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="semester">Semester</label>
										<div class="col-lg-10">
											<select name="semester" id="semester" class="form-control">
												<option value="">-- Pilih Semester --</option>
												<option value="1">I Ganjil</option>
												<option value="2">II Genap</option>
												<option value="3">III Ganjil</option>
												<option value="4">VI Genap</option>
												<option value="5">X Ganjil</option>
												<option value="6">IV Genap</option>
											</select>
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
