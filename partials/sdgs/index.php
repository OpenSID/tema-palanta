<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
<div class="box-def-inner">
	<div class="heading-module l-flex">
		<div class="heading-module-inner l-flex">
			<i class="fa fa-cog"></i><h1>SDGs <?= ucwords($this->setting->sebutan_desa) ?></h1>
		</div>
	</div>
	<?php $evaluasi = sdgs() ?>
	<?php if ($error_msg = $evaluasi->error_msg): ?>
		<div class="alert alert-danger">
			<p class="py-3"><?= $error_msg ?></p>
		</div>
	<?php else: ?>
		<div class="c-flex" style="margin:15px 0;">
			<div>
			<p><?= $evaluasi->average ?></p>
			<h3 style="margin:10px 0 0;">Skor SDGs Desa</h3>
			</div>
		</div>
		<div class="row-custom mlr-min10 sdgs">
			<?php foreach ($evaluasi->data as $key => $value): ?>
			<div class="column-4 box-def">
				<div class="sdgs-box l-flex">
					<img src="<?= asset("images/sdgs/{$value->image}") ?>" alt="<?= $value->images ?>" />
					<div style="text-align:center;">
					<p>NILAI</p>
					<h3><?= $value->score ?></h3>
					</div>
				</div>
			</div>
			<?php endforeach ?>
		</div>
	<?php endif ?>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#total').prepend('<?= $hasil ?>')
});
</script>