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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Sertifikat</h4>
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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; E-Sertifikat</h5>
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
										            if($r->jenis=="2"){$jenis="Pendaftaran dan Presensi (External)";}
										            if($r->jenis=="4"){$jenis="Pendaftaran dan Presensi (Karyawan)";}
										            if($r->jenis=="6"){$jenis="Pendaftaran dan Presensi (Mahasiswa)";}
													echo'
													<tr>
														<td width="50px" class="text-center">'.$no++.'</td>
														<td width="100px" class="text-left">'.$r->kegiatan.'</td>
														<td width="100px" class="text-center">'.date('d F Y',strtotime($r->tanggal)).'</td>
														<td width="100px" class="text-center">'.date('H.i',strtotime($r->dari))."-".date('H.i',strtotime($r->sampai)).'</td>
														<td width="100px" class="text-center"><span class="btn btn-'.$bg.' p-2">'.$sts.'</span></td>
														<td width="100px" class="text-center">'.$jenis.'</td>
														<td width="50px" class="text-center">
															<a class="btn bg-lp3i" href="'.base_url().'adm/peserta/'.$r->id.'">LIHAT PESERTA</a>
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
        
	</script>
</body>
</html>
