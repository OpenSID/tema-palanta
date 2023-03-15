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
			<div class="container-custom mapstyle" style="margin-bottom:20px;">
				<?php $this->load->view($halaman_peta); ?>
			</div>
		</div>
	</div>	
	<?php $this->load->view("$folder_themes/commons/footer"); ?>
</body>
</html>