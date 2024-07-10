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
		<?php
			$sinergi_program = sinergi_program();
			$perbaris        = (int) (setting('gambar_sinergi_program_perbaris') ?: 3);

			// Calculate the total number of iterations needed
			$totalIterations = count($sinergi_program) + ($perbaris - count($sinergi_program) % $perbaris) % $perbaris;

			for ($key = 0; $key < $totalIterations; $key++) {
				// Start a new row when necessary
				if ($key % $perbaris === 0) {
					echo "<tr>\n";
				}

				// Check if the current key is within the bounds of the actual data
				if ($key < count($sinergi_program)) {
					?>
					<td>
						<center>
							<span style="display: inline-block;">
								<a href="<?= $sinergi_program[$key]['tautan'] ?>" rel="noopener noreferrer" target="_blank"><img src="<?= $sinergi_program[$key]['gambar_url'] ?>" style="float:left; max-width: 217px; margin:5px;" alt="<?= $sinergi_program[$key]['judul'] ?>" /></a>
							</span>
						</center>
					</td>
					<?php
				}

				// Close the row when reaching the desired number of columns or the last iteration
				if ($key % $perbaris === $perbaris - 1 || $key === $totalIterations - 1) {
					echo "</tr>\n";
				}
			}
			?>
		</table>
	</div>
</div>
