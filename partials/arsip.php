<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="arsip">
	<div class="heading-module l-flex">
		<div class="heading-module-inner l-flex">
			<i class="fa fa-folder-open"></i><h1>Arsip Konten</h1>
		</div>
	</div>
	<?php if(count($farsip)>0): ?>
		<div class="table-responsive">
		<table class="table table-striped">
			<tbody>
			<?php foreach($farsip AS $data): ?>
				<tr>
					<td style="text-align:center;width:50px;vertical-align:top;"><?= $data["no"]?></td>
					<td>
						<a href="<?= site_url('artikel/'.buat_slug($data))?>"><h3><?= $data["judul"]?></h3></a>
						Diposting tanggal : <?= tgl_indo($data["tgl_upload"])?><br/>
						Oleh : <?= $data["owner"]?>
					</td>
					<td style="text-align:right;width:20%;vertical-align:top;">
						<?= hit($data['hit']) ?> dibaca
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		</div>
		<?php
		$data['paging_page'] = 'first/arsip';
		$this->load->view("$folder_themes/commons/pagination", $data);
		?>
	<?php else: ?>
		Belum ada arsip konten web.
	<?php endif; ?>
</div>