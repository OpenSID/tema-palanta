<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="mobilemenu-container">
		<div class="withscroll">
		<div class="mlr-20">
			<form method=get action="<?= site_url(); ?>">
				<div class="formsearch r-flex" style="margin-bottom:20px;">
					<input type="text" name="cari" maxlength="50" class="form-control" value="<?= $cari ?>" placeholder="Cari Artikel">
					<button type="submit" class="btn btn-success btn-sm" style="margin:0;"><i class="fa fa-search" style="opacity:0.6;"></i></button>
				</div>
			</form>
			<div class="mobile-menu">
				<nav class="navbar" style="font-size:16px !important;" >
					<ul style="font-size:16px !important;" >
						<li><a href="<?= site_url(); ?>">Beranda</a></li>
						<?php foreach($menu_atas as $data) { ?>
						<?php if(count($data['submenu'])>0): ?>
						<li class="dropdown" style="font-size:16px !important;">
							<a style="font-size:16px !important;" href="<?= $data['link']?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><?= $data['nama']; if(count($data['submenu'])>0) { echo "<span class='caret'></span>"; } ?></a>
							<ul class="dropdown-menu" style="background:rgba(0,0,0,0.2);margin-top:10px;padding:15px 20px 8px;font-size:16px !important;">
							<?php foreach($data['submenu'] as $submenu): ?>
								<a style="font-size:16px !important;" href="<?= $submenu['link']?>"><p style="font-size:16px !important;"><?= $submenu['nama']?></p></a>
							<?php endforeach; ?>
							</ul>
						</li>
						<?php else: ?>
						<li><a href="<?= $data['link']?>"><?= $data['nama']?></a></li>
						<?php endif; ?>
						<?php } ?>
						
					</ul>
				</nav>
			</div>	
		</div>	
		</div>	
</div>