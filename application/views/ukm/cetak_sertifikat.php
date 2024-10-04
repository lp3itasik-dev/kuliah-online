<html><head>
	<title>LP3I Tasikmalaya - Cetak Sertifikat</title>
	<link rel="icon" href="<?= base_url() ?>template/global_assets/images/poltek.png" type="image/x-icon">
	<style>
	.template{
	    width: 100%;
	}
	@page {
        margin:0px;
    }
    .nama{
        font-size:<?= $size ?>px;
        position: absolute;
        <?php 
        if($posisi=="center"){echo 'left: 50%; transform: translate(-50%, -50%);top: '.($margintop+8).'px;'; }
        if($posisi=="left"){echo 'top: '.$margintop.'px; left: '.$marginleft.'px;'; }
        if($posisi=="right"){echo 'top: '.$margintop.'px; right: '.$marginright.'px;'; }
        ?>
    }
    .nomor{
        font-size:<?= $size2 ?>px;
        position: absolute;
        <?php 
        if($posisi2=="center"){echo 'left: 50%; transform: translate(-50%, -50%);top: '.($margintop2+8).'px;'; }
        if($posisi2=="left"){echo 'top: '.$margintop2.'px; left: '.$marginleft2.'px;'; }
        if($posisi2=="right"){echo 'top: '.$margintop2.'px; right: '.$marginright2.'px;'; }
        ?>
    }
    .qr{
        width:<?= $size3 ?>px;
        position: absolute;
        <?php 
        if($posisi3=="center"){echo 'left: 50%; transform: translate(-50%, -50%);top: '.($margintop3+8).'px;'; }
        if($posisi3=="left"){echo 'top: '.$margintop3.'px; left: '.$marginleft3.'px;'; }
        if($posisi3=="right"){echo 'top: '.$margintop3.'px; right: '.$marginright3.'px;'; }
        ?>
    }
	</style>
</head><body>
    <img src="./template/global_assets/images/sertifikat/<?= $sertifikat ?>" class="template">
	</div>
    <div class="nama">
	<?= $nama ?>
	</div>
    <div class="nomor">
	<?= $nomorsertifikat ?>
	</div>
	<img src="./template/global_assets/images/qrcode/<?= $idkegiatan.'-'.$idpeserta ?>.png" class="qr">
</body></html>
