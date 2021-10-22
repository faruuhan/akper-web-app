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

						<form class="form-horizontal" method="POST" action="<?php echo site_url('jadwal/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="matkul">Matakuliah</label>
										<div class="col-lg-10">
											<select name="kd_matkul" id="matkul" class="form-control">
												<option value="">-- Pilih Matakuliah --</option>
												<?php foreach($list_matkul as $row) { ?>
												<option value="<?= $row->kd_matkul ?>"><?= $row->matakuliah ?></option>
												<?php } ?> 
                      </select> 
                      <input type="hidden" name="kd_jadwal" id="kd-jadwal">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="dosen">Dosen</label>
										<div class="col-lg-10">
											<select name="nidn" id="dosen" class="form-control">
												<option value="">-- Pilih Dosen --</option>
												<?php foreach($list_dosen as $row) { ?>
												<option value="<?= $row->nidn ?>"><?= $row->nama_dosen ?> - <?= $row->nidn ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="hari">Hari</label>
										<div class="col-lg-10">
											<select name="hari" id="hari" class="form-control">
												<option value="">-- Pilih Hari --</option>
												<option value="Senin">Senin</option>
												<option value="Selasa">Selasa</option>
												<option value="Rabu">Rabu</option>
												<option value="Kamis">Kamis</option>
												<option value="Jum'at">Jum'at</option>
												<option value="Sabtu">Sabtu</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="hari">Ruangan</label>
										<div class="col-lg-10">
											<select name="ruangan" id="ruangan" class="form-control">
												<option value="">-- Pilih Ruangan --</option>
												<option value="R101">R001</option>
												<option value="R102">R002</option>
												<option value="R203">R003</option>
												<option value="Lab. Keperawatan Gawat Darurat">Lab. Keperawatan Gawat Darurat</option>
												<option value="Lab. Keperawatan Medika Bedah">Lab. Keperawatan Medika Bedah</option>
												<option value="Lab. Keperawatan Dasar">Lab. Keperawatan Dasar</option>
												<option value="Lab. Keperawatan Maternitas">Lab. Keperawatan Maternitas</option>
												<option value="Lab. Keperawatan Maternitas">Lab. Keperawatan Maternitas</option>
												<option value="Lab. Keperawatan Anak Sehat">Lab. Keperawatan Anak Sehat</option>
												<option value="labLab. Keperawatan Anak Sakit">Lab. Keperawatan Anak Sakit</option>
												<option value="Lab. Keperawatan Gerontik">Lab. Keperawatan Gerontik</option>
												<option value="Lab. Keperawatan Keluarga">Lab. Keperawatan Keluarga</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="jam">Jam</label>
										<div class="col-lg-10">
											<input type="time" name="jam" id="jam" class="form-control">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="tahun">Tahun Akademik</label>
										<div class="col-lg-10">
											<select name="tahun_akademik" id="tahun" class="form-control">
												<option value="">-- Pilih Tahun Akademik --</option>
												<?php
												$thn_skr = date('Y');
												for ($x = $thn_skr; $x >= date('Y', strtotime('-3 Years')); $x--) {
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
