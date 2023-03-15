<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="c-flex" style="margin:20px 0 20px;">
<h1>DAFTAR DATA ANALISIS DESA</h1>
</div>

<div style="margin:0 0 20px;">
<?php if ($list_indikator): ?>
	<?php if (count($master_indikator) > 1) : ?>
		<form action="<?=site_url('data_analisis'); ?>" method="get">
			<div class="row" style="margin-bottom: 20px;">
				<label class="col-md-3 custom-label">Analisis: </label>
				<div class="col-md-9">	
				<select class="form-control form-select" name="master" onchange="this.form.submit()">
					<option value="">-- Pilih --</option>
					<?php foreach ($master_indikator as $master): ?>
						<option value="<?= $master['id']?>" <?= selected($list_indikator['0']['id_master'], $master['id'])?>><?= "{$master['master']} ({$master['tahun']})"?></option>
					<?php endforeach; ?>
				</select>
				</div>
			</div>
		</form>
	<?php endif; ?>
	<div class="table-responsive">
		<table width="100%" class="table table-striped">
			<tr>
				<td>Pendataan</td><td width="20px">:</td><td><?= $list_indikator['0']['master']; ?></td>
			</tr>
			<tr>
				<td>Subjek</td><td width="20px">:</td><td><?= $list_indikator['0']['subjek']; ?></td>
			</tr>
			<tr>
				<td>Tahun</td><td width="20px">:</td><td><?= $list_indikator['0']['tahun']; ?></td>
			</tr>
		</table>
	</div>
	<h3 style="margin:10px 0;">Indikator</h3>
	<div class="table-responsive">
		<table>
		<?php foreach ($list_indikator AS $data): ?>
			<tr>
				<td><?= $data['nomor'].'.'; ?>
				<td><a href="<?= site_url("jawaban_analisis/$data[id]/$data[subjek_tipe]/$data[id_periode]"); ?>"><b><?= $data['indikator']?></b></a></td>
			</tr>
		<?php endforeach; ?>
		</table>
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
