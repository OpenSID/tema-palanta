<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-group"></i><h1>Data Suplemen</h1>
	</div>
</div>
<div class="l-flex" style="margin:20px 0 10px;text-align:left;width:100%;">
	<div>
	<h1><?= $main['suplemen']['nama']; ?></h1>
	</div>
</div>
<table width="100%" class="table tabledefault table-striped">
	<tr>
		<td>Nama Data</td><td width="20px">:</td><td><?= $main['suplemen']['nama']; ?></td>
	</tr>
	<tr>
		<td>Sasaran Terdata</td><td width="20px">:</td><td><?= $sasaran[$main['suplemen']['sasaran']]; ?></td>
	</tr>
	<tr>
		<td>Keterangan</td><td width="20px">:</td><td><?= $main['suplemen']['keterangan']; ?></td>
	</tr>
</table>

<div style="margin:20px 0;">
	<h3 style="margin-bottom:10px;">Daftar Data <?= $main['suplemen']['nama']; ?></h3>
	<div class="table-responsive">
		<table class="table table-striped table-bordered dataTable table-hover tablesmall-text" id="tabel-data">
			<thead class="bg-gray disabled color-palette">
				<tr>
					<th style="width:50px;text-align:center;">No</th>
					<th>Nama</th>
					<th>Lahir</th>
					<th>Alamat</th>
					<th>L/P</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($main['terdata'] as $key => $data): ?>
				<tr>
					<td style="width:50px;text-align:center;"><?= ($key + 1); ?></td>
					<td><b><?= $data['terdata_nama']; ?></b></td>
					<td><?= $data["tempat_lahir"]; ?></td>
					<td><?= $data["info"];?></td>
					<td><?= $data["sex"]; ?></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>