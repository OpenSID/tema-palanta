<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-list"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widgetbox widget-cat">
		<ul id="ul-menu">
		<?php foreach($menu_kiri as $data):?>
			<li><a href="<?= site_url("artikel/kategori/$data[slug]"); ?>"><?= $data['kategori']; ?><?php if (count($data['submenu'] ?? [])>0) {
    print('<span class="caret"></span>');
} ?></a>
			<?php if(count($data['submenu'] ?? [])>0): ?>
			<ul>
				<?php foreach($data['submenu'] as $submenu):?>
					<li><a href="<?= site_url("artikel/kategori/$submenu[slug]"); ?>"><?= $submenu['kategori']?></a></li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>
			</li>
		<?php endforeach;?>
		</ul>
	</div>
</div>
