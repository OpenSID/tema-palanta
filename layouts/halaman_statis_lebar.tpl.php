<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $this->load->view("$folder_themes/commons/meta"); ?>
</head>
<body>
	<div class="pagelayout">
		<?php $this->load->view("$folder_themes/partials/header"); ?>
		<div class="default-row mt-20">
			<div class="container-custom" style="margin-bottom:10px;">
				<?php if(IS_PREMIUM) : ?>
					<?php if (preg_match("/halaman_statis/i", $halaman_statis)) {
					$this->load->view($halaman_statis);
					} else {
					$halaman_statis = str_replace('home/idm', 'idm/index', $halaman_statis);
					$this->load->view("{$folder_themes}/partials/{$halaman_statis}");
					}
					?>
				<?php else : ?>
					<?php if ($idm): ?>
						<?php
						if (preg_match("/halaman_statis/i", $halaman_statis)) {
						$this->load->view($halaman_statis);
						} else {
						$halaman_statis = str_replace('home/idm', 'idm/index', $halaman_statis);
						$this->load->view("{$folder_themes}/partials/{$halaman_statis}");
						}
						?>  
					<?php else : ?>
						<?php
						if (preg_match("/halaman_statis/i", $halaman_statis)) {
						$this->load->view($halaman_statis);
						} else {
						$this->load->view("{$folder_themes}/partials/{$halaman_statis}");
						}
						?>
					<?php endif; ?>
				<?php endif ?>
			</div>
		</div>
	</div>	
	<?php $this->load->view("$folder_themes/commons/footer"); ?>
</body>
</html>

