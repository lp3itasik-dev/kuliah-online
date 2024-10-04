	<div class="navbar navbar-expand-md navbar-dark navbar-static bg-lp3i-dark">

		<!-- Header with logos -->
		<div class="navbar-header navbar-dark d-none d-md-flex align-items-md-center bg-lp3i-dark">
			<div class="navbar-brand navbar-brand-md">
				<a href="#" class="d-inline-block">
					<img style="height:2rem" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-3.png" alt="">
				</a>
			</div>
			
			<div class="navbar-brand navbar-brand-xs">
				<a href="index.html" class="d-inline-block">
					<img style="height:2rem" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-1.png" alt="">
				</a>
			</div>
		</div>
		<!-- /header with logos -->
	

		<!-- Mobile controls -->
		<div class="d-flex flex-1 d-md-none navbar-dark bg-lp3i-dark">
			<div class="navbar-brand mr-auto">
				<a href="#" class="d-inline-block">
					<img src="<?= base_url() ?>template/global_assets/images/logo-politeknik-3.png" alt="">
				</a>
			</div>	
			<a href="<?= base_url() ?>log/logout" class="navbar-toggler">
				<i class="icon-switch2"></i>
			</a>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>
		<!-- /mobile controls -->


		<!-- Navbar content -->
		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>

				<li class="nav-item dropdown">
					
					
				</li>
			</ul>

			<span class="mr-md-auto"></span>

			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="<?= base_url() ?>log/logout" class="d-flex align-items-center btn btn-sm bg-lp3i" style="font-size:0.8rem">
						<i class="icon-switch2"></i>&nbsp;LOGOUT
					</a>
				</li>
			</ul>
		</div>
		<!-- /navbar content -->
		
	</div>