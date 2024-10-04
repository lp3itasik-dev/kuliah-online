<html>
<head>
	<title>LP3I Tasikmalaya - Dashboard</title>
	<link rel="icon" href="<?= base_url() ?>template/global_assets/images/poltek.png" "="" type="image/x-icon">
	<link href="<?= base_url() ?>template/global_assets/css/laporan/style.css" rel="stylesheet" type="text/css">
	<style>
	</style>
</head>
<?php
	function tanggal($tanggal){
		switch (date('m',strtotime($tanggal))) {
		  case 1:
			$tanggal=date('d',strtotime($tanggal))." Januari ".date('Y',strtotime($tanggal));
			break;
		  case 2:
			$tanggal=date('d',strtotime($tanggal))." Februari ".date('Y',strtotime($tanggal));
			break;
		  case 3:
			$tanggal=date('d',strtotime($tanggal))." Maret ".date('Y',strtotime($tanggal));
			break;
		  case 4:
			$tanggal=date('d',strtotime($tanggal))." April ".date('Y',strtotime($tanggal));
			break;
		  case 5:
			$tanggal=date('d',strtotime($tanggal))." Mei ".date('Y',strtotime($tanggal));
			break;
		  case 6:
			$tanggal=date('d',strtotime($tanggal))." Juni ".date('Y',strtotime($tanggal));
			break;
		  case 7:
			$tanggal=date('d',strtotime($tanggal))." Juli ".date('Y',strtotime($tanggal));
			break;
		  case 8:
			$tanggal=date('d',strtotime($tanggal))." Agustus ".date('Y',strtotime($tanggal));
			break;
		  case 9:
			$tanggal=date('d',strtotime($tanggal))." September ".date('Y',strtotime($tanggal));
			break;
		  case 10:
			$tanggal=date('d',strtotime($tanggal))." Oktober ".date('Y',strtotime($tanggal));
			break;
		  case 11:
			$tanggal=date('d',strtotime($tanggal))." Nopember ".date('Y',strtotime($tanggal));
			break;
		  case 12:
			$tanggal=date('d',strtotime($tanggal))." Desember ".date('Y',strtotime($tanggal));
			break;
		}
		return $tanggal;
	}
?>
<body style="background-color: #fff">
	<div align="center">
		<table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="950">
			<tbody>
				<tr>
					<td style="padding: 30px">
						<div align="center">
							<p align="right">
								<table cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" height="133" border="0" width="100%">
									<tbody>
										<tr>
											<td style="text-align:left">
												<div align="left">
													<table cellspacing="0" cellpadding="0" height="74" border="0" width="850">
														<tbody>
															<tr>
																<td valign="top"></td>
															</tr>
															<tr>
																<td valign="top">
																	<table cellspacing="0" cellpadding="0" border="0" width="100%">
																		<tbody>
																			<tr>
																				<td width="80px">
																					<p align="left">
																						<img src="<?= base_url() ?>template/global_assets/images/logo-politeknik-5.png" border="0" height="60px">
																					</p>
																				</td>
																				<td align="left">
																					<b>
																						<font style="font-size: 12pt" color="#000000">LP3I</font>
																						<br>
																					</b>
																					<font size="3" color="#000000">TASIKMALAYA</font>
																					<font style="font-size: 11pt" color="#000000">
																						: Jl. Ir. Djuanda No. 106 Km. 2
																						Rancabango Kota
																						Tasikmalaya<br>
																						TAHUN AKADEMIK 2020/2021
																					</font>
																				</td>
																			</tr>
																			<tr>
																				<td>&nbsp;</td>
																				<td>&nbsp;</td>
																			</tr>
																		</tbody>
																	</table>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<font style="font-size: 11pt" face="Arial" color="#000000">
													<span style="font-weight: 700">
														LAPORAN PRESENSI KEGIATAN <?= strtoupper($kegiatan) ?>
													</span>
												</font>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13"></td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<table cellspacing="0" cellpadding="3px" border="0" width="100%">
													<tbody>
														<tr>
															<td width="150">
																<font style="font-size: 9pt" face="Arial">
																	TANGGAL : <?= tanggal($tanggal) ?>
																</font>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13"></td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<table style="border-collapse: collapse" cellspacing="0" cellpadding="4px" bordercolor="#000000" border="1" width="100%">
													<thead>
														<tr>
															<td bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NO</b></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="#666666" align="center" height="25" width="2%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NIM</b></font></td>
															<?php } ?>
															<td bgcolor="#666666" align="center" height="25" width="4%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NAMA</b></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="#666666" align="center" height="25" width="2%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>KELAS</b></font></td>
															<?php } ?>
															<?php if($jenis=="9"){ ?>
															<td bgcolor="#666666" align="center" height="25" width="2%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>ASAL KAMPUS</b></font></td>
															<?php } ?>
															<?php if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="#666666" align="center" height="25" width="8%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>ALAMAT</b></font></td>
															<?php } ?>
															<?php if($jenis!="9"){ ?>
															<td bgcolor="#666666" align="center" height="25" width="3%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>NO TELEPHONE</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="3%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>EMAIL</b></font></td>
															<?php } ?>
															<td bgcolor="#666666" align="center" height="25" width="1%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>WAKTU</b></font></td>
															<td bgcolor="#666666" align="center" height="25" width="3%"><font style="font-size: 9pt" face="Arial" color="#FFFFFF"><b>TANDA TANGAN</b></font></td>
														</tr>
													</thead>
													<tbody>
														<?php $no=1; foreach($read as $r){ ?>
														<tr>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $no++ ?></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->nim ?></font></td>
															<?php } ?>
															<td align="left"><font style="font-size: 8pt" face="Arial" color="#000000"><?= strtoupper($r->nama) ?></font></td>
															<?php if($jenis=="5"||$jenis=="9"){ ?>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->kelas ?></font></td>
															<?php } ?>
															<?php if($jenis!="9"){ ?>
															<?php if($jenis=="6" || $jenis=="5"){ ?>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->instansi ?></font></td>
															<?php } ?>
															<?php if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
															<td align="left"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->alamat ?></font></td>
															<?php } ?>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->no_tlp ?></font></td>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?= $r->email ?></font></td>
															<?php } ?>
															<td align="center"><font style="font-size: 8pt" face="Arial" color="#000000"><?php if($r->waktu){ echo date('H:i',strtotime($r->waktu)); } ?></font></td>
															<td align="center" height="50px"><font style="font-size: 8pt" face="Arial" color="#000000">
															    <?php if($r->ttd){ ?>
																<img src="data:<?= $r->ttd ?>" height="50px">
																<?php } ?>
															</font></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</td>
										</tr>
									</tbody>
								</table>
							</p>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
  </div>
</body>
</html>
