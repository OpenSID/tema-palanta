<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php $is_premium = preg_match('/premium/', ambilVersi()) ?>
<?php $nama_desa = ucwords($this->setting->sebutan_desa) .' '.ucwords($desa['nama_desa']) ?>

<?php defined('NAMA_DESA') || define('NAMA_DESA', $nama_desa) ?>
<?php defined('THEME_NAME') || define('THEME_NAME', 'Palanta') ?>
<?php defined('THEME_VERSION') || define('THEME_VERSION', 'v2408.0.0') ?>
<?php defined('IS_PREMIUM') || define('IS_PREMIUM', $is_premium) ?>
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
<link rel="stylesheet" href="<?= asset('bootstrap/css/bootstrap.min.css'); ?>">
<link rel='stylesheet' href="<?= asset('css/font-awesome.min.css'); ?>"/>
<link rel="stylesheet" href="<?= asset('css/leaflet.css'); ?>"/>
<link rel="stylesheet" href="<?= theme_asset("css/jquery.fancybox.min.css"); ?>">
<link rel="stylesheet" href="<?= theme_asset("css/style-min.css"); ?>">
<link rel="stylesheet" href="<?= asset('css/mapbox-gl.css'); ?>"/>
<link rel="stylesheet" href="<?= asset('css/peta.css'); ?>">
<link rel="stylesheet" href="<?= asset('bootstrap/css/dataTables.bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?= theme_asset("css/screen-min.css"); ?>">

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
<script language='javascript' src="<?= asset('front/js/jquery.min.js'); ?>"></script>
<script language='javascript' src="<?= asset('front/js/jquery.cycle2.min.js'); ?>"></script>
<script language='javascript' src="<?= asset('front/js/jquery.cycle2.carousel.js'); ?>"></script>
<script language='javascript' src="<?= asset('bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?= theme_asset("js/flickity.js"); ?>"></script>
<script src="<?= asset('js/leaflet.js'); ?>"></script>
<script src="<?= asset('front/js/layout.js'); ?>"></script>
<script src="<?= asset('front/js/jquery.colorbox.js'); ?>"></script>
<script src="<?= asset('js/leaflet-providers.js'); ?>"></script>
<script src="<?= asset('js/highcharts/highcharts.js'); ?>"></script>
<script src="<?= asset('js/highcharts/highcharts-3d.js'); ?>"></script>
<script src="<?= asset('js/highcharts/exporting.js'); ?>"></script>
<script src="<?= asset('js/highcharts/highcharts-more.js'); ?>"></script>
<script src="<?= asset('js/highcharts/sankey.js'); ?>"></script>
<script src="<?= asset('js/highcharts/organization.js'); ?>"></script>
<script src="<?= asset('js/highcharts/accessibility.js'); ?>"></script>
<script src="<?= asset('js/mapbox-gl.js'); ?>"></script>
<script src="<?= asset('js/leaflet-mapbox-gl.js'); ?>"></script>
<script src="<?= asset('js/peta.js'); ?>"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>
<?php $this->load->view('global/validasi_form', ['web_ui' => true]); ?>
<script type="text/javascript">
	var BASE_URL = "<?= base_url(); ?>";
</script>
<script src="<?= theme_asset("js/jquery.fancybox.min.js"); ?>"></script>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.2&appId=731690645328652&autoLogAppEvents=1"></script>
<?= view('admin.layouts.components.token') ?>
