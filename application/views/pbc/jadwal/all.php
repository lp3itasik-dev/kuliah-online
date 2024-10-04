<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>LP3I Tasikmalaya - Kuliah Online</title>
	<?php $this->load->view('template/layout_2/link.php')?>
	<style>
	.form-control{
		border:2px solid #ddd;
		border-top-color:#ddd!important;
		border-radius: 5px;
		padding: 5px;
	}
	.form-control:not(.border-bottom-1):not(.border-bottom-2):not(.border-bottom-3):focus {
    border-color: #0a5387;
		border-top-color:#0a5387!important;
	}
	</style>
	<script src="<?= base_url() ?>template/global_assets/js/plugins/jSignature-master/libs/modernizr.js"></script>
	<style type="text/css">
		#signatureparent {
			color:#0a5387;
			background-color:#fff;
			/*max-width:600px;*/
		}

		/*This is the div within which the signature canvas is fitted*/
		#signature {
			border:2px solid #ddd;
			border-radius: 10px;
			background-color:fff;
		}
		.jSignature{
			height: 300px!important;
			width: 100%!important;
		}
		/* Drawing the 'gripper' for touch-enabled devices */
		html.touch #scrollgrabber {
			float:right;
			width:4%;
			margin-right:2%;
			background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
		}
		html.borderradius #scrollgrabber {
			border-radius: 1em;
		}

	</style>
</head>

<body>

	<!-- Main navbar -->
	<?php $this->load->view('template/layout_2/navbar2.php')?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content container">

				<!-- Main charts -->
				<div class="row">
					<div class="col-xl-12">

						<!-- Traffic sources -->
						<div class="card">
							<div class="card-header text-center row">
								<div class="col-12 mb-2 mt-4">
									<img style="height:7rem;border-radius:5px" src="<?= base_url() ?>template/global_assets/images/logo-politeknik-1.png" alt="" class="bg-lp3i-dark p-1 pt-2 pb-2">
								</div>
								<div class="col-12">
									<h4 class="card-title">
										KULIAH ONLINE<br>
										LP3I TASIKMALAYA
									</h4>
									<i>Jln. Ir. H. Djuanda No. 106 KM 2 Tasikmalaya</i>
								</div>
							</div>
							<hr class="mt-0"></hr>
							
						</div>
						<!-- /traffic sources -->

					</div>
					<?php foreach($pengajar as $r){ 
					?>
					<div class="col-xl-4">
					    <div class="card text-center">
					        <div class="card-header bg-lp3i-dark">
					            <h4 class="card-title"><?= strtoupper($r->nama) ?></h4>
					        </div>
					        <?php 
					        $select = $this->db->select('*');
                            $select = $this->db->join('pengajar','pengajar.id=jadwal.id_pengajar');
                            $select = $this->db->where('hari',$r->hari);
                            $select = $this->db->where('pengajar.id',$r->id_pengajar);
                            $select = $this->db->order_by('nama','ASC');
                            $read = $this->m->Get_All('jadwal',$select);
					        foreach($read as $p){ ?>
					        <div class="card-body pb-1">
					            <h5 class="m-0"><?= $p->hari ?></h5>
					            <h5 class="m-0"><?= $p->kelas ?></h5>
					            <h5 class="m-0"><?= $p->matakuliah ?></h5>
					            <h5 class="m-0"><?= $p->jam ?></h5>
					        </div>
					        <?php } ?>
					        <div class="card-footer">
					            <a href="<?= $r->link ?>" target="_blank" class="btn bg-lp3i">OPEN LINK</a>
					        </div>
					    </div>
					</div>
					<?php } if(count($pengajar)<=0){ ?>
					
					<div class="col-12">
					    <div class="card bg-lp3i-dark text-light text-center p-3 h5">
					    TIDAK ADA KULIAH ONLINE UNTUK HARI INI
					    </div>
					</div>
					<?php } ?>
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
	
</body>
</html>
