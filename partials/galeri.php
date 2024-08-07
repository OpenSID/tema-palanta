<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-folder-open"></i>
		<h1>Album Galeri</h1>
	</div>
</div>
<?php if ($gallery) : ?>
	<div class="row-custom mlr-min10">
		<?php
		$jumlah = 0;
		foreach ($gallery as $album) : ?>
			<!-- <php if (is_file(LOKASI_GALERI . "sedang_" . $album['gambar'])) : ?> -->
			<?php if (file_exists(LOKASI_GALERI . "sedang_" . $album['gambar']) || $album['jenis'] == 2) :
				$gambar = $album['jenis'] == 2 ? $album['gambar'] : AmbilGaleri($album['gambar'], 'kecil');
				$jumlah++;
			?>
				<div class="galeri-col box-def">
					<a href="<?= site_url() . "galeri/" . $album['id'] ?>">
						<div class="box-def-inner">
							<div class="image-slider">
								<img src="<?= AmbilGaleri($album['gambar'], 'kecil') ?>" alt="<?= $album['nama']; ?>" />
							</div>
							<div class="c-flex" style="margin-top:10px;">
								<p><b>Album : <?= $album['nama']; ?></b></p>
							</div>
						</div>
					</a>
				</div>
			<?php endif ?>
		<?php endforeach ?>
	</div>
	<?php theme_view("commons/pagination"); ?>

<?php else : ?>
	<div class="box-def hoverstyle">
		<div class="emptydata c-flex">
			<div>
				<svg viewBox="0 0 24 24">
					<path d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" />
				</svg>
				<p>Mohon maaf, untuk saat ini data Galeri belum tersedia...!</p>
			</div>
		</div>
	</div>
<?php endif ?>