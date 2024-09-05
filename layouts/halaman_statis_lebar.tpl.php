<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<?php theme_view("commons/meta"); ?>
</head>

<body>
	<div class="pagelayout">
		<?php theme_view("partials/header"); ?>
		<div class="default-row mt-20">
			<div class="container-custom" style="margin-bottom:10px;">
				<?php

				$view_file = preg_match("/halaman_statis/i", $halaman_statis) ? $halaman_statis : str_replace('home/idm', 'idm/index', $halaman_statis);

				if ($tampil) {
					if (IS_PREMIUM || $idm) {
						$this->load->view($view_file);
					} else {
						$this->load->view("{$folder_themes}/partials/{$view_file}");
					}
				} else {
					$this->load->view("{$folder_themes}/partials/not_found");
				}
				
				?>

			</div>
		</div>
	</div>
	<?php theme_view("commons/footer"); ?>
</body>

</html>