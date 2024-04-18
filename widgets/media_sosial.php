<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-share-alt"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widgetbox widget-social c-flex">
		<?php foreach ($sosmed as $data): ?>
			<?php if (!empty($data["link"])): ?>
				<a href="<?= $data['link']?>" rel="noopener noreferrer" target="_blank">
					<?php $icon = strtolower($data['nama']) . '.png'; ?>
					<img src="<?= base_url("{$folder_themes}/assets/img/sosial_media/{$icon}") ?>" alt="<?= $data['nama'] ?>"/>
					<img src="<?= $data['icon'] ?>" alt="<?= $data['nama'] ?>" style="width:50px;height:50px;" />
				</a>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>