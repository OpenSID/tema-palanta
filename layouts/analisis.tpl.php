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
						<div class="heading-module l-flex">
							<div class="heading-module-inner l-flex">
								<i class="fa fa-edit"></i><h1>Analisis</h1>
							</div>
						</div>
						<?php if ($list_jawab) : ?>
							<?php theme_view("partials/analisis"); ?>
						<?php else : ?>
							<?php theme_view("partials/analisis_indikator"); ?>
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