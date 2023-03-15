<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>


<?php if ($paging->num_rows > $paging->per_page): ?>	
	<div class="card-body c-flex">
		<div style="text-align:center;">
		<p style="font-size:95%;margin:5px 0;">Halaman <?= $paging->page ?> dari <?= $paging->end_link ?></p>
		<ul class="pagination mg-b-0 page-0 ">
			<?php if ($paging->start_link): ?>
                <li class="page-item">
				<a aria-label="Last" class="page-link" href="<?= site_url("$paging_page/$paging->start_link" . $paging->suffix); ?>" title="Halaman Pertama"><i class="fa fa-angle-double-left"></i></a>
				</li>
            <?php endif; ?>
			<?php if ($paging->prev): ?>
                <li class="page-item">
				<a aria-label="Next" class="page-link" href="<?= site_url("$paging_page/$paging->prev" . $paging->suffix); ?>" title="Halaman Sebelumnya"><i class="fa fa-angle-left"></i></a>
				</li>
            <?php endif; ?>
			<?php for ($i=$paging->start_link; $i<=$paging->end_link; $i++): ?>
                <li class="page-item <?php ($paging->page != $i) or print('active'); ?>">
				<a class="page-link" href="<?=site_url("$paging_page/$i" . $paging->suffix); ?>" title="<?= 'Halaman ' . $i ?>"><?= $i ?></a>
				</li>
            <?php endfor; ?>
			<?php if ($paging->next): ?>
                <li class="page-item">
				<a aria-label="Next" class="page-link" href="<?= site_url("$paging_page/$paging->next" . $paging->suffix); ?>" title="Halaman Selanjutnya"><i class="fa fa-angle-right"></i></a></li>
            <?php endif; ?>
			<?php if ($paging->end_link): ?>
                <li class="page-item">
				<a aria-label="Last" class="page-link" href="<?= site_url("$paging_page/$paging->end_link" . $paging->suffix); ?>" title="Halaman Terakhir"><i class="fa fa-angle-double-right"></i></a>
				</li>
            <?php endif; ?>
		</ul>
		</div>
	</div>
<?php endif; ?>
