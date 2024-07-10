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
						<?php if ($tipe == 2): ?>
							<?php theme_view("partials/stat_statistik_sos"); ?>
						<?php elseif ($tipe == 3): ?>
							<?php theme_view("partials/stat_wilayah"); ?>
						<?php elseif ($tipe == 4): ?>
							<?php theme_view("partials/stat_dpt"); ?>
						<?php else: ?>
							<?php theme_view("partials/stat_statistik"); ?>
						<?php endif; ?>
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