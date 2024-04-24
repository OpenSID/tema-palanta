<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<style>
#sinergi-program img{max-width:100%;height:auto;}
</style>
<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-link"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div id="sinergi_program" class="widgetbox">
		<table style="margin:0 auto;">
			<?php foreach($sinergi_program as $program) :
				$baris[$program['baris']][$program['kolom']] = $program;
			endforeach; ?>

			<?php foreach($baris as $baris_program) : ?>
				<tr>
					<td >
						<?php $width = 100/count($baris_program ?? [])-count($baris_program ?? [])?>
						<?php foreach($baris_program as $program) : ?>
							<span style="display: inline-block; width: <?= $width.'%'?>">
								<a href="<?= $program['tautan']?>" rel="noopener noreferrer" target="_blank"><img src="<?= base_url().LOKASI_GAMBAR_WIDGET.$program['gambar']?>" style="float:left; margin:5px;" alt="<?= $program['judul']?>" /></a>
							</span>
						<?php endforeach; ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
</div>
