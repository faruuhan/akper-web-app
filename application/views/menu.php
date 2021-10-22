<!-- Topbar Start -->
<div class="navbar navbar-expand flex-column flex-md-row navbar-custom">
	<div class="container-fluid">
		<!-- LOGO -->
		<a href="index.html" class="navbar-brand mr-0 mr-md-2 logo">
			<span class="logo-lg">
				<img src="<?php echo base_url(); ?>assets/logo.png" alt="" height="50" />
				<!-- <span class="d-inline h5 ml-1 text-logo">Shreyu</span> -->
			</span>
			<span class="logo-sm">
				<img src="<?php echo base_url(); ?>assets/logo.png" alt="" height="20">
			</span>
		</a>

		<ul class="navbar-nav bd-navbar-nav flex-row list-unstyled menu-left mb-0">
			<li class="">
				<button class="button-menu-mobile open-left disable-btn">
					<i data-feather="menu" class="menu-icon"></i>
					<i data-feather="x" class="close-icon"></i>
				</button>
			</li>
		</ul>

		<ul class="navbar-nav flex-row ml-auto d-flex list-unstyled topnav-menu float-right mb-0">
			<li class="d-none d-sm-block">
				<div class="app-search">
					<form>
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search...">
							<span data-feather="search"></span>
						</div>
					</form>
				</div>
			</li>

			<li class="dropdown d-none d-lg-block" data-toggle="tooltip" data-placement="left" title="Change language">
				<a class="nav-link dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
					aria-expanded="false">
					<i data-feather="globe"></i>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<img src="<?php echo base_url(); ?>assets/images/flags/germany.jpg" alt="user-image" class="mr-2"
							height="12"> <span class="align-middle">German</span>
					</a>

					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<img src="<?php echo base_url(); ?>assets/images/flags/italy.jpg" alt="user-image" class="mr-2" height="12">
						<span class="align-middle">Italian</span>
					</a>

					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<img src="<?php echo base_url(); ?>assets/images/flags/spain.jpg" alt="user-image" class="mr-2" height="12">
						<span class="align-middle">Spanish</span>
					</a>

					<!-- item-->
					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<img src="<?php echo base_url(); ?>assets/images/flags/russia.jpg" alt="user-image" class="mr-2"
							height="12"> <span class="align-middle">Russian</span>
					</a>
				</div>
			</li>


			<li class="dropdown notification-list" data-toggle="tooltip" data-placement="left"
				title="8 new unread notifications">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
					aria-expanded="false">
					<i data-feather="bell"></i>
					<span class="noti-icon-badge"></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right dropdown-lg">

					<!-- item-->
					<div class="dropdown-item noti-title border-bottom">
						<h5 class="m-0 font-size-16">
							<span class="float-right">
								<a href="#" class="text-dark">
									<small>Clear All</small>
								</a>
							</span>Notification
						</h5>
					</div>

					<div class="slimscroll noti-scroll">

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
							<div class="notify-icon bg-primary"><i class="uil uil-user-plus"></i></div>
							<p class="notify-details">New user registered.<small class="text-muted">5 hours ago</small>
							</p>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
							<div class="notify-icon">
								<img src="<?php echo base_url(); ?>assets/images/users/avatar-1.jpg" class="img-fluid rounded-circle" alt="" />
							</div>
							<p class="notify-details">Karen Robinson</p>
							<p class="text-muted mb-0 user-msg">
								<small>Wow ! this admin looks good and awesome design</small>
							</p>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
							<div class="notify-icon">
								<img src="<?php echo base_url(); ?>assets/images/users/avatar-2.jpg" class="img-fluid rounded-circle" alt="" />
							</div>
							<p class="notify-details">Cristina Pride</p>
							<p class="text-muted mb-0 user-msg">
								<small>Hi, How are you? What about our next meeting</small>
							</p>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item border-bottom active">
							<div class="notify-icon bg-success"><i class="uil uil-comment-message"></i> </div>
							<p class="notify-details">Jaclyn Brunswick commented on Dashboard<small class="text-muted">1
									min
									ago</small></p>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item border-bottom">
							<div class="notify-icon bg-danger"><i class="uil uil-comment-message"></i></div>
							<p class="notify-details">Caleb Flakelar commented on Admin<small class="text-muted">4 days
									ago</small></p>
						</a>

						<!-- item-->
						<a href="javascript:void(0);" class="dropdown-item notify-item">
							<div class="notify-icon bg-primary">
								<i class="uil uil-heart"></i>
							</div>
							<p class="notify-details">Carlos Crouch liked
								<b>Admin</b>
								<small class="text-muted">13 days ago</small>
							</p>
						</a>
					</div>

					<!-- All-->
					<a href="javascript:void(0);"
						class="dropdown-item text-center text-primary notify-item notify-all border-top">
						View all
						<i class="fi-arrow-right"></i>
					</a>

				</div>
			</li>

			<li class="dropdown notification-list" data-toggle="tooltip" data-placement="left" title="Settings">
				<a href="javascript:void(0);" class="nav-link right-bar-toggle">
					<i data-feather="settings"></i>
				</a>
			</li>

			<li class="dropdown notification-list align-self-center profile-dropdown">
				<a class="nav-link dropdown-toggle nav-user mr-0" data-toggle="dropdown" href="#" role="button"
					aria-haspopup="false" aria-expanded="false">
					<div class="media user-profile ">
						<img src="<?php echo base_url(); ?>assets/images/users/avatar-7.jpg" alt="user-image" class="rounded-circle align-self-center" />
						<div class="media-body text-left">
							<h6 class="pro-user-name ml-2 my-0">
								<span>Shreyu N</span>
								<span class="pro-user-desc text-muted d-block mt-1">Administrator </span>
							</h6>
						</div>
						<span data-feather="chevron-down" class="ml-2 align-self-center"></span>
					</div>
				</a>
				<div class="dropdown-menu profile-dropdown-items dropdown-menu-right">
					<a href="pages-profile.html" class="dropdown-item notify-item">
						<i data-feather="user" class="icon-dual icon-xs mr-2"></i>
						<span>My Account</span>
					</a>

					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i data-feather="settings" class="icon-dual icon-xs mr-2"></i>
						<span>Settings</span>
					</a>

					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i data-feather="help-circle" class="icon-dual icon-xs mr-2"></i>
						<span>Support</span>
					</a>

					<a href="pages-lock-screen.html" class="dropdown-item notify-item">
						<i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
						<span>Lock Screen</span>
					</a>

					<div class="dropdown-divider"></div>

					<a href="javascript:void(0);" class="dropdown-item notify-item">
						<i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
						<span>Logout</span>
					</a>
				</div>
			</li>
		</ul>
	</div>

</div>
<!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
	<div class="media user-profile mt-2 mb-2">
		<img src="<?php echo base_url(); ?>assets/images/users/avatar-7.jpg" class="avatar-sm rounded-circle mr-2"
			alt="Shreyu" />
		<img src="<?php echo base_url(); ?>assets/images/users/avatar-7.jpg" class="avatar-xs rounded-circle mr-2"
			alt="Shreyu" />

		<div class="media-body">
			<?php if($this->session->userdata('userType') != 'Mahasiswa'){ ?>
			<h6 class="pro-user-name mt-0 mb-0"><?= $this->session->userdata('userAlias') ?></h6>
			<span class="pro-user-desc"><?= $this->session->userdata('userType') ?></span>
			<?php } ?>
			<?php if($this->session->userdata('userType') == 'Mahasiswa'){ ?>
			<h6 class="pro-user-name mt-0 mb-0"><?= $this->session->userdata('userAlias') == $mhs[0]->nim ? $mhs[0]->nama_mahasiswa : null ?></h6>
			<span class="pro-user-desc"><?= $this->session->userdata('userType') ?></span>
			<?php } ?>
		</div>
		<div class="dropdown align-self-center profile-dropdown-menu">
			<a class="dropdown-toggle mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
				aria-expanded="false">
				<span data-feather="chevron-down"></span>
			</a>
			<div class="dropdown-menu profile-dropdown">
				<a href="<?php echo site_url('login/logout') ?>" class="dropdown-item notify-item">
					<i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
					<span>Logout</span>
				</a>
			</div>
		</div>
	</div>
	<div class="sidebar-content">
		<!--- Sidemenu -->
		<div id="sidebar-menu" class="slimscroll-menu">
			<ul class="metismenu" id="menu-bar">
				<li class="menu-title">Navigation</li>

				<li>
					<a href="<?php echo site_url('dashboard') ?>">
						<i data-feather="home"></i>
						<span> Dashboard </span>
					</a>
				</li>
				<li class="menu-title">Menu</li>

				<?php if($this->session->userdata('userType') == 'Akademik'){ ?>
				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Mahasiswa </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('mahasiswa') ?>">Tambah Mahasiswa</a>
						</li>
						<li>
							<a href="<?php echo site_url('mahasiswa/daftar') ?>">List Mahasiswa</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Dosen </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('dosen') ?>">Tambah Dosen</a>
						</li>
            <li>
							<a href="<?php echo site_url('dosen/daftar') ?>">List Dosen</a>
						</li>
					</ul>
				</li>

        <li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Matakuliah </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('matkul') ?>">List Matakuliah</a>
						</li>
					</ul>
				</li>

        <li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Jadwal </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('jadwal') ?>">Tambah Jadwal</a>
						</li>
						<li>
							<a href="<?php echo site_url('jadwal/daftar') ?>">List Jadwal</a>
						</li>
					</ul>
				</li>
				<?php } ?>
				
				<?php if($this->session->userdata('userType') == 'Keuangan'){ ?>
				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Pembayaran </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('pembayaran') ?>">Tambah Pembayaran</a>
						</li>
						<li>
							<a href="<?php echo site_url('pembayaran/daftar') ?>">List Pembayaran</a>
						</li>
					</ul>
				</li>
				<?php } ?>
				
				<?php if($this->session->userdata('userType') == 'Mahasiswa') { ?>
				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Kartu Program Studi </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('kps') ?>">Tambah KPS</a>
						</li>
						<li>
							<a href="<?php echo site_url('kps/daftar') ?>">List KPS</a>
						</li>
					</ul>
				</li>
				<?php } ?>
				
				<?php if($this->session->userdata('userType') == 'Admin') { ?>
				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> User </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('user') ?>">Tambah User</a>
						</li>
						<li>
							<a href="<?php echo site_url('user/daftar') ?>">List User</a>
						</li>
					</ul>
				</li>
				<?php } ?>

				<?php if($this->session->userdata('userType') == 'PA') { ?>
				<li>
					<a href="javascript: void(0);">
						<i data-feather="file-text"></i>
						<span> Laporan </span>
						<span class="menu-arrow"></span>
					</a>

					<ul class="nav-second-level" aria-expanded="false">
						<li>
							<a href="<?php echo site_url('laporan') ?>">KPS</a>
						</li>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
		<!-- End Sidebar -->

		<div class="clearfix"></div>
	</div>
	<!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->
