<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
	<i class="fa fa-edit"></i><h1>Artikel Terbaru</h1>
	</div>
	<div class="to-arsip"><a href="<?= site_url('arsip') ?>"><i class="fa fa-plus"></i> Arsip</a></div>
</div>
<?php foreach ($artikel as $data): ?>
	<div class="box-def hoverstyle">
		<div class="box-def-inner artikel-list">
		<a href="<?= site_url('artikel/'.buat_slug($data)) ?>"><h2><?= $data["judul"] ?></h2></a>
		<div class="row-custom mlr-min5">
			<div class="artikel-image">
				<div class="image-absolute">
				<?php if (is_file(LOKASI_FOTO_ARTIKEL."kecil_".$data['gambar'])): ?>
					<img src="<?= AmbilFotoArtikel($data['gambar'],'kecil') ?>">
				<?php else: ?>
					<img src="<?= theme_asset("images/pengganti.jpg") ?>"/>
					<div class="small-image"><img src="<?= gambar_desa($desa['logo']);?>"/></div>
				<?php endif;?>
				</div>
			</div>
			<div class="artikel-title">
				<div class="artikel-meta">
					<div class="meta-item l-flex"><i class="fa fa-calendar"></i><p><?= tgl_indo($data['tgl_upload']);?></p></div>
				</div>
				<div class="artikel-meta" style="margin-bottom:5px;">
					<div class="meta-item l-flex"><i class="fa fa-user"></i><p><?= $data['owner'] ?></p></div>
					<div class="meta-item l-flex"><i class="fa fa-eye"></i><p><?= hit($data['hit']) ?> dibaca</p></div>
					<div class="meta-item l-flex"><i class="fa fa-comment"></i><p><?php $baca_komentar = $this->db->query("SELECT * FROM komentar WHERE id_artikel = '" . $data['id'] . "'");$komentarku = $baca_komentar->num_rows(); echo number_format($komentarku, 0, ',', '.'); ?></p></div>
				</div>
				<p><?= potong_teks ($data['isi'], 250); ?>...</p>
				<a href="<?= site_url('artikel/'.buat_slug($data)) ?>">
				<div class="l-flex"><div class="artikel-link l-flex"><i class="fa fa-fast-forward c-flex"></i>Selengkapnya...</div></div>
				</a>
			</div>
		</div>
		</div>
	</div>
<?php endforeach; ?>
<?php theme_view("commons/pagination"); ?>