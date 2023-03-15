<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-gavel"></i><h1>Detail Pembangunan</h1>
	</div>
</div>
<?php if($pembangunan) : ?>
	<div class="row-custom mlr-min10">
		<div class="galeri-col">
			<div class="box-def">
				<div class="heading-medium btn-success l-flex"><h2>Data Pembangunan</h2></div>
				<div class="box-def-inner">
					<div class="image-doc">
						<?php if (is_file(LOKASI_GALERI . $pembangunan->foto)): ?>
							<img src="<?= base_url(LOKASI_GALERI . $pembangunan->foto); ?>" alt="Pembangunan"/>
						<?php else: ?>
							<img src="<?= base_url("$this->theme_folder/$this->theme/images/pengganti.jpg") ?>"/>
						<?php endif;?>
					</div>
					<table width="100%" class="tabledefault" style="margin-top:15px;">
						<tr>
							<td>Nama Kegiatan</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->judul ?></td>
						</tr>
						<tr>
							<td>Alamat</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->alamat ?></td>
						</tr>
						<tr>
							<td>Sumber Dana</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->sumber_dana ?></td>
						</tr>
						<tr>
							<td>Anggaran</td><td style="width:30px;text-align:center;">:</td><td>Rp. <?= number_format($pembangunan->anggaran,0) ?></td>
						</tr>
						<tr>
							<td>Volume</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->volume ?></td>
						</tr>
						<tr>
							<td>Pelaksana</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->pelaksana_kegiatan ?></td>
						</tr>
						<tr>
							<td>Tahun</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->tahun_anggaran ?></td>
						</tr>
						<tr>
							<td>Keterangan</td><td style="width:30px;text-align:center;">:</td><td><?= $pembangunan->keterangan ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="galeri-col">
			<div class="box-def">
				<div class="heading-medium btn-success l-flex"><h2>Progres Pembangunan</h2></div>
				<div class="box-def-inner">
					<?php if ($dokumentasi): ?>
					<div class="row-custom mlr-min10">
						<?php foreach ($dokumentasi as $value): ?>
						<div class="galeri-col">
							<div class="image-doc">
							<?php if (is_file(LOKASI_GALERI . $value->gambar)): ?>
								<img src="<?= base_url(LOKASI_GALERI . $value->gambar); ?>" alt="<?= $pembangunan->slug . '-' . $value->persentase; ?>"/>
							<?php else: ?>
								<img src="<?= base_url("$this->theme_folder/$this->theme/images/pengganti.jpg") ?>"/>
							<?php endif; ?>
							</div>
							<div class="c-flex" style="margin-top:5px;"><p>Foto Pembangunan <?= $value->persentase; ?></p></div>
						</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<div style="float:right;">
			<?php
				$share = [
				'link' => site_url('pembangunan/' . $pembangunan->slug),
				'judul' => $pembangunan->judul,
				];
				$this->load->view("$folder_themes/commons/share", $share);
			?>
			</div>
		</div>
	</div>
	<div class="box-def">
		<div class="heading-medium btn-success l-flex"><h2>Lokasi Pembangunan</h2></div>
		<div class="box-def-inner">
		<div class="panel-body" id="map" style="max-height:400px;"></div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			let map_key = "<?= $this->setting->mapbox_key; ?>";
			let lat = "<?= $pembangunan->lat ?? $desa['lat']; ?>";
			let lng = "<?= $pembangunan->lng ?? $desa['lng']; ?>";
			let posisi = [lat, lng];
			let zoom = 15;
			let logo = L.icon({
				iconUrl: "<?= base_url('assets/images/gis/point/construction.png'); ?>",
			});

			pembangunan = L.map('map').setView(posisi, zoom);
			getBaseLayers(pembangunan, map_key);
			pembangunan.addLayer(new L.Marker(posisi, {icon:logo}));
		});
	</script>
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