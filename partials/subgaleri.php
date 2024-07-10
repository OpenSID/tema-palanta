<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-folder-open"></i><h1>Album Galeri</h1>
	</div>
</div>
<div class="c-flex" style="margin:15px 0;">
<h1><?= $parent['nama']; ?></h1>
</div>
<?php if ($gallery): ?>
	<div class="row-custom mlr-min10">
		<?php foreach ($gallery as $data): ?>
			<?php if (is_file(LOKASI_GALERI . "sedang_" . $data['gambar'])): ?>
				<div class="galeri-col box-def">
					<div class="box-def-inner">
						<a data-fancybox="gallery" href="<?= AmbilGaleri($data['gambar'], 'sedang') ?>">
						<div class="image-slider">
							<img src="<?= AmbilGaleri($data['gambar'], 'kecil') ?>" alt="<?= $data['nama']; ?>"/>
						</div>
						</a>
						<div class="c-flex" style="margin-top:10px;">
							<p><?= $data['nama']; ?></p>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endforeach ?>
	</div>
	<?php theme_view("commons/pagination"); ?>
	
<?php else: ?>
	<div class="box-def hoverstyle">
		<div class="emptydata c-flex">
			<div>
			<svg viewBox="0 0 24 24"><path d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" /></svg>
			<p>Mohon maaf, untuk saat ini data Galeri belum tersedia...!</p>
			</div>
		</div>
	</div>	
<?php endif ?>