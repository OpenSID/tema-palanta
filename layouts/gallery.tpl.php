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
					<?php $this->load->view("$folder_themes/partials/galeri"); ?>
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