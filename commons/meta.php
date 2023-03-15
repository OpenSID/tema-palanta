<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php $nama_desa = ucwords($this->setting->sebutan_desa) .' '.ucwords($desa['nama_desa']) ?>
<?php defined('NAMA_DESA') or define('NAMA_DESA', $nama_desa) ?>
<?php defined('THEME_NAME') or define('THEME_NAME', 'Palanta') ?>
<?php defined('THEME_VERSION') or define('THEME_VERSION', 'v1.0') ?>
<?php $desa_title =  ucwords($this->setting->sebutan_desa) . ' '. $desa['nama_desa'] . ' '. ucwords($this->setting->sebutan_kecamatan) . ' '. $desa['nama_kecamatan'] . ' '. ucwords($this->setting->sebutan_kabupaten) . ' '. $desa['nama_kabupaten']; ?>

<meta http-equiv="encoding" content="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name='viewport' content='width=device-width, initial-scale=1' />
<meta name='google' content='notranslate' />
<meta name='theme' content='Palanta' />
<meta name='designer' content='Dafris' />
<meta name='theme:designer' content='Dafris' />
<meta name='theme:version' content='<?= THEME_VERSION ?>' />
<meta name="keywords" content="<?= $this->setting->website_title . ' '.  $desa_title; ?>"/>
<meta property="og:site_name" content="<?=  $desa_title;?>"/>
<meta property="og:type" content="article"/>
<meta property="fb:app_id" content="147912828718">
<title>
<?php if ($single_artikel["judul"] == ""): ?>
	<?= $this->setting->website_title . ' '.  $desa_title; ?>
<?php else: ?>
	<?= $single_artikel["judul"].' - '.ucwords($this->setting->sebutan_desa) . ' ' . $desa['nama_desa']; ?>
<?php endif; ?>
</title>

<link rel="shortcut icon" href="<?= favico_desa() ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
<link rel='stylesheet' href="<?= base_url('assets/css/font-awesome.min.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/leaflet.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/jquery.fancybox.min.css"); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/style-min.css"); ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/mapbox-gl.css'); ?>"/>
<link rel="stylesheet" href="<?= base_url('assets/css/peta.css'); ?>">
<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/dataTables.bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= base_url("$this->theme_folder/$this->theme/assets/css/screen-min.css"); ?>">

<?php if(isset($single_artikel)): ?>
	<meta property="og:title" content="<?= htmlspecialchars($single_artikel["judul"]); ?>"/>
	<meta property="og:url" content="<?= site_url('artikel/'.buat_slug($single_artikel))?>"/>
	<meta property="og:image" content="<?= base_url(''); ?><?= LOKASI_FOTO_ARTIKEL?>sedang_<?= $single_artikel['gambar'];?>"/>
	<meta property="og:description" content="<?= potong_teks($single_artikel['isi'], 300)?> ..."/>
<?php else: ?>
	<meta property="og:title" content="<?= $desa_title; ?>"/>
	<meta property="og:url" content="<?= site_url() ?>"/>
	<meta property="og:description" content="<?= $this->setting->website_title . ' '.  $desa_title; ?>"/>
<?php endif; ?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ if (window.scrollY == 0) window.scrollTo(0,1); } </script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.min.js'); ?>"></script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.cycle2.min.js'); ?>"></script>
<script language='javascript' src="<?= base_url('assets/front/js/jquery.cycle2.carousel.js'); ?>"></script>
<script language='javascript' src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/flickity.js"); ?>"></script>
<script src="<?= base_url('assets/js/leaflet.js'); ?>"></script>
<script src="<?= base_url('assets/front/js/layout.js'); ?>"></script>
<script src="<?= base_url('assets/front/js/jquery.colorbox.js'); ?>"></script>
<script src="<?= base_url('assets/js/leaflet-providers.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts-3d.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/exporting.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/highcharts-more.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/sankey.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/organization.js'); ?>"></script>
<script src="<?= base_url('assets/js/highcharts/accessibility.js'); ?>"></script>
<script src="<?= base_url('assets/js/mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('assets/js/leaflet-mapbox-gl.js'); ?>"></script>
<script src="<?= base_url('assets/js/peta.js'); ?>"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
<?php $this->load->view('global/validasi_form', ['web_ui' => true]); ?>
<script type="text/javascript">
	var BASE_URL = "<?= base_url(); ?>";
</script>
<script src="<?= base_url("$this->theme_folder/$this->theme/assets/js/jquery.fancybox.min.js"); ?>"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=731690645328652&autoLogAppEvents=1"></script>
<?php $this->load->view('head_tags_front') ?>
