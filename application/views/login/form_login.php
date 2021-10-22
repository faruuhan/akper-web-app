<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 11:34:40 GMT -->

<head>
	<meta charset="utf-8" />
	<title>Login - AKPER Pasar Rebo</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
	<meta content="Coderthemes" name="author" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<!-- App css -->
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

	<div class="account-pages my-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10">
					<div class="card">
						<div class="card-body p-0">
							<div class="row">
								<div class="col-md-6 p-5">
									<div class="mx-auto mb-5">
										<a href="index.html">
											<img src="<?php echo base_url(); ?>assets/logo.png" alt="" height="110" />
											
										</a>
									</div>

									<h6 class="h5 mb-0 mt-4">Welcome back!</h6>
									<p class="text-muted mt-1 mb-4">Enter your username address and password to
										access.</p>

                  <?php if($this->session->flashdata('message') !=""){ ?>
                    <br>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <i data-feather="alert-triangle"></i>  <?php echo $this->session->flashdata('message'); ?>
                      </div>
                  <?php } ?>

									<form action="<?php echo site_url('login') ?>" method="POST" class="authentication-form">
										<div class="form-group">
											<label class="form-control-label">Username</label>
											<div class="input-group input-group-merge">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="icon-dual" data-feather="user"></i>
													</span>
												</div>
												<input type="text" class="form-control" id="username" placeholder="Enter your username"
													name="username">
											</div>
										</div>

										<div class="form-group mt-4">
											<label class="form-control-label">Password</label>
											<!-- <a href="pages-recoverpw.html" class="float-right text-muted text-unline-dashed ml-1">Forgot your
												password?</a> -->
											<div class="input-group input-group-merge">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="icon-dual" data-feather="lock"></i>
													</span>
												</div>
												<input type="password" class="form-control" id="password" placeholder="Enter your password"
													name="password">
											</div>
										</div>

										<div class="form-group mb-4">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
												<label class="custom-control-label" for="checkbox-signin">Remember
													me</label>
											</div>
										</div>

										<div class="form-group mb-0 text-center">
											<button class="btn btn-primary btn-block" type="submit"> Log In
											</button>
										</div>
									</form>
									
								</div>
								<div class="col-lg-6 d-none d-md-inline-block">
									<div class="auth-page-sidebar">
										<div class="overlay"></div>
										<div class="auth-user-testimonial">
											
										</div>
									</div>
								</div>
							</div>

						</div> <!-- end card-body -->
					</div>
					<!-- end card -->

					<div class="row mt-3">
						<!-- <div class="col-12 text-center">
							<p class="text-muted">Don't have an account? <a href="pages-register.html"
									class="text-primary font-weight-bold ml-1">Sign Up</a></p>
						</div> end col -->
					</div>
					<!-- end row -->

				</div> <!-- end col -->
			</div>
			<!-- end row -->
		</div>
		<!-- end container -->
	</div>
	<!-- end page -->

	<!-- Vendor js -->
	<script src="<?php echo base_url(); ?>assets/js/vendor.min.js"></script>

	<!-- App js -->
	<script src="<?php echo base_url(); ?>assets/js/app.min.js"></script>

</body>

<!-- Mirrored from shreyu.coderthemes.com/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Jan 2020 11:34:40 GMT -->

</html>
