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
			<div class="container-custom">
				<div class="row-custom mlr-min-20">
					<div class="pageleft">
						<div class="heading-module l-flex">
							<div class="heading-module-inner l-flex">
								<i class="fa fa-edit"></i><h1>Informasi</h1>
							</div>
						</div>
						<?php
							if (preg_match("/halaman_statis/i", $halaman_statis)) {
							$this->load->view($halaman_statis);
							} else {
							$this->load->view("{$folder_themes}/partials/{$halaman_statis}");
							}
						?>
					</div>
					<div class="pageright">
					<?php $this->load->view("$folder_themes/partials/sidebar"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php $this->load->view("$folder_themes/commons/footer"); ?>
</body>
</html>

