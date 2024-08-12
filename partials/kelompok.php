<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<?php $tipe = ucwords($detail['tipe']); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-group"></i><h1>Data <?= $tipe ?></h1>
	</div>
</div>

<div style="margin:20px 0 20px;">
  <h3 style="margin:0 0 10px;">Rinci Data <?= $tipe ?></h3>
  <div class="table-responsive content">
    <table class="table table-striped" width="100%">
      <tbody>
        <tr>
          <td width="20%">Nama <?= $tipe ?></td>
          <td width="1%">:</td>
          <td><?= $detail['nama'] ?></td>
          <td width="20%" rowspan="5" style="text-align: center; vertical-align: middle;">
            <img src="<?= gambar_desa($detail['logo']) ?>" alt="Logo <?= ucwords($detail['tipe']) ?>" class="w-full">
          </td>
        </tr>
        <tr>
          <td>Kode <?= $tipe ?></td>
          <td>:</td>
          <td><?= $detail['kode'] ?></td>
        </tr>
        <tr>
          <td>Kategori <?= $tipe ?></td>
          <td>:</td>
          <td><?= $detail['kategori'] ?></td>
        </tr>
        <tr>
          <td>No. SK Pendirian</td>
          <td>:</td>
          <td><?= $detail['no_sk_pendirian'] ?></td>
        </tr>
		<tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><?= $detail['keterangan'] ?></td>
        </tr>
      </tbody>
    </table>
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