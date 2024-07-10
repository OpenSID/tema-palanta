<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $this->load->view("$folder_themes/commons/meta"); ?>
</head>
<body>
	<div id="palanta">
	<?php if (!empty($judul_kategori)): ?>
		<?php $this->load->view("$folder_themes/partials/category"); ?>
	<?php else: ?>
	<?php $this->load->view("$folder_themes/partials/header"); ?>
		<div class="container-custom">
			<div class="introhome">
				<?php if(IS_PREMIUM) : ?>
					<?php if($latar_website) : ?>
						<img src="<?= $latar_website ?>"/>
					<?php else: ?>
						<img src="<?= theme_asset("images/headbg.jpg") ?>"/>
					<?php endif; ?>
				<?php else: ?>
					<?php if($latar_website) : ?>
						<img src="<?= base_url($latar_website); ?>"/>
					<?php else: ?>
						<img src="<?= theme_asset("images/headbg.jpg") ?>"/>
					<?php endif; ?>
				<?php endif; ?>
				<div class="introhome-title">
					<p>Selamat Datang di <?= ucwords($this->setting->website_title); ?> <?= ucwords($this->setting->sebutan_desa); ?> <?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?></p>
				</div>
			</div>
		</div>
		<div class="default-row mt-20">
			<div class="container-custom">
				<div class="row-custom mlr-min-20">
					<div class="pageleft">
					<?php $this->load->view("$folder_themes/partials/slider"); ?>
					<?php if($headline) : ?>
						<?php $this->load->view("$folder_themes/partials/headline"); ?>
					<?php endif; ?>
					<?php $this->load->view("$folder_themes/partials/artikel_frontend"); ?>
					
					</div>
					<div class="pageright">
					<?php $this->load->view("$folder_themes/partials/sidebar"); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>	
	<?php $this->load->view("$folder_themes/commons/footer"); ?>
	</div>
</body>
</html>