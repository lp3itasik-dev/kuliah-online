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
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; Template Sertifikat</h5>
							</div>
							<div class="row">
							    <div class="col-lg-6 pl-4 pr-4">
							        <image src="<?= base_url().'/template/global_assets/images/sertifikat/'.$sertifikat ?>" width="100%" class="rounded">
							    </div>
							    <div class="col-lg-6 pl-4 pr-4">
							        <form action="<?= base_url()?>adm/update_sertifikat/<?= $id.'/'.$jenis ?>" method="post" enctype="multipart/form-data">
    							        <div class="form-group row">
                							<label class="col-form-label col-lg-3">TEMPLATE<span class="float-right">:</span></label>
                							<div class="col-lg-9">
                								<input type="file" class="form-control" name="image">
                							</div>
                						</div>
                						
                						<div class="form-group row">
                							<label class="col-form-label col-lg-12">Setting Nomor Sertifikat<span class="float-right">:</span></label>
                							<label class="col-form-label col-lg-2">Format<span class="float-right">:</span></label>
                							<div class="col-lg-6">
                								<input type="text" class="form-control" name="format_nomor" value="<?= $formatnomor ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Nomor Awal<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="text" class="form-control" name="awal_nomor" value="<?= $awalnomor ?>" required>
                							</div>
                						</div>
                						<div class="form-group row">
                							<label class="col-form-label col-lg-12">Setting Text Nama<span class="float-right">:</span></label>
                							<label class="col-form-label col-lg-2">Ukuran Teks<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="size" value="<?= $size ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Posisi Teks<span class="float-right">:</span></label>
                							<div class="col-lg-6">
                								<select name="posisi" class="form-control select-search" required>
                								    <option value="center" <?php if($posisi=="center"){echo 'selected';} ?>>Tengah</option>
                								    <option value="right" <?php if($posisi=="right"){echo 'selected';} ?>>Kanan</option>
                								    <option value="left" <?php if($posisi=="left"){echo 'selected';} ?>>Kiri</option>
                								</select>
                							</div>
                						</div>
                						<div class="form-group row">
                							<label class="col-form-label col-lg-2">Margin Top<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-top" value="<?= $margintop ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Left<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-left" value="<?= $marginleft ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Right<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-right" value="<?= $marginright ?>" required>
                							</div>
                						</div>
                						
                						
                						<div class="form-group row">
                							<label class="col-form-label col-lg-12">Setting Text Nomor Sertifikat<span class="float-right">:</span></label>
                							<label class="col-form-label col-lg-2">Ukuran Teks<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="size2" value="<?= $size2 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Posisi Teks<span class="float-right">:</span></label>
                							<div class="col-lg-6">
                								<select name="posisi2" class="form-control select-search" required>
                								    <option value="center" <?php if($posisi2=="center"){echo 'selected';} ?>>Tengah</option>
                								    <option value="right" <?php if($posisi2=="right"){echo 'selected';} ?>>Kanan</option>
                								    <option value="left" <?php if($posisi2=="left"){echo 'selected';} ?>>Kiri</option>
                								</select>
                							</div>
                						</div>
                						<div class="form-group row">
                							<label class="col-form-label col-lg-2">Margin Top<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-top2" value="<?= $margintop2 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Left<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-left2" value="<?= $marginleft2 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Right<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-right2" value="<?= $marginright2 ?>" required>
                							</div>
                						</div>
                						
                						
                						<div class="form-group row">
                							<label class="col-form-label col-lg-12">Setting QR<span class="float-right">:</span></label>
                							<label class="col-form-label col-lg-2">Ukuran QR<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="size3" value="<?= $size3 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Posisi QR<span class="float-right">:</span></label>
                							<div class="col-lg-6">
                								<select name="posisi3" class="form-control select-search" required>
                								    <option value="center" <?php if($posisi3=="center"){echo 'selected';} ?>>Tengah</option>
                								    <option value="right" <?php if($posisi3=="right"){echo 'selected';} ?>>Kanan</option>
                								    <option value="left" <?php if($posisi3=="left"){echo 'selected';} ?>>Kiri</option>
                								</select>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Top<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-top3" value="<?= $margintop3 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Left<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-left3" value="<?= $marginleft3 ?>" required>
                							</div>
                							<label class="col-form-label col-lg-2">Margin Right<span class="float-right">:</span></label>
                							<div class="col-lg-2">
                								<input type="number" class="form-control" name="margin-right3" value="<?= $marginright3 ?>" required>
                							</div>
                    					</div>
                    						<button id="submit" type="submit" class="btn bg-lp3i float-right">Update</button>
            						</form>
							    </div>
							</div>
							<div class="card-header">
								<h5 class="card-title"><i class="icon-calendar2"></i> &nbsp; Daftar Peserta</h5>
								<?php if($jenis%2==0 or $jenis==3){ ?>
								    <h5 class="card-title">Link Presensi Peserta : <a href="<?= base_url()?>presensi/<?= $id ?>"><?= base_url()?>presensi/<?= $id ?></a></h5>
							    <?php } ?>
							</div>
							<div class="card-body">
							  <div class="table-responsive">
									<table class="table table-framed" id="datatable-basic">
										<thead class="bg-lp3i-dark">
											<tr>
												<th width="30px" class="text-center">NO</th>
												<th width="100px" class="text-center">NAMA</th>
												<?php if($jenis=="5" || $jenis=="6"){ ?>
												<th width="50px" class="text-center">KELAS</th>
												<?php } if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
												<th width="100px" class="text-center">ALAMAT</th>
												<?php } ?>
												<th width="100px" class="text-center">NO TELEPHONE</th>
												<th width="100px" class="text-center">EMAIL</th>
												<th width="50px" class="text-center">WAKTU</th>
												<th width="200px" class="text-center">AKSI</th>
											</tr>
										</thead>
										<tbody>
										    <?php
										    $no=1;
										    foreach($read as $r){
										        $bg="bg-danger";
										        if($r->waktu){ $bg="bg-success"; }
										        $link="-";
										        if($jenis%2==0 or $jenis==3){
										            $link=base_url().$r->id_kegiatan."/".$r->id_peserta;
										        }
										    ?>
												<tr>
													<td align="center"><?= $no++ ?></td>
													<td align="left"><?= strtoupper($r->nama) ?></td>
													<?php if($jenis=="5"){ ?>
													<td align="center"><?= $r->kelas ?></td>
													<?php } ?>
													<?php if($jenis=="6"){ ?>
													<td align="center"><?= $r->instansi ?></td>
													<?php } ?>
													<?php if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
													<td align="center"><?= $r->alamat ?></td>
													<?php } ?>
													<td align="center"><?= $r->no_tlp ?></td>
													<td align="center"><?= $r->email ?></td>
													<td align="center" class="<?= $bg?>"><?php if($r->waktu){ echo date('H:i',strtotime($r->waktu)); } ?></td>
													<td width="50px" class="text-center">
													    <?php if($jenis%2==0 or $jenis==3){ ?>
														<a class="btn bg-lp3i" href="<?= base_url() ?>adm/cetak_sertifikat/<?= $r->id_kegiatan.'/'.$r->id_peserta ?>" target="_blank">CETAK SERTIFIKAT</a>
														<?php }else{ ?>
														<a class="btn bg-lp3i" href="<?= base_url() ?>adm/cetak_sertifikat/<?= $r->id.'/'.$r->id_presensi ?>" target="_blank">CETAK SERTIFIKAT</a>
														<?php } ?>
													</td>
												</tr>
												<?php } ?>
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
