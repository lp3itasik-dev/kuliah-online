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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Anggota UKM</h4>
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; Daftar Anggota UKM</h5>
								<button class="btn bg-lp3i-dark" onclick="return tambah()">TAMBAH</button>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<table class="table table-framed" id="datatable-basic">
										<thead class="bg-lp3i-dark">
											<tr>
												<th width="30px" class="text-center">NO</th>
												<th width="100px" class="text-center">NAMA</th>
												<th width="80px" class="text-center">KELAS</th>
												<th width="50px" class="text-center">JABATAN</th>
												<th width="200px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										    <?php
										    $no=1;
										    foreach($read as $r){
													echo'
													<tr>
														<td width="50px" class="text-center">'.$no++.'</td>
														<td width="100px" class="text-left">'.$r->nama.'</td>
														<td width="100px" class="text-center">'.$r->kelas.'</td>
														<td width="100px" class="text-center">'.$r->jabatan.'</td>
														<td width="50px" class="text-center">
															<button class="btn btn-success" onclick="return ubah(`'.$r->id.'`,`'.$r->nama.'`,`'.$r->kelas.'`,`'.$r->jabatan.'`,`'.$r->id_jabatan.'`)">EDIT</button>
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
            $('[name="kelas"]').val("");
            $('[name="jabatan"]').val("");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/add_peserta_ukm');
            $('[name="nama"]').attr('required','');
            $('[name="kelas"]').attr('required','');
            $('[name="jabatan"]').attr('required','');
        }
        function ubah(id,nama,kelas,jabatan,id_jabatan){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('UPDATE KEGIATAN');
            $('[name="nama"]').val(nama);
            $('[id^="select2-kelas"]').html(kelas);
            $('[name="kelas"]').val(kelas);
            $('[id^="select2-jabatan"]').html(jabatan);
            $('[name="jabatan"]').val(id_jabatan);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/update_peserta_ukm/'+id);
            $('[name="nama"]').attr('required','');
            $('[name="kelas"]').attr('required','');
            $('[name="jabatan"]').attr('required','');
        }
        function hapus(id,nama){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('DELETE KEGIATAN');
            $('#peserta_ukm').html(nama);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/delete_peserta_ukm/'+id);
            $('[name="nama"]').removeAttr('required');
            $('[name="kelas"]').removeAttr('required');
            $('[name="jabatan"]').removeAttr('required');
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
							<label class="col-form-label col-lg-3">KELAS<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<select name="kelas" class="form-control select-search" required>
								    <option value="">PILIH</option>
								    <?php foreach($read_kelas as $rk){ ?>
									    <option value="<?= $rk->nama ?>"><?= $rk->nama ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">JABATAN<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<select name="jabatan" class="form-control select-search" required>
								    <option value="">PILIH</option>
								    <?php foreach($read_jabatan as $r ){ ?>
								    <option value="<?= $r->id ?>"><?= $r->nama ?></option>
								    <?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-body hapus h5">
						Anda yakin ingin menghapus anggota <b id="peserta_ukm"></b>?
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
