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
					<?php if ($single_artikel['tampilan'] == 1): ?>
						<div class="pageleft">
							<?php $this->load->view("$folder_themes/partials/artikel"); ?>
						</div>
						<div class="pageright">
							<?php $this->load->view("$folder_themes/partials/sidebar"); ?>
						</div>
					<?php elseif ($single_artikel['tampilan'] == 2): ?>
						<div class="pageright">
							<?php $this->load->view("$folder_themes/partials/sidebar"); ?>
						</div>
						<div class="pageleft">
							<?php $this->load->view("$folder_themes/partials/artikel"); ?>
						</div>
					<?php else : ?>
						<?php $this->load->view("$folder_themes/partials/artikel"); ?>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>	
	<?php $this->load->view("$folder_themes/commons/footer"); ?>
</body>
</html>