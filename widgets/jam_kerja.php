<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php if ($jam_kerja) : ?>
<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-clock-o"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widgetbox widget-cat">
		<table class="tableagenda" style="width: 100%;" cellpadding="0" cellspacing="0">
						<thead>
							<tr>
								<th>Hari</th>
								<th>Mulai</th>
								<th>Selesai</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($jam_kerja as $value) : ?>
							<tr>
								<td><?= $value->nama_hari ?></td>
								<?php if ($value->status) : ?>
									<td><?= $value->jam_masuk ?></td>
									<td><?= $value->jam_keluar ?></td>
								<?php else : ?>
									<td colspan="2"><span class="label label-danger"> Libur </span></td>
								<?php endif ?>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
	</div>
</div>
<?php endif ?>