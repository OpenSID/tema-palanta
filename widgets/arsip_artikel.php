<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-folder-open"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widgetbox">
		<div class="tabs">
			<input type="radio" id="tab1" name="tab-control" checked>
			<input type="radio" id="tab2" name="tab-control">
			<input type="radio" id="tab3" name="tab-control">
			<ul>
				<li><label for="tab1" role="button" class="c-flex"><span>Populer</span></label></li>
				<li><label for="tab2" role="button" class="c-flex"><span>Terbaru</span></label></li>
				<li><label for="tab3" role="button" class="c-flex"><span>Random</span></label></li>
			</ul>
			<div class="content2">
				<section>
					<?php foreach (['populer' => 'arsip_populer'] as $jenis => $jenis_arsip) : ?>
					<?php foreach (${$jenis_arsip} as $arsip): ?>
						<a href="<?= site_url('artikel/'.buat_slug($arsip))?>">
						<div class="row-custom row-arsip mlr-min5">
							<div class="arsip-image">
								<div class="image-arsip">
								<?php if (is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])): ?>
									<img src="<?= base_url(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])?>"/>
								<?php else: ?>
									<img src="<?= theme_asset("images/pengganti.jpg") ?>"/>
									<div class="small-image"><img src="<?= gambar_desa($desa['logo']);?>"/></div>
								<?php endif;?>
								</div>
							</div>
							<div class="arsip-title">
								<p><?= hit($arsip['hit']); ?> dibuka<br/><span><?= $arsip["judul"] ?></span></p>
							</div>
						</div>	
						</a>
					<?php endforeach ?>	
					<?php endforeach ?>	
				</section>
				<section>
					<?php foreach (['terkini' => 'arsip_terkini'] as $jenis => $jenis_arsip) : ?>
					<?php foreach (${$jenis_arsip} as $arsip): ?>
						<a href="<?= site_url('artikel/'.buat_slug($arsip))?>">
						<div class="row-custom row-arsip mlr-min5">
							<div class="arsip-image">
								<div class="image-arsip">
								<?php if (is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])): ?>
									<img src="<?= base_url(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])?>"/>
								<?php else: ?>
									<img src="<?= theme_asset("images/pengganti.jpg") ?>"/>
									<div class="small-image"><img src="<?= gambar_desa($desa['logo']);?>"/></div>
								<?php endif;?>
								</div>
							</div>
							<div class="arsip-title">
								<p><?= hit($arsip['hit']); ?> dibuka<br/><span><?= $arsip["judul"] ?></span></p>
							</div>
						</div>	
						</a>
					<?php endforeach ?>	
					<?php endforeach ?>	
				</section>
				<section>
					<?php foreach (['acak' => 'arsip_acak'] as $jenis_arsip) : ?>
					<?php foreach (${$jenis_arsip} as $arsip): ?>
						<a href="<?= site_url('artikel/'.buat_slug($arsip))?>">
						<div class="row-custom row-arsip mlr-min5">
							<div class="arsip-image">
								<div class="image-arsip">
								<?php if (is_file(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])): ?>
									<img src="<?= base_url(LOKASI_FOTO_ARTIKEL.'sedang_'.$arsip['gambar'])?>"/>
								<?php else: ?>
									<img src="<?= theme_asset("images/pengganti.jpg") ?>"/>
									<div class="small-image"><img src="<?= gambar_desa($desa['logo']);?>"/></div>
								<?php endif;?>
								</div>
							</div>
							<div class="arsip-title">
								<p><?= hit($arsip['hit']); ?> dibuka<br/><span><?= $arsip["judul"] ?></span></p>
							</div>
						</div>	
						</a>
					<?php endforeach ?>	
					<?php endforeach ?>	
				</section>
			</div>
		</div>
	</div>
</div>
