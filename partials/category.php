<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="pagelayout">
<?php $this->load->view("$folder_themes/partials/header"); ?>
<div class="default-row mt-20">
	<div class="container-custom">
		<div class="row-custom mlr-min-20">
			<div class="pageleft">
				<div class="heading-module l-flex">
					<div class="heading-module-inner l-flex">
					<?php if ($title) : ?>
						<?php if (!empty($judul_kategori)): ?>
							<i class="fa fa-list"></i><h1><?= $judul_kategori['kategori'] ?></h1>
						<?php else: ?>
							<i class="fa fa-edit"></i><h1><?= $title ?></h1>
						<?php endif; ?>
					<?php else: ?>
						<i class="fa fa-search"></i><h1>Hasil Pencarian</h1>
					<?php endif; ?>
					</div>
				</div>
				<?php if ($artikel): ?>
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
				<?php else: ?>
					<div class="box-def hoverstyle">
					<div class="emptydata c-flex">
						<div>
						<svg viewBox="0 0 24 24"><path d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" /></svg>
						<p>Mohon maaf, data tidak tersedia...!</p>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php $this->load->view("$folder_themes/commons/pagination"); ?>	
			</div>
			<div class="pageright">
				<?php $this->load->view("$folder_themes/partials/sidebar"); ?>
			</div>
		</div>
	</div>
</div>
</div>