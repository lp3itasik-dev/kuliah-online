<html><head>
	<title>LP3I Tasikmalaya - Cetak Sertifikat</title>
	<link rel="icon" href="<?= base_url() ?>template/global_assets/images/poltek.png" type="image/x-icon">
	<style>
	body{
        background: rgb(204,204,204); 
    }
    page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
    }
    page[size="A4"] {  
        width: 21cm;
        height: 29.7cm; 
    }
    page[size="A4"][layout="landscape"] {
        background-image:url('<?= base_url() ?>template/global_assets/images/sertifikat/<?= $sertifikat ?>');
        background-repeat: no-repeat;
        background-position: center;
        background-size: contain;
        width: 29.7cm;
        height: 21cm;  
    }
    .text{
        width:100%;
        text-align:<?= $posisi ?>;
        padding:<?= $margintop ?>px <?= $marginright ?>px <?= $marginbottom ?>px <?= $marginleft ?>px;
        font-size:<?= $size ?>px;
    }
	</style>
</head><body><page size="A4" layout="landscape">
    <div class="text">
	<?= $nama ?>
	</div></page>
</body></html>
