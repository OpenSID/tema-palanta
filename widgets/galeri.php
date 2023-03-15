<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-picture-o"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widgetbox widget-gal">
		<div class="carousel js-flickity" data-flickity='{ "autoPlay": false, "cellAlign": "left"}'>
			<?php foreach ($w_gal As $data): ?>
				<div class="carousel-col">
					<a class="slider_tittle" href="<?= site_url("galeri/$data[id]"); ?>">
					<div class="image-slider">
						<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
						<img src="<?= AmbilGaleri($data['gambar'],'sedang')?>">
						<?php endif; ?>
					</div>
					<p><?= "$data[nama]" ?></p>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
