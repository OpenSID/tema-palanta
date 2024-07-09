<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="headerweb-area">
	<div class="container-custom">
		<div class="headerweb l-flex">
			<a class="l-flex" href="<?= site_url(); ?>">
				<div class="logoweb l-flex">
					<img src="<?= gambar_desa($desa['logo']); ?>" />
					<div>
						<h1><?= ucwords($this->setting->sebutan_desa); ?> <?= ucwords(($desa['nama_desa']) ? ' ' . $desa['nama_desa'] : ''); ?></h1>
						<p><?= ucwords($this->setting->sebutan_kecamatan_singkat . " " . $desa['nama_kecamatan']) ?>, <?= ucwords($this->setting->sebutan_kabupaten_singkat . " " . $desa['nama_kabupaten']) ?><br /><?= ucwords("Prov. " . $desa['nama_propinsi']) ?></p>
					</div>
				</div>
			</a>
			<div class="desk-v headerweb-right r-flex">
				<div>
					<div id="tanggal"></div>
					<div class="r-flex">
						<?php if ($desa['telepon']) : ?>
							<div class="top-contact l-flex">
								<i class="fa fa-phone"></i>
								<p><?= ucwords(" " . $desa['telepon']) ?></p>
							</div>
						<?php endif ?>
						<?php if ($desa['email_desa']) : ?>
							<div class="top-contact l-flex">
								<i class="fa fa-envelope"></i>
								<p><?= ucwords(" " . $desa['email_desa']) ?></p>
							</div>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="desk-v headright-bot r-flex">
		<form method=get action="<?= site_url(); ?>">
			<div class="formsearch r-flex">
				<input type="text" name="cari" maxlength="50" class="form-control" value="<?= $cari ?>" placeholder="Cari Artikel">
				<button type="submit" class="btn btn-success btn-sm" style="margin:0;"><i class="fa fa-search" style="opacity:0.6;"></i></button>
			</div>
		</form>
		<a href="<?= site_url('layanan-mandiri/masuk') ?>"><button class="btn btn-primary btn-sm">Layanan Mandiri</button></a>
		<a href="<?= site_url('siteman') ?>"><button class="btn btn-danger btn-sm">Login</button></a>
	</div>
</div>
<div class="relative">
	<div class="desk-v menuweb-container">
		<nav class="menu">
			<ul class="menuweb">
				<li class="bghome" style="margin-left:-10px;padding:0 15px;font-size:140%;"><a href="<?= site_url(); ?>"><i class="fa fa-home"></i></a></li>
				<?php foreach (menu_tema() as $data) : ?>
					<?php $this->load->view("$folder_themes/partials/sub_menu", ['data' => $data]); ?>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
	<?php if (!empty($teks_berjalan)) : ?>
		<div class="text-run">
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
				<?php foreach ($teks_berjalan as $teks) : ?>
					<span>
						<?= $teks['teks'] ?>
						<?php if ($teks['tautan']) : ?>
							<a href="<?= $teks['tautan'] ?>" rel="noopener noreferrer" title="Baca Selengkapnya"><?= $teks['judul_tautan'] ?></a>
						<?php endif; ?>
					</span>
				<?php endforeach ?>
			</marquee>
		</div>
	<?php endif ?>

</div>

<div class="headerweb-mobile l-flex">
	<div class="icon-menumobile c-flex" onclick="menuOpen()">
		<svg viewBox="0 0 24 24">
			<path d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
		</svg>
	</div>
</div>
<div id="openmenu" class="menupanel">
	<div class="menupanel-inner">
		<?php $this->load->view("$folder_themes/partials/mobilemenu"); ?>
		<a href="javascript:void(0)" onclick="menuClose()">
			<div class="close-menu c-flex">
				<svg viewBox="0 0 24 24">
					<path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z" />
				</svg>
			</div>
		</a>
	</div>
</div>

<script>
	function menuOpen() {
		document.getElementById("openmenu").style.width = "100%";
	}

	function menuClose() {
		document.getElementById("openmenu").style.width = "0";
	}
</script>

<script>
	var tw = new Date();
	if (tw.getTimezoneOffset() == 0)(a = tw.getTime() + (7 * 60 * 60 * 1000))
	else(a = tw.getTime());
	tw.setTime(a);
	var tahun = tw.getFullYear();
	var hari = tw.getDay();
	var bulan = tw.getMonth();
	var tanggal = tw.getDate();
	var hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jum'at,", "Sabtu,");
	var bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "Nopember", "Desember");
	document.getElementById("tanggal").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
</script>