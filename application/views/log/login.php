<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Politeknik LP3I Kampus Tasikmalaya - Login</title>
	<?php $this->load->view('template/layout_2/link.php')?>

</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form " action="<?= base_url() ?>log/cek_login"method="POST">
					<div class="card mb-0">
						<div class="card-body ">
							<div class="text-center mb-2 ">
								<img src="<?= base_url() ?>template/global_assets/images/poltek.png" class="col-6">
								<span class="d-block text-muted mt-2">LP3I Tasikmalaya</span>
								<h5 class="mb-0">LOGIN</h5>
								<?php 
								if(isset($_GET['msg']) and $_GET['msg']=="gagal"){
									echo '<span class="d-block text-danger">The Username or Password is Incorrect</span>';
								}
								if(isset($_GET['msg']) and $_GET['msg']=="logout"){
									echo '<span class="d-block text-success">Success Logout</span>';
								}
								?>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="username" class="form-control" placeholder="Username" required>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-dark btn-block">Login <i class="icon-circle-right2 ml-2"></i></button>
							</div>
							
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
