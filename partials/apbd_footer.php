<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="apbdstyle">
<div class="heading-module c-flex">
	<div class="heading-module-inner c-flex">
	<i class="fa fa-edit"></i><h1>APBD <?= ucwords($this->setting->sebutan_desa); ?></h1>
	</div>
</div>

<div class="row-custom mlr-min5">
	<?php foreach ($data_widget as $subdata_name => $subdatas): ?>
	<div class="apbd-room">
		<h1><?= ($subdatas['laporan'])?></h1>
		<div class="box-def-inner">
		<?php foreach ($subdatas as $key => $subdata): ?>
		<?php if($subdata['judul'] != NULL and $key != 'laporan' and $subdata['realisasi'] != 0 or $subdata['anggaran'] != 0): ?>
			<div class="apbd-row">
				<h3><?= $subdata['judul']; ?></h3>
				<div class="c-flex">
				<p>Anggaran</p><p style="margin:0 5px;">|</p><p>Realisasi</p>
				</div>
				<table class="table-apbd" style="width:100%;">
					<tr>
						<td style="font-size:90%;text-align:left;">Rp. <?= number_format($subdata['anggaran']); ?></td><td style="font-size:90%;text-align:right;">Rp. <?= number_format($subdata['realisasi']); ?></td>
					</tr>
				</table>
				<div class="progress progress-md">
					<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width: <?= $subdata['persen'] ?>%"><?= $subdata['persen'] ?>%</div>
				</div>
			</div>
		<?php endif; ?>
		<?php endforeach; ?>	
		</div>

	</div>
	<?php endforeach; ?>
</div>
</div>