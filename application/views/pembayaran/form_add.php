<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">Pembayaran</a></li>
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

						<form class="form-horizontal" method="POST" action="<?php echo site_url('pembayaran/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="mhs">Mahasiswa</label>
										<div class="col-lg-10">
											<select name="nim" id="mhs" data-plugin="customselect" class="form-control">
												<option value="">-- Pilih Mahasiswa --</option>
                        <?php foreach($list_mhs as $row) { ?>
												<option value="<?= $row->nim ?>"><?= $row->nama_mahasiswa ?> (<?= $row->nim ?>)</option>
                        <?php } ?> 
                      </select> 
                      <input type="hidden" name="kode_pembayaran">
										</div>
									</div>
                  <div class="form-group row">
										<label class="col-lg-2 col-form-label" for="mhs">No KPS</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" value="<?= 'KPS-'.date('y').random_string('numeric', 4) ?>" name="no_kps" readonly>
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
                  <div class="form-group row">
										<label class="col-lg-2 col-form-label" for="mhs">Tanggal</label>
										<div class="col-lg-10">
											<input type="date" class="form-control" name="tanggal">
										</div>
									</div>
                  <div class="form-row align-items-center mt-5 mb-5">
                    <div class="col-lg-6">
                        <label class="sr-only" for="inlineFormInput">Jenis Pembayaran</label>
                        <select name="" id="jenispembayaran" data-plugin="customselect" class="form-control select2-hidden-accessible">
                          <option value="" selected>-- Jenis Pembayaran --</option>
                          <option value="form1">Sumbangan Pengembangan Pendidikan</option>
                          <option value="form2">Biaya kuliah / semester</option>
                          <option value="form3">Biaya seragam perlengkapan</option>
													<option value="form4">Biaya pengenalan akademik</option>
													<option value="form5">Biaya capping day</option>
													<option value="form6">Biaya KKN</option>
													<option value="form7">Biaya ujian akhir semester</option>
													<option value="form8">Biaya wisuda</option>
													<option value="form9">Biaya IKM / semester</option>
													<option value="form10">Biaya formulir</option>
													<option value="form11">Biaya test kesehatan</option>
													<option value="form12">Biaya lain-lain</option>
                        </select>
                    </div>
                    
                    <div class="col-auto">
                        <button type="button" class="btn btn-primary mb-2" id="btnPembayaran">Tambah Pembayaran</button>
                    </div>
                  </div>
                  <div class="form-group row">
										<label class="col-lg-4 col-form-label">Jenis Pembayaran</label>
										<label class="col-lg-6 col-form-label">Jumlah</label>
                    <label class="col-lg-2 col-form-label">Aksi</label>
									</div>
                  <div class="form-group row" id="form1">
										<label class="col-lg-4 col-form-label">Sumbangan Pengembangan Pendidikan</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_1" value="0" class="form-control" name="sumbangan_pendidikan" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn1" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
                  <div class="form-group row" id="form2">
										<label class="col-lg-4 col-form-label">Biaya kuliah / semester</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_2" value="0" class="form-control" name="biaya_kuliah_semester" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn2" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
                  <div class="form-group row" id="form3">
										<label class="col-lg-4 col-form-label">Biaya seragam & perlengkapan</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_3" value="0" class="form-control" name="biaya_seragam_perlengkapan" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn3" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form4">
										<label class="col-lg-4 col-form-label">Biaya pengenalan sistem akademik / PPSM</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_4" value="0" class="form-control" name="biaya_pengenalan_akademik" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn4" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form5">
										<label class="col-lg-4 col-form-label">Biaya capping day</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_5" value="0" class="form-control" name="biaya_capping_day" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn5" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form6">
										<label class="col-lg-4 col-form-label">Biaya KKN</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_6" value="0" class="form-control" name="biaya_kkn" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn6" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form7">
										<label class="col-lg-4 col-form-label">Biaya ujian akhir program (Ujian Nagara)</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_7" value="0" class="form-control" name="biaya_ujian_akhir" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn7" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form8">
										<label class="col-lg-4 col-form-label" for="mhs">Biaya wisuda & pengurusan ijasah</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_8" value="0" class="form-control" name="biaya_wisuda" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn8" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form9">
										<label class="col-lg-4 col-form-label">Biaya IKM / semester</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_9" value="0" class="form-control" name="biaya_ikm" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn9" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form10">
										<label class="col-lg-4 col-form-label">Biaya formulir pendaftaran</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_10" value="0" class="form-control" name="biaya_formulir">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn10" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form11">
										<label class="col-lg-4 col-form-label">Biaya test kesehatan</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_11" value="0" class="form-control" name="biaya_test_kesehatan" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn11" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row" id="form12">
										<label class="col-lg-4 col-form-label">Biaya lain-lain</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_12" value="0" class="form-control" name="biaya_lain" onkeyup="hitung()">
										</div>
                    <div class="col-lg-2">
											<button type="button" id="btn12" class="btn btn-danger"> <i data-feather="eye-off"></i> </button>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Jumlah uang disetor</label>
										<div class="col-lg-6">
											<input type="number" id="biaya_total" value="0" class="form-control" name="jumlah_disetor" onkeyup="hitung()" readonly>
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

<script>
  $('#form1').hide();
  $('#form2').hide();
  $('#form3').hide();
	$('#form4').hide();
	$('#form5').hide();
	$('#form6').hide();
	$('#form7').hide();
	$('#form8').hide();
	$('#form9').hide();
	$('#form10').hide();
	$('#form11').hide();
	$('#form12').hide();

  $('#btnPembayaran').on('click', function() {
    if($('#jenispembayaran').val() == 'form1'){
      $('#form1').toggle(200);
    }else if($('#jenispembayaran').val() == 'form2'){
      $('#form2').toggle(200);
    }else if($('#jenispembayaran').val() == 'form3'){
      $('#form3').toggle(200);
    }else if($('#jenispembayaran').val() == 'form4'){
      $('#form4').toggle(200);
    }else if($('#jenispembayaran').val() == 'form5'){
      $('#form5').toggle(200);
    }else if($('#jenispembayaran').val() == 'form6'){
      $('#form6').toggle(200);
    }else if($('#jenispembayaran').val() == 'form7'){
      $('#form7').toggle(200);
    }else if($('#jenispembayaran').val() == 'form8'){
      $('#form8').toggle(200);
    }else if($('#jenispembayaran').val() == 'form9'){
      $('#form9').toggle(200);
    }else if($('#jenispembayaran').val() == 'form10'){
      $('#form10').toggle(200);
    }else if($('#jenispembayaran').val() == 'form11'){
      $('#form11').toggle(200);
    }else if($('#jenispembayaran').val() == 'form12'){
      $('#form12').toggle(200);
    }else{
			alert('Pilih Jenis Pembayaran');
		}
  });

  $("#btn1").click(function(){
    $("#form1").toggle(200);
  });
	$("#btn2").click(function(){
    $("#form2").toggle(200);
  });
	$("#btn3").click(function(){
    $("#form3").toggle(200);
  });
	$("#btn4").click(function(){
    $("#form4").toggle(200);
  });
	$("#btn5").click(function(){
    $("#form5").toggle(200);
  });
	$("#btn6").click(function(){
    $("#form6").toggle(200);
  });
	$("#btn7").click(function(){
    $("#form7").toggle(200);
  });
	$("#btn8").click(function(){
    $("#form8").toggle(200);
  });
	$("#btn9").click(function(){
    $("#form9").toggle(200);
  });
	$("#btn10").click(function(){
    $("#form10").toggle(200);
  });
	$("#btn11").click(function(){
    $("#form11").toggle(200);
  });
	$("#btn12").click(function(){
    $("#form12").toggle(200);
  });

	function hitung(){
		var biaya_1 = parseInt($('#biaya_1').val());
		var biaya_2 = parseInt($('#biaya_2').val());
		var biaya_3 = parseInt($('#biaya_3').val());
		var biaya_4 = parseInt($('#biaya_4').val());
		var biaya_5 = parseInt($('#biaya_5').val());
		var biaya_6 = parseInt($('#biaya_6').val());
		var biaya_7 = parseInt($('#biaya_7').val());
		var biaya_8 = parseInt($('#biaya_8').val());
		var biaya_9 = parseInt($('#biaya_9').val());
		var biaya_10 = parseInt($('#biaya_10').val());
		var biaya_11 = parseInt($('#biaya_11').val());
		var biaya_12 = parseInt($('#biaya_12').val());

		biaya_total = biaya_1 + biaya_2 + biaya_3 + biaya_4 + biaya_5 + biaya_6 + biaya_7 + biaya_8 + biaya_9 + biaya_10 + biaya_11 + biaya_12 ;
		$('#biaya_total').val(biaya_total);
	}
</script>

