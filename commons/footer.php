<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="container-custom">
	<div class="box-def">
		<div class="bottom-area">
			<?php if($transparansi) $this->load->view($folder_themes .'/partials/apbd_footer', $transparansi) ?>	
		</div>
	</div>
</div>
<div class="footerweb">
	<div class="container-custom margin-footer">
		<div class="box-def" style="border:none;">
		<div class="footerweb-inner">
			<div class="c-flex">
				<div>
				<p>Copyright &copy; <?= date('Y') ?> <?= NAMA_DESA ?></p>
				<p><a href="https://github.com/OpenSID/OpenSID" rel="noopener noreferrer" target="_blank">OpenSID <?= AmbilVersi()?></a> | Theme : <?= THEME_NAME ?> <?= THEME_VERSION ?></p>
				</p>
				</div>
			</div>
			
			<div class="sponsor c-flex">
				<?php if ($bsre != null && $bsre->value == 1): ?>
				<div class="sponsor1 c-flex">
					<img src="<?=asset('assets/images/bsre.png?v', false); ?>">
				</div>
				<?php endif ?>
				<?php if (file_exists('mitra')): ?>
				<div class="sponsor2 c-flex">
					<a href="https://my.idcloudhost.com/aff.php?aff=3172" rel="noopener noreferrer" target="_blank"><img src="<?= base_url('/assets/images/Logo-IDcloudhost.png')?>" alt="IDCloudHost" title="IDCloudHost"></a>
				</div>
				<?php endif ?>
			</div>
		</div>	
		</div>
	</div>
</div>

<script src="<?= theme_asset("js/wow.min.js") ?>"></script>
<script src="<?= theme_asset("js/slick.min.js") ?>"></script>
<script src="<?= theme_asset("js/custom.js") ?>"></script>
