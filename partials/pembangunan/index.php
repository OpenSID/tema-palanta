<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-gavel"></i><h1>Pembangunan</h1>
	</div>
</div>
<?php if ($pembangunan): ?>
	<div class="row-custom mlr-min5 pembangunan">
		<?php foreach ($pembangunan as $data): ?>
			<div class="column-4 box-def">
				<a href="<?= site_url("pembangunan/$data->slug"); ?>">
					<div class="box-def-inner2">
						<div class="image-slider">
							<?php if ($data->foto): ?>
								<img src="<?= base_url() . LOKASI_GALERI . $data->foto; ?>" alt="Pembangunan"/>
							<?php else: ?>
								<img src="<?= base_url("$this->theme_folder/$this->theme/images/pengganti.jpg") ?>"/>
								<div class="small-image"><img src="<?= gambar_desa($desa['logo']);?>"/></div>
							<?php endif;?>
						</div>
						<div class="l-flex" style="margin-top:10px;">
							<div>
							<h3><?= $data->judul ?></h3>
							<table width="100%" class="tableagenda">
								<tr>
									<td>Lokasi</td><td style="width:30px;text-align:center;">:</td><td><?= ($data->alamat == "=== Lokasi Tidak Ditemukan ===") ? 'Lokasi tidak diketahui' : $data->alamat; ?></td>
								</tr>
								<tr>
									<td>Tahun</td><td style="width:30px;text-align:center;">:</td><td><?= $data->tahun_anggaran ?></td>
								</tr>
							</table>
							</div>
						</div>
					</div>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="box-def hoverstyle">
		<div class="emptydata c-flex">
			<div>
			<svg viewBox="0 0 24 24"><path d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" /></svg>
			<p>Mohon maaf, untuk saat ini data belum tersedia...!</p>
			</div>
		</div>
	</div>
<?php endif; ?>	