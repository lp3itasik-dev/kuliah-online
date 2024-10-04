<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LP3I Tasikmalaya - Karyawan</title>
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Karyawan</h4>
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; Daftar Karyawan</h5>
								<button class="btn bg-lp3i-dark" onclick="return tambah()">TAMBAH</button>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<table class="table table-framed" id="datatable-basic">
										<thead class="bg-lp3i-dark">
											<tr>
												<th width="30px" class="text-center">NO</th>
												<th width="100px" class="text-center">NAMA</th>
												<th width="80px" class="text-center">ALAMAT</th>
												<th width="50px" class="text-center">NO TELEPHONE</th>
												<th width="100px" class="text-center">EMAIL</th>
												<th width="100px" class="text-center">DIVISI</th>
												<th width="200px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										    <?php
										    $no=1;
										    foreach($read as $r){
										        $divisi="";
										        if($r->divisi=="BM"){$divisi="Kepala Kampus";}
										        if($r->divisi=="FHRD"){$divisi="Finance & Human Resources Development";}
										        if($r->divisi=="PDD"){$divisi="Pendidikan";}
										        if($r->divisi=="ICT"){$divisi="Information and Communication Technology";}
										        if($r->divisi=="MKT"){$divisi="Marketing";}
										        if($r->divisi=="CNP"){$divisi="";}
													echo'
													<tr>
														<td width="50px" class="text-center">'.$no++.'</td>
														<td width="100px" class="text-left">'.$r->nama.'</td>
														<td width="100px" class="text-center">'.$r->alamat.'</td>
														<td width="100px" class="text-center">'.$r->no_tlp.'</td>
														<td width="100px" class="text-center">'.$r->email.'</td>
														<td width="100px" class="text-center">'.$divisi.'</td>
														<td width="50px" class="text-center">
															<button class="btn btn-success" onclick="return ubah(`'.$r->id.'`,`'.$r->nama.'`,`'.$r->alamat.'`,`'.$r->no_tlp.'`,`'.$r->email.'`,`'.$r->divisi.'`,`'.$divisi.'`)">EDIT</button>
															<button class="btn btn-danger" onclick="return hapus(`'.$r->id.'`,`'.$r->nama.'`)">HAPUS</button>
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
			$('.modal-title').html('INPUT KEGIATAN');
            $('[name="nama"]').val("");
            $('[name="alamat"]').val("");
            $('[name="no_tlp"]').val("");
            $('[name="email"]').val("");
            $('[name="divisi"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/add_karyawan');
            $('[name="nama"]').attr('required','');
            $('[name="alamat"]').attr('required','');
            $('[name="no_tlp"]').attr('required','');
            $('[name="email"]').attr('required','');
            $('[name="divisi"]').attr('required','');
        }
        function ubah(id,nama,alamat,no_tlp,email,divisi,divisiname){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('UPDATE KEGIATAN');
            $('[name="nama"]').val(nama);
            $('[name="alamat"]').val(alamat);
            $('[name="no_tlp"]').val(no_tlp);
            $('[name="email"]').val(email);
            $('[name="divisi"]').val(divisi);
            $('.select2-selection__rendered').html(divisiname);
            
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/update_karyawan/'+id);
            $('[name="nama"]').attr('required','');
            $('[name="alamat"]').attr('required','');
            $('[name="no_tlp"]').attr('required','');
            $('[name="email"]').attr('required','');
            $('[name="divisi"]').attr('required','');
        }
        function hapus(id,nama){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('DELETE KEGIATAN');
            $('#karyawan').html(nama);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>adm/delete_karyawan/'+id);
            $('[name="nama"]').removeAttr('required');
            $('[name="alamat"]').removeAttr('required');
            $('[name="no_tlp"]').removeAttr('required');
            $('[name="email"]').removeAttr('required');
            $('[name="divisi"]').removeAttr('required');
        }
        function jenis_pendaftaran(){
            var jenis = $('[name="jenis"]').val();
            if((jenis%2) == 0){
                $('#tanggal_pendaftaran').removeClass('d-none');
            }else{
                $('#tanggal_pendaftaran').addClass('d-none');
            }
        }
	</script>
	<div id="myModal" class="modal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-lp3i-dark">
					<h5 class="modal-title">Basic modal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
			  </div>
				<form id="formId" action="" method="POST">
					<div class="modal-body input">
						<div class="form-group row">
							<label class="col-form-label col-lg-3">NAMA<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">ALAMAT<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="alamat" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">NO TELEPHONE<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="no_tlp" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">EMAIL<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="email" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">DIVISI<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<select name="divisi" class="form-control select-search" required>
								    <option value="">PILIH</option>
								    <option value="BM">Kepala Kampus</option>
								    <option value="FHRD">Finance & Human Resources Development</option>
								    <option value="PDD">Pendidikan</option>
								    <option value="ICT">Information and Communication Technology</option>
								    <option value="MKT">Marketing</option>
								    <option value="CNP">Corporate & Placement</option>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-body hapus h5">
						Anda yakin ingin menghapus presensi kegiatan <b id="karyawan"></b>?
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
