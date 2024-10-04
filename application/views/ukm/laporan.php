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
	function hari($tanggal){
	    switch (date('w',strtotime($tanggal))) {
		  case 0:
			$hari="Minggu";
			break;
		  case 1:
			$hari="Senin";
			break;
		  case 2:
			$hari="Selasa";
			break;
		  case 3:
			$hari="Rabu";
			break;
		  case 4:
			$hari="Kamis";
			break;
		  case 5:
			$hari="Jumat";
			break;
		  case 6:
			$hari="Sabtu";
			break;
	    }
	    return $hari;
	}
?>
<body style="background-color: #fff;">
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
																				<td width="80px" align="center" valign="top">
																				    <img src="<?= base_url() ?>template/global_assets/images/logo-politeknik-5.png" border="0" height="60px">
																				</td>
																				<td align="center">
																					<b>
																						<font style="font-size: 12pt" color="#000000">
    																						DAFTAR HADIR BADAN EKSEKUTIF MAHASISWA<br>
                                                                                            LEMBAGA PENDIDIKAN DAN PENGEMBANGAN PROFESI INDONESIA</br>
                                                                                            CABANG KOTA TASIKMALAYA
                                                                                        </font>
																						<br>
																					</b>
																					<font style="font-size: 10pt" color="#000000">
																						Jalan Ir. H. Djuanda Bypass No. 106 KM 2 Rancabango, Kota Tasikmalaya, Telp (0265) 31176
																					</font>
																				</td>
																				<td width="80px" align="center" valign="top">
																					<img src="<?= base_url() ?>template/global_assets/images/logo-politeknik-5.png" border="0" height="60px">
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
											<td style="border-top:1px solid #000;" height="13">
											</td>
										</tr>
										<tr>
											<td bordercolor="#808080" height="13">
												<table cellspacing="0" cellpadding="3px" border="0">
													<tbody>
														<tr>
															<td width="100px">
																<font style="font-size: 11pt" face="Arial">
																	<b>Hari/Tanggal</b>
																</font>
															</td>
															<td width="3px">
																<font style="font-size: 11pt" face="Arial">
																    <b>:</b>
																</font>
															</td>
															<td width="150px">
																<font style="font-size: 11pt" face="Arial">
																	<b><?= hari($tanggal).' / '.tanggal($tanggal) ?></b>
																</font>
															</td>
														</tr>
														<tr>
															<td width="100px">
																<font style="font-size: 11pt" face="Arial">
																	<b>Tempat</b>
																</font>
															</td>
															<td width="3px">
																<font style="font-size: 11pt" face="Arial">
																    <b>:</b>
																</font>
															</td>
															<td width="150px">
																<font style="font-size: 11pt" face="Arial">
																	<b><?= $tempat ?></b>
																</font>
															</td>
														</tr>
														<tr>
															<td width="100px">
																<font style="font-size: 11pt" face="Arial">
																	<b>Perihal</b>
																</font>
															</td>
															<td width="3px">
																<font style="font-size: 11pt" face="Arial">
																    <b>:</b>
																</font>
															</td>
															<td width="150px">
																<font style="font-size: 11pt" face="Arial">
																	<b><?= $perihal ?></b>
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
											<?php if($jenis!="7"){$width='100%';$color="#FFFFFF";$bg="#666666";$size='9pt';$nomor="NO";$nama="NAMA";$height="0px";}else{$width='100%';$color="#000";$bg="#fff";$size='12pt';$nomor="No";$nama="Nama";$height="40px";}?>
												<table style="border-collapse: collapse" cellspacing="0" cellpadding="4px" bordercolor="#000000" border="1" width="<?= $width ?>">
													<thead>
														<tr height="<?= $height?>">
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="1%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b><?= $nomor ?></b></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="2%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>NIM</b></font></td>
															<?php } ?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="4%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b><?= $nama ?></b></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="2%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>KELAS</b></font></td>
															<?php } ?>
															<?php if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="8%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>ALAMAT</b></font></td>
															<?php } ?>
															<?php if($jenis!="7"){?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="3%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>NO TELEPHONE</b></font></td>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="3%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>EMAIL</b></font></td>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="1%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>WAKTU</b></font></td>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="3%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>TANDA TANGAN</b></font></td>
															<?php }else{ ?>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="3%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>Kelas</b></font></td>
															<td bgcolor="<?= $bg ?>" align="center" height="25" width="3%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>Jabatan</b></font></td>
															<td bgcolor="<?= $bg ?>" align="center" height="25" colspan="2" width="1%"><font style="font-size: <?= $size ?>" face="Arial" color="<?= $color ?>"><b>TANDA TANGAN</b></font></td>
															<?php } ?>
														</tr>
													</thead>
													<tbody>
														<?php $no=1; foreach($read as $r){ ?>
														<?php if($no%2==0){?>
														<td align="center" height="50px" rowspan="2">
														    <font style="font-size: <?= $size ?>" face="Arial" color="#000000">
														        <div style="float:left;position:absolute;"><?= $no ?></div>
															    <?php if($r->ttd){ ?>
																<img src="data:<?= $r->ttd ?>" height="40px">
																<?php } ?>
															</font>
														</td>
														</tr>
														<?php }else{ ?>
														</tr>
														<?php } ?>
														<tr>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $no++ ?></font></td>
															<?php if($jenis=="5" || $jenis=="6"){ ?>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->nim ?></font></td>
															<?php } ?>
															<td align="left"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= ucwords($r->nama) ?></font></td>
															<?php if($jenis=="5"){ ?>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->kelas ?></font></td>
															<?php } ?>
															<?php if($jenis=="6" || $jenis=="5"){ ?>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->instansi ?></font></td>
															<?php } ?>
															<?php if($jenis=="2" || $jenis=="5" || $jenis=="6"){ ?>
															<td align="left"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->alamat ?></font></td>
															<?php } ?>
															<?php if($jenis!="7"){?>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->no_tlp ?></font></td>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->email ?></font></td>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?php if($r->waktu){ echo date('H:i',strtotime($r->waktu)); } ?></font></td>
															<td align="center" height="50px"><font style="font-size: <?= $size ?>" face="Arial" color="#000000">
															    <?php if($r->ttd){ ?>
																<img src="data:<?= $r->ttd ?>" height="50px">
																<?php } ?>
															</font></td>
															<?php }else{ ?>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= $r->kelas ?></font></td>
															<td align="center"><font style="font-size: <?= $size ?>" face="Arial" color="#000000"><?= ucwords(strtolower($r->jabatan)) ?></font></td>
															<?php if(($no-1)%2==1){?>
    															<td align="center" height="50px" rowspan="2"><font style="font-size: <?= $size ?>" face="Arial" color="#000000">
    															    <div style="float:left;position:absolute;"><?= $no-1 ?></div>
    															    <?php if($r->ttd){ ?>
    																<img src="data:<?= $r->ttd ?>" height="40px">
    																<?php } ?>
    															</font></td>
															<?php } ?>
															<?php } ?>
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
