<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="share">
	<div class="btn-list">
		<a name="fb_share" href="http://www.facebook.com/sharer.php?u=<?= $link; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Facebook'><button type="button" class="btn btn-icon btn-fb"><i class="fa fa-facebook"></i></button></a>
        <a href="http://twitter.com/share?source=sharethiscom&text=<?= $judul; ?>%0A&url=<?= $link .'&via=opensid'?>" class="twitter-share-button" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Twitter'><button type="button" class="btn btn-icon btn-twit"><i class="fa fa-twitter"></i></button></a>
		<a href="mailto:?subject=<?= $judul; ?>&body=<?= potong_teks($single_artikel["isi"], 1000); ?> ... Selengkapnya di <?= $link; ?>" title='Email'><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-envelope"></i></button></a>
		<a href="https://telegram.me/share/url?url=<?= $link; ?>&text=<?= $judul; ?>%0A" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Telegram'><button type="button" class="btn btn-icon btn-telegram"><i class="fa fa-telegram"></i></button></a>
		<a href="https://api.whatsapp.com/send?text=<?= $judul; ?>%0A<?= $link; ?>" onclick='window.open(this.href,"popupwindow","status=0,height=500,width=500,resizable=0,top=50,left=100");return false;' rel='noopener noreferrer' target='_blank' title='Whatsapp'><button type="button" class="btn btn-icon btn-wa"><i class="fa fa-whatsapp"></i></button></a>
		<a href="#" onclick="printDiv('printableArea')" title='Cetak Artikel'><button type="button" class="btn btn-icon btn-print"><i class="fa fa-print"></i></button></a>
	</div>
</div>