<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<?php if ($w_cos): ?>
	<?php foreach ($w_cos as $widget): ?>
	<?php $judul_widget = [
		'judul_widget' => str_replace('Desa', ucwords($this->setting->sebutan_desa), strip_tags($widget['judul']))
	]; ?>
		<?php if ($widget["jenis_widget"] == 1): ?>
			<?php $this->load->view("{$folder_themes}/widgets/{$widget['isi']}", $judul_widget) ?>
		<?php elseif($widget['jenis_widget'] == 2) : ?>
			<?php $this->load->view("../../{$widget['isi']}", $judul_widget) ?>
		<?php else : ?>
			<div class="box-def">
				<div class="head-widget l-flex">
					<div class="head-widget-title l-flex">
					<i class="fa fa-folder"></i><h1><?= $judul_widget['judul_widget'] ?></h1>
					</div>
				</div>
				<div class="widgetbox">
					<?= html_entity_decode($widget['isi']) ?>
				</div>
			</div>
		<?php endif ?>
	<?php endforeach ?>
<?php endif ?>