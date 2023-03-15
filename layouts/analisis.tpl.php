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
								<i class="fa fa-edit"></i><h1>Analisis</h1>
							</div>
						</div>
						<?php if ($list_jawab) : ?>
							<?php $this->load->view("$folder_themes/partials/analisis"); ?>
						<?php else : ?>
							<?php $this->load->view("$folder_themes/partials/analisis_indikator"); ?>
						<?php endif; ?>
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