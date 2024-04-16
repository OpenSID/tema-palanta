<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-group"></i><h1>Pemerintah <?= ucwords($this->setting->sebutan_desa); ?></h1>
	</div>
</div>
<div class="mt-20">
	<?php if ($pemerintah): ?>
		<div class="row-custom mlr-min10 pemerintah">
		<?php foreach ($pemerintah as $data): ?>
			<div class="column-4 box-def">
				<div class="box-def-inner">
					<img style="width:100%;height:auto;" src="<?= AmbilFoto($data['foto'], '', $data['id_sex']) ?>" alt="Foto <? $data['nama'] ?>"/>
					<div class="c-flex" style="margin:10px 0 0;width:100%;text-align:center;">
						<div>
							<h2><?= $data['nama'] ?></h2>
							<p><?= $data['jabatan'] ?></p>
						</div>
					</div>
					<div class="c-flex" style="margin:10px 0 0;width:100%;text-align:center;">
						<div>
							<?php if ($this->setting->tampilkan_kehadiran && $data['status_kehadiran'] == 'hadir') : ?>
								<div class="btn btn-success btn-sm">Hadir</div>
							<?php else: ?>
								<div class="btn btn-danger btn-sm">Belum Hadir</div>
							<?php endif ?>
						</div>
					</div>
					<?php if (count($media_sosial ?? []) > 0) : ?>
						<div class="c-flex" style="margin:10px 0 0;width:100%;text-align:center;">
							<?php  $sosmed_pengurus = json_decode($data['media_sosial'], true); ?>
							<?php foreach ($media_sosial as $value): ?>
								<div style="padding: 0 3px;">
									<?php if ($sosmed_pengurus[$value['id']]): ?>
										<a href="<?= $sosmed_pengurus[$value['id']] ?>" rel="noopener noreferrer" target="_blank">
											<img src="<?= base_url("{$folder_themes}/assets/img/sosial_media/{$value['id']}.png") ?>" alt="<?= $value['id'] ?>" width="35px" height="35px"/>
										</a>
									<?php else : ?>
										<img src="<?= base_url("{$folder_themes}/assets/img/sosial_media/{$value['id']}.png") ?>" alt="<?= $value['id'] ?>" width="35px" height="35px"/>
									<?php endif ?>
								</div>
							<?php endforeach ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		<?php endforeach ?>
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
</div>