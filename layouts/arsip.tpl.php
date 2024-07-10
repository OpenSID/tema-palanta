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
			<div class="container-custom">
				<div class="row-custom mlr-min-20">
					<div class="pageleft">
					<?php theme_view("partials/arsip"); ?>
					</div>
					<div class="pageright">
					<?php theme_view("partials/sidebar"); ?>
					</div>
				</div>
			</div>
		</div>
	</div>	
	<?php theme_view("commons/footer"); ?>
</body>
</html>