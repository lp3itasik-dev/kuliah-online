<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LP3I Tasikmalaya - Kelas</title>
	<?php $this->load->view('template/layout_2/link.php')?>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/layout_2/navbar.php')?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php $this->load->view('template/layout_2/sidebar.php')?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Kelas</h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content pt-0">

				<!-- Main charts -->
				<div class="row">

					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header header-elements-inline">
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; DAFTAR USER</h5>
								<button class="btn bg-lp3i-dark" onclick="return tambah()">TAMBAH</button>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<table class="table table-framed" id="datatable-basic">
										<thead class="bg-lp3i-dark">
											<tr>
												<th width="30px" class="text-center">NO</th>
												<th width="100px" class="text-center">LOGO</th>
												<th width="100px" class="text-center">NAMA</th>
												<th width="100px" class="text-center">USERNAME</th>
												<th width="80px" class="text-center">PASSWORD</th>
												<th width="80px" class="text-center">AKSES</th>
												<th width="200px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										    <?php
										    $no=1;
										    foreach($read as $r){
										        $status="";
										        if($r->status=="adm"){$status="ADMIN";}
										        if($r->status=="ukm"){$status="UKM";}
												echo'
												<tr>
													<td width="50px" class="text-center">'.$no++.'</td>
													<td width="100px" class="text-center"><img src="'.base_url().'template/global_assets/images/logo/'.$r->logo.'" height="50px"></td>
													<td width="100px" class="text-left">'.$r->nama.'</td>
													<td width="100px" class="text-center">'.$r->username.'</td>
													<td width="100px" class="text-center">'.$r->password.'</td>
													<td width="100px" class="text-center">'.$status.'</td>
													<td width="50px" class="text-center">
														<button class="btn btn-success" onclick="return ubah(`'.$r->nama.'`,`'.$r->username.'`,`'.$r->password.'`,`'.$r->status.'`)">EDIT</button>
														<button class="btn btn-danger" onclick="return hapus(`'.$r->nama.'`,`'.$r->username.'`)">HAPUS</button>
													</td>
												</tr>
												';
												}
										    ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /traffic sources -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->

			<!-- Footer -->
			<?php $this->load->view('template/layout_2/footer.php')?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
	<script>
		//window.top.close();
        $('#datatable-basic').DataTable({
        	autoWidth: false,
        	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': '→', 'previous': '←' }
            }
        });
        function tambah(){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('INPUT KELAS');
            $('[name="nama"]').val("");
            $('[name="username"]').val("");
            $('[name="password"]').val("");
            $('[name="status"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/add_user');
            $('[name="nama"]').attr('required','');
            $('[name="username"]').attr('required','');
            $('[name="password"]').attr('required','');
            $('[name="status"]').attr('required','');
        }
        function ubah(nama,username,password,status){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('UPDATE KELAS');
            $('[name="nama"]').val(nama);
            $('[name="username"]').val(username);
            $('[name="password"]').val(password);
            $('[name="status"]').val(status);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/update_user/'+username);
            $('[name="nama"]').attr('required','');
            $('[name="username"]').attr('required','');
            $('[name="password"]').attr('required','');
            $('[name="status"]').attr('required','');
        }
        function hapus(nama,username){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('DELETE KELAS');
            $('#user').html(nama);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/delete_user/'+username);
            $('[name="nama"]').removeAttr('required');
            $('[name="username"]').removeAttr('required');
            $('[name="password"]').removeAttr('required');
            $('[name="status"]').removeAttr('required');
        }
	</script>
	<div id="myModal" class="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-lp3i-dark">
					<h5 class="modal-title">Basic modal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
			  </div>
				<form id="formId" action="" method="POST" enctype="multipart/form-data">
					<div class="modal-body input">
						<div class="form-group row">
							<label class="col-form-label col-lg-3">NAMA<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">USERNAME<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="username" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">PASSWORD<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="password" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">AKSES<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<select name="status" class="form-control select-search" required>
								    <option value="">PILIH</option>
								    <option value="ukm">UKM</option>
								    <option value="adm">ADMIN</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">LOGO<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="file" class="form-control" name="image">
							</div>
						</div>
					</div>
					<div class="modal-body hapus h5">
						Anda yakin ingin menghapus user <b id="user"></b>?
					</div>
					<div class="modal-footer bg-lp3i-dark">
						<button id="tutup" type="button" class="btn bg-grey" data-dismiss="modal">TUTUP</button>
						<button id="submit" type="submit" class="btn bg-lp3i">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
