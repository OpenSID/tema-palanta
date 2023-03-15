<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<link type='text/css' href="<?= base_url()?>assets/front/css/slider.css" rel='Stylesheet' />
<script src="<?= base_url()?>assets/front/js/jquery.cycle2.caption2.min.js"></script>


<div class="box-def">
	<div class="head-widget l-flex">
		<div class="head-widget-title l-flex">
		<i class="fa fa-group"></i><h1><?= $judul_widget ?></h1>
		</div>
	</div>
	<div class="widget-aparatur">
		<div id="aparatur_desa" class="cycle-slideshow"
		data-cycle-pause-on-hover=true
		data-cycle-fx=scrollHorz
		data-cycle-timeout=2000
		data-cycle-caption-plugin=caption2
		data-cycle-overlay-fx-out="slideUp"
		data-cycle-overlay-fx-in="slideDown"
		data-cycle-auto-height=4:6
		>
			<?php if ($this->web_widget_model->get_setting('aparatur_desa', 'overlay') == true): ?>
				<span class="cycle-prev"><img src="<?= base_url()?>assets/images/back_button.png" alt="Back"></span>
				<span class="cycle-next"><img src="<?= base_url()?>assets/images/next_button.png" alt="Next"></span>
				<div class="cycle-caption"></div>
				<div class="cycle-overlay"></div>
				<?php else: ?>
					<span class="cycle-pager"></span>
				<?php endif; ?>

				<?php foreach($aparatur_desa['daftar_perangkat'] as $data) : ?>
					<img style="display:block;width:100%;height:auto;" src="<?= $data['foto'] ?>"
					data-cycle-title="<span class='cycle-overlay-title'><?= $data['nama'] ?></span>
						<span class='label label-success'><?= $data['status_kehadiran'] == 'hadir' ? 'Hadir' : '' ?></span>"
					data-cycle-desc="<?= $data['jabatan'] ?>"
					>
				<?php endforeach; ?>
		</div>
	</div>
</div>

