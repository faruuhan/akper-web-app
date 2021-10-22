<div class="content">
	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#">User</a></li>
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

						<form class="form-horizontal" method="POST" action="<?php echo site_url('user/simpan') ?>">
							<div class="row">
								<div class="col">
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="userType">userType</label>
										<div class="col-lg-10">
                      <select name="userType" class="form-control" id="userType" onChange>
                        <option value="" selected>--Pilih userType---</option>
                        <option value="Mahasiswa">Mahasiswa</option>
                        <option value="Akademik">Akademik</option>
                        <option value="PA">PA</option>
                        <option value="Admin">Admin</option>
                      </select>
											<input type="hidden" class="form-control" id="id" value="" name="id">
										</div>
									</div>
									<div class="form-group row" id="userAlias">
										<label class="col-lg-2 col-form-label" for="userAlias">userAlias</label>
										<div class="col-lg-10">
											<select id="userAlias" class="form-control" data-plugin="customselect" name="userAlias" required>
                        <option value="">--Pilih Mahasiswa--</option>
												<?php foreach($list_mhs as $row) { ?>
                          <option value="<?= $row->nim ?>"><?= $row->nama_mahasiswa ?></option>
                        <?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-2 col-form-label" for="username">Username</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" id="username" value="" name="username" required>
										</div>
									</div>
                  <div class="form-group row">
										<label class="col-lg-2 col-form-label" for="password">Password</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" id="password" value="" name="password" required>
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
$('#userAlias').hide();

$('#userType').on('change', function() {
  //  alert( this.value ); // or $(this).val()
  if(this.value == "Mahasiswa") {
    $('#userAlias').show();
  }else{
    $('#userAlias').hide();
  }
});
</script>
