		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md bg-lp3i-dark">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center bg-lp3i-dark">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
						    <?php
							$akses="";
							$link="";
							if($this->session->userdata('log')=='lgn-adm'){
							    $akses="Administrator";
							    $link=base_url()."adm/";
							}
							if($this->session->userdata('log')=='lgn-ukm'){
							    $akses="UKM";
							    $link=base_url()."ukm/";
							}
							?>
							<a href="<?= $link ?>">
								<img src="<?= base_url() ?>template/global_assets/images/logo/<?= $this->session->userdata('logo')?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?= $this->session->userdata('nama')?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?= $akses ?></span>
						</div>

						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="<?= $link."profile" ?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url() ?>Log/logout" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">

						<!-- Main -->
						<li class="nav-item-header">
							<div class="text-uppercase font-size-xs line-height-xs">Main</div>
						<i class="icon-menu" title="Main"></i></li>
						<?php if($this->session->userdata('log')=='lgn-adm'){ ?>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm" class="nav-link <?= $this->session->userdata("dashboard") ?> ">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm/kegiatan" class="nav-link <?= $this->session->userdata("kegiatan") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Kegiatan
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm/sertifikat" class="nav-link <?= $this->session->userdata("sertifikat") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Sertifikat
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm/karyawan" class="nav-link <?= $this->session->userdata("karyawan") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Karyawan
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm/kelas" class="nav-link <?= $this->session->userdata("kelas") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Kelas
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>adm/user" class="nav-link <?= $this->session->userdata("user") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									User
								</span>
							</a>
						</li>
						<?php } ?>
						<?php if($this->session->userdata('log')=='lgn-ukm'){ ?>
						<li class="nav-item">
							<a href="<?= base_url() ?>ukm" class="nav-link <?= $this->session->userdata("dashboard") ?> ">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>ukm/peserta_ukm" class="nav-link <?= $this->session->userdata("peserta_ukm") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Anggota UKM
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>ukm/kegiatan" class="nav-link <?= $this->session->userdata("kegiatan") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Kegiatan
								</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url() ?>ukm/sertifikat" class="nav-link <?= $this->session->userdata("sertifikat") ?> ">
								<i class="icon-file-empty2"></i>
								<span>
									Sertifikat
								</span>
							</a>
						</li>
						<?php } ?>
						<li class="nav-item">
							<a href="<?= base_url() ?>Log/logout" class="nav-link ">
								<i class="icon-switch2"></i>
								<span>
									Logout
								</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->

		</div>
