<div class="content">

	<!-- Start Content-->
	<div class="container-fluid">
		<div class="row page-title">
			<div class="col-md-12">
				<nav aria-label="breadcrumb" class="float-right mt-1">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item"><a href="#"><?= $title_tab; ?></a></li>
					</ol>
				</nav>
				<h4 class="mb-1 mt-0"><?= $title_page; ?></h4>
			</div>
		</div>
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-body">
										<div class="row align-items-center">
												<div class="col-xl-2 col-lg-3 col-6">
														<img src="<?php echo base_url(); ?>assets/images/cal.png" class="mr-4 align-self-center img-fluid "
														alt="cal" />
												</div>
												<div class="col-xl-10 col-lg-9">
														<div class="mt-4 mt-lg-0">
																<h5 class="mt-0 mb-1 font-weight-bold">Welcome 
																<?php if($this->session->userdata('userType') != 'Mahasiswa'){ ?>
																	<?= $this->session->userdata('userAlias') ?>
																<?php } ?>
																<?php if($this->session->userdata('userType') == 'Mahasiswa'){ ?>
																	<?= $this->session->userdata('userAlias') == $mhs[0]->nim ? $mhs[0]->nama_mahasiswa : null ?>
																<?php } ?>
																</h5>
																<p class="text-muted mb-2">Fasilitas ini di khususkan bagi para mahasiswa <b>Akademi Keperawatan Pasar Rebo</b> yang terhitung masih aktif. <br> Untuk itu silahkan di pergunakan dengan baik dan di jadikan sebagai sarana anda melihat perkembangan data rekaman studi yang sudah ada di dalamnya.</br> </p>
														</div>
												</div>
										</div>
										
								</div> <!-- end card body-->
						</div> <!-- end card -->
				</div>
				<!-- end col-12 -->
		</div> <!-- end row -->
	</div> <!-- container-fluid -->

</div> <!-- content -->
