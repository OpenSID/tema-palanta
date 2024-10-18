<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<style>
	.dropdown-submenu {
		position: relative;
	}

	.dropdown-submenu>.dropdown-menu {
		top: 0;
		left: 100%;
		margin-top: -1px;
		display: none;
	}

	.dropdown-submenu:hover>.dropdown-menu {
		display: block;
	}
</style>
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
				<nav class="navbar" style="font-size:16px !important;">
					<ul style="font-size:16px !important;">
						<li><a href="<?= site_url(); ?>">Beranda</a></li>
						<?php foreach (menu_tema() as $data): ?>
							<li class="<?= count($data['childrens'] ?? []) > 0 ? 'dropdown' : '' ?>" style="font-size:16px !important;">
								<a href="<?= $data['link'] ?>" class="<?= count($data['childrens'] ?? []) > 0 ? 'dropdown-toggle' : '' ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
									<?= $data['nama'] ?> <?= count($data['childrens'] ?? []) > 0 ? "<span class='caret'></span>" : '' ?>
								</a>
								<?php if (count($data['childrens'] ?? []) > 0): ?>
									<ul class="dropdown-menu" style="background:rgba(0,0,0,0.2);margin-top:10px;padding:15px 20px 8px;font-size:16px !important;">
										<?php foreach ($data['childrens'] as $submenu): ?>
											<li class="<?= count($submenu['childrens'] ?? []) > 0 ? 'dropdown-submenu' : '' ?>" style="font-size:16px !important;">
												<a href="<?= $submenu['link'] ?>" style="font-size:16px !important;" class="<?= count($submenu['childrens'] ?? []) > 0 ? 'dropdown-toggle' : '' ?>" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
													<?= $submenu['nama'] ?> <?= count($submenu['childrens'] ?? []) > 0 ? "<span class='caret'></span>" : '' ?>
												</a>
												<?php if (count($submenu['childrens'] ?? []) > 0): ?>
													<ul class="dropdown-menu" style="background:rgba(0,0,0,0.2);font-size:16px !important;">
														<?php foreach ($submenu['childrens'] as $subsubmenu): ?>
															<li><a href="<?= $subsubmenu['link'] ?>" style="font-size:16px !important;"><?= $subsubmenu['nama'] ?></a></li>
														<?php endforeach; ?>
													</ul>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>

									</ul>
								<?php endif; ?>
							</li>
						<?php endforeach; ?>
					</ul>

				</nav>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('.dropdown-submenu a').on("click", function(e) {
			var submenu = $(this).next('.dropdown-menu');
			if (submenu.is(':visible')) {
				submenu.hide();
			} else {
				submenu.show();
			}
			e.stopPropagation();
			e.preventDefault(); // Prevents the link from being followed
		});
	});
</script>