<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>LP3I Tasikmalaya - Kegiatan</title>
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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Kegiatan</h4>
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; DAFTAR KEGIATAN</h5>
								<button class="btn bg-lp3i-dark" onclick="return tambah()">TAMBAH</button>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<table class="table table-framed" id="datatable-basic">
										<thead class="bg-lp3i-dark">
											<tr>
												<th width="30px" class="text-center">NO</th>
												<th width="100px" class="text-center">NAMA KEGIATAN</th>
												<th width="80px" class="text-center">TANGGAL</th>
												<th width="50px" class="text-center">WAKTU</th>
												<th width="100px" class="text-center">STATUS</th>
												<th width="100px" class="text-center">JENIS</th>
												<th width="50px" class="text-center">LINK PRESENSI</th>
												<th width="200px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										    <?php
										    $no=1;
										    foreach($read as $r){
								                    $jenis="";
										            $bg="danger";
										            $sts="EXPIRED";
										            if(date('Y-m-d',strtotime($r->tanggal))==date('Y-m-d')){
										                $bg="success";
										                $sts="NOW";
										            }
										            if(date('Y-m-d',strtotime($r->tanggal))>date('Y-m-d')){
										                $bg="info";
										                $sts="ONGOING";
										            }
										            if($r->jenis=="1"){$jenis="Presensi (External)";}
										            if($r->jenis=="3"){$jenis="Presensi (Karyawan)";}
										            if($r->jenis=="5"){$jenis="Presensi (Mahasiswa)";}
										            if($r->jenis=="7"){$jenis="Presensi (UKM)";}
										            if($r->jenis=="2"){$jenis="Pendaftaran dan Presensi (External)";}
										            if($r->jenis=="4"){$jenis="Pendaftaran dan Presensi (Karyawan)";}
										            if($r->jenis=="6"){$jenis="Pendaftaran dan Presensi (Mahasiswa)";}
										            
										            $link="-";
    										        if($r->jenis%2==0 or $r->jenis==3){
    										            $link=base_url().'pendaftaran/'.$r->id;
    										        }else{
    										            $link=base_url().$r->id;
    										        }
													echo'
													<tr>
														<td width="50px" class="text-center">'.$no++.'</td>
														<td width="100px" class="text-left">'.$r->kegiatan.'</td>
														<td width="100px" class="text-center">'.date('d F Y',strtotime($r->tanggal)).'</td>
														<td width="100px" class="text-center">'.date('H.i',strtotime($r->dari))."-".date('H.i',strtotime($r->sampai)).'</td>
														<td width="100px" class="text-center"><span class="btn btn-'.$bg.' p-2">'.$sts.'</span></td>
														<td width="100px" class="text-center">'.$jenis.'</td>
														<td width="100px" class="text-center"><a href="'.$link.'" target="_blank">'.$link.'</a></td>
														<td width="50px" class="text-center">
															<button class="btn btn-success" onclick="return ubah(`'.$r->id.'`,`'.$r->kegiatan.'`,`'.$r->tanggal.'`,`'.$r->dari.'`,`'.$r->sampai.'`,`'.$r->jenis.'`,`'.$r->tanggal_daftar.'`,`'.$jenis.'`,`'.$r->perihal.'`,`'.$r->tempat.'`)">EDIT</button>
															<button class="btn btn-danger" onclick="return hapus(`'.$r->id.'`,`'.$r->kegiatan.'`)">HAPUS</button>
															<a class="btn bg-lp3i" href="'.base_url().'ukm/laporan/'.$r->id.'" target="_blank">CETAK</a>
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
            $('[name="tanggal"]').val('<?= date('Y-m-d')?>');
            $('[name="dari"]').val("08:00");
            $('[name="sampai"]').val("11:40");
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/add_kegiatan');
            $('[name="nama"]').attr('required','');
            $('[name="tanggal"]').attr('required','');
            $('[name="dari"]').attr('required','');
            $('[name="sampai"]').attr('required','');
            $('[name="jenis"]').attr('required','');
            $('[name="tanggal_daftar"]').attr('required','');
        }
        function ubah(id,nama,tanggal,dari,sampai,jenis,tanggal_daftar,jenisname,perihal,tempat){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('UPDATE KEGIATAN');
            $('[name="nama"]').val(nama);
            $('[name="tanggal"]').val(tanggal);
            $('[name="dari"]').val(dari);
            $('[name="sampai"]').val(sampai);
            $('[name="jenis"]').val(jenis);
            $('.select2-selection__rendered').html(jenisname);
            if((jenis%2) == 0){
                $('#tanggal_pendaftaran').removeClass('d-none');
            }else{
                $('#tanggal_pendaftaran').addClass('d-none');
            }
            if(jenis == 7){
                $('#perihal').removeClass('d-none');
                $('#tempat').removeClass('d-none');
            }else{
                $('#perihal').addClass('d-none');
                $('#tempat').addClass('d-none');
            }
            $('[name="tanggal_daftar"]').val(tanggal_daftar);
            $('[name="perihal"]').val(perihal);
            $('[name="tempat"]').val(tempat);
            $('#submit').html('SIMPAN');
            $('.hapus').addClass('d-none');
            $('.input').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/update_kegiatan/'+id);
            $('[name="nama"]').attr('required','');
            $('[name="tanggal"]').attr('required','');
            $('[name="dari"]').attr('required','');
            $('[name="sampai"]').attr('required','');
            $('[name="jenis"]').attr('required','');
            $('[name="tanggal_daftar"]').attr('required','');
        }
        function hapus(id,nama){
			$('#myModal').modal({backdrop: 'static', keyboard: false});
			$('.modal-title').html('DELETE KEGIATAN');
            $('#kegiatan').html(nama);
            $('#submit').html('HAPUS');
            $('.input').addClass('d-none');
            $('.hapus').removeClass('d-none');
            $('#formId').attr('action', '<?= base_url() ?>ukm/delete_kegiatan/'+id);
            $('[name="nama"]').removeAttr('required');
            $('[name="tanggal"]').removeAttr('required');
            $('[name="dari"]').removeAttr('required');
            $('[name="sampai"]').removeAttr('required');
            $('[name="jenis"]').removeAttr('required');
            $('[name="tanggal_daftar"]').removeAttr('required');
        }
        function jenis_pendaftaran(){
            var jenis = $('[name="jenis"]').val();
            if((jenis%2) == 0){
                $('#tanggal_pendaftaran').removeClass('d-none');
            }else{
                $('#tanggal_pendaftaran').addClass('d-none');
            }
            if(jenis == 7){
                $('#perihal').removeClass('d-none');
                $('#tempat').removeClass('d-none');
            }else{
                $('#perihal').addClass('d-none');
                $('#tempat').addClass('d-none');
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
							<label class="col-form-label col-lg-3">NAMA KEGIATAN<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">TANGGAL KEGIATAN<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d')?>" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">DARI<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="time" class="form-control" name="dari" value="08:00" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">SAMPAI<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="time" class="form-control" name="sampai" value="11:40" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-form-label col-lg-3">JENIS KEGIATAN<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<select name="jenis" onchange="return jenis_pendaftaran()" class="form-control select-search" required>
								    <option value="1">Presensi (External)</option>
								    <option value="5">Presensi (Mahasiswa)</option>
								    <option value="7">Presensi (UKM)</option>
								    <option value="2">Pendaftaran dan Presensi (External)</option>
								    <option value="6">Pendaftaran dan Presensi (Mahasiswa)</option>
								</select>
							</div>
						</div>
						<div class="form-group row d-none" id="tanggal_pendaftaran">
							<label class="col-form-label col-lg-3">TANGGAL PENDAFTARAN<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="date" class="form-control" name="tanggal_daftar" value="<?= date('Y-m-d')?>" >
							</div>
						</div>
						<div class="form-group row d-none" id="tempat">
							<label class="col-form-label col-lg-3">TEMPAT<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="tempat">
							</div>
						</div>
						<div class="form-group row d-none" id="perihal">
							<label class="col-form-label col-lg-3">PERIHAL<span class="float-right">:</span></label>
							<div class="col-lg-9">
								<input type="text" class="form-control" name="perihal">
							</div>
						</div>
					</div>
					<div class="modal-body hapus h5">
						Anda yakin ingin menghapus presensi kegiatan <b id="kegiatan"></b>?
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
