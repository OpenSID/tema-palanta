<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-group"></i><h1>Data Kelompok</h1>
	</div>
</div>
<div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
	<div>
	<h1><?= $detail['nama']; ?></h1>
	<p style="margin-top:10px;"><?= $detail['keterangan']?></p>
	</div>
</div>

<div style="margin:0 0 20px;">
	<h3 style="margin:0 0 10px;">Daftar Pengurus</h3>
	<div class="table-responsive">
		<table width="100%" class="table table-striped">
			<thead>
				<tr>
					<th style="width:50px;text-align:center;">No</th>
					<th>Nama</th>
					<th>Jabatan</th>
					<th>Alamat</th>
					<th>L/P</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pengurus as $key => $data): ?>
				<tr>
					<td style="width:50px;text-align:center;"><?= $key + 1?></td>
					<td><?= $data['nama']?></td>
					<td><?= $data['jabatan']?></td>
					<td><?= $data['alamat']?></td>
					<td><?= $data['sex']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
<div style="margin:0 0 20px;">
	<h3 style="margin:0 0 10px;">Daftar Anggota</h3>
	<div class="table-responsive">
		<table width="100%" class="table table-striped">
			<thead>
				<tr>
					<th style="width:50px;text-align:center;">No</th>
					<th>Nama</th>
					<th>No. Anggota</th>
					<th>Alamat</th>
					<th>L/P</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($anggota as $key => $data): ?>
				<tr>
					<td style="width:50px;text-align:center;"><?= $key + 1?></td>
					<td><?= $data['nama']?></td>
					<td><?= $data['no_anggota'] ?:'-'; ?></td>
					<td><?= $data['alamat']?></td>
					<td><?= $data['sex']; ?></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>