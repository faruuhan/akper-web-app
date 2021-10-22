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
												<option value="<?= $row->kd_matkul ?>" <?= $jadwal[0]->kd_matkul == $row->kd_matkul ? 'selected' : null ?>><?= $row->matakuliah ?></option>
												<?php } ?> 
                      </select> 
                      <input type="hidden" name="kd_jadwal" value="<?= $jadwal[0]->kd_jadwal ?>" id="kd-jadwal">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="dosen">Dosen</label>
										<div class="col-lg-10">
											<select name="nidn" id="dosen" class="form-control">
												<option value="">-- Pilih Dosen --</option>
												<?php foreach($list_dosen as $row) { ?>
												<option value="<?= $row->nidn ?>" <?= $jadwal[0]->nidn == $row->nidn ? 'selected' : null ?>><?= $row->nama_dosen ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="hari">Hari</label>
										<div class="col-lg-10">
											<select name="hari" id="hari" class="form-control">
												<option value="">-- Pilih Hari --</option>
												<option value="Senin" <?= $jadwal[0]->hari == 'Senin' ? 'selected' : null ?>>Senin</option>
												<option value="Selasa" <?= $jadwal[0]->hari == 'Selasa' ? 'selected' : null ?>>Selasa</option>
												<option value="Rabu" <?= $jadwal[0]->hari == 'Rabu' ? 'selected' : null ?>>Rabu</option>
												<option value="Kamis" <?= $jadwal[0]->hari == 'Kamis' ? 'selected' : null ?>>Kamis</option>
												<option value="Jum'at" <?= $jadwal[0]->hari == "Jum'at" ? 'selected' : null ?>>Jum'at</option>
												<option value="Sabtu" <?= $jadwal[0]->hari == 'Sabtu' ? 'selected' : null ?>>Sabtu</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="hari">Ruangan</label>
										<div class="col-lg-10">
											<select name="ruangan" id="ruangan" class="form-control">
												<option value="">-- Pilih Ruangan --</option>
												<option value="R101" <?= $jadwal[0]->ruangan == 'R101' ? 'selected' : null ?>>R101</option>
												<option value="R102" <?= $jadwal[0]->ruangan == 'R102' ? 'selected' : null ?>>R102</option>
												<option value="R203" <?= $jadwal[0]->ruangan == 'R203' ? 'selected' : null ?>>R203</option>
												<option value="Lab. Keperawatan Gawat Darurat" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Gawat Darurat' ? 'selected' : null ?>>Lab. Keperawatan Gawat Darurat</option>
												<option value="Lab. Keperawatan Medika Bedah" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Medika Bedah' ? 'selected' : null ?>>Lab. Keperawatan Medika Bedah</option>
												<option value="Lab. Keperawatan Dasar" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Dasar' ? 'selected' : null ?>>Lab. Keperawatan Dasar</option>
												<option value="Lab. Keperawatan Maternitas" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Maternitas' ? 'selected' : null ?>>Lab. Keperawatan Maternitas</option>
												<option value="Lab. Keperawatan Maternitas" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Maternitas' ? 'selected' : null ?>>Lab. Keperawatan Maternitas</option>
												<option value="lab06" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Anak Sehat' ? 'selected' : null ?>>Lab. Keperawatan Anak Sehat</option>
												<option value="Lab. Keperawatan Anak Sakit" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Anak Sakit' ? 'selected' : null ?>>Lab. Keperawatan Anak Sakit</option>
												<option value="Lab. Keperawatan Gerontik" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Gerontik' ? 'selected' : null ?>>Lab. Keperawatan Gerontik</option>
												<option value="Lab. Keperawatan Keluarga" <?= $jadwal[0]->ruangan == 'Lab. Keperawatan Keluarga' ? 'selected' : null ?>>Lab. Keperawatan Keluarga</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="jam">Jam</label>
										<div class="col-lg-10">
											<input type="time" value="<?= $jadwal[0]->jam ?>" name="jam" id="jam" class="form-control">
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
														<option value="<?php echo $x ?>" <?= $jadwal[0]->tahun_akademik == $x ? 'selected' : null ?>><?php echo $x ?></option>
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
												<option value="1" <?= $jadwal[0]->semester == 1 ? 'selected' : null ?>>I Ganjil</option>
												<option value="2" <?= $jadwal[0]->semester == 2 ? 'selected' : null ?>>II Genap</option>
												<option value="3" <?= $jadwal[0]->semester == 3 ? 'selected' : null ?>>III Ganjil</option>
												<option value="4" <?= $jadwal[0]->semester == 4 ? 'selected' : null ?>>VI Genap</option>
												<option value="5" <?= $jadwal[0]->semester == 5 ? 'selected' : null ?>>X Ganjil</option>
												<option value="6" <?= $jadwal[0]->semester == 6 ? 'selected' : null ?>>IV Genap</option>
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
