<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="heading-module l-flex">
	<div class="heading-module-inner l-flex">
		<i class="fa fa-shopping-basket"></i><h1>Lapak <?= ucwords($this->setting->sebutan_desa); ?></h1>
	</div>
</div>
<div class="lapak box-def">
	<div class="box-def-inner">
		<form method="get" class="form-inline text-center" id="filter">
			<div class="row">
				<div class="col-sm-12">
					<select class="form-control select2" id="id_kategori" name="id_kategori" onchange="$('#filter').submit();">
						<option selected value="">Semua Kategori</option>
						<?php foreach ($kategori as $kategori_item) : ?>
							<option value="<?= $kategori_item->id ?>" <?= selected($id_kategori, $kategori_item->id) ?>><?= $kategori_item->kategori ?></option>
						<?php endforeach; ?>
					</select>
					<input type="text" name="keyword" maxlength="50" class="form-control" value="<?= $keyword; ?>" placeholder="Cari Produk">
					<button type="submit" class="btn btn-primary btn-sm">Cari</button>
					<?php if ($keyword): ?>
						<a href="<?=site_url('lapak')?>" class="btn btn-info btn-sm">Tampilkan Semua</a>
					<?php endif ?>
				</div>
			</div>
		</form>
		<?php if ($produk): ?>
			<div class="row-custom mlr-min5 mt-20">
				<?php foreach ($produk as $in => $pro): ?>
				<?php $foto = json_decode($pro->foto); ?>
				<div class="column-4 box-def">
					<div class="box-def-inner2">
						<?php if ($pro->foto): ?>
							<div class="carousel js-flickity" data-flickity='{ "autoPlay": false, "cellAlign": "left"}'>
								<?php for ($i = 0; $i < $this->setting->banyak_foto_tiap_produk; $i++): ?>
									<?php if ($foto[$i]): ?>
									<div class="carousel-col">
									<div class="item <?= jecho($i, 0, 'active'); ?>">
										<div class="image-slider2">
										<?php if (is_file(LOKASI_PRODUK . $foto[$i])): ?>
											<img src="<?= base_url(LOKASI_PRODUK . $foto[$i]); ?>" alt="Foto <?= ($i+1); ?>">
										<?php else: ?>
											<img src="<?= theme_asset("images/pengganti.jpg") ?>"/>
										<?php endif; ?>
										</div>
									</div>
									</div>
									<?php endif; ?>
								<?php endfor; ?>
							</div>
						<?php else: ?>
							<div class="image-slider2"><img src="<?= theme_asset("images/pengganti.jpg") ?>"/></div>
						<?php endif; ?>
						<div class="lapak-detail">
							<h2><?= $pro->nama; ?></h2>
							<?php $harga_potongan = ($pro->tipe_potongan == 1) ? ($pro->harga * ($pro->potongan / 100)) : $pro->potongan; ?>
							<div class="c-flex">
								<div>
								<?php if ($pro->potongan != 0): ?>
									<h3 style="text-decoration: line-through red;color:#ff0000;"><?= rupiah($pro->harga); ?></h3>
								<?php endif; ?>
								<h3 style="color:#009a0a;"><b><?= rupiah($pro->harga - $harga_potongan); ?></b></h3>
								</div>
							</div>
							<p style="margin:10px 0;"><?= nl2br($pro->deskripsi); ?></p>
							<div class="c-flex"><i class="fa fa-user" style="margin:0 5px 0 0;opacity:0.6;"></i><p><?= $pro->pelapak; ?></p></div>
							<div class="c-flex" style="margin:10px 0 5px;">
								<?php if ($pro->telepon): ?>
									<?php $pesan = strReplaceArrayRecursive(['[nama_produk]' => $pro->nama, '[link_web]' => base_url('lapak'), '<br />' => "%0A"], nl2br($this->setting->pesan_singkat_wa)); ?>
									<a style="margin:0 3px;" class="btn btn-sm btn-success" href="https://api.whatsapp.com/send?phone=<?=format_telpon($pro->telepon); ?>&amp;text=<?= $pesan; ?>" rel="noopener noreferrer" target="_blank" title="WhatsApp"><i class="fa fa-whatsapp"></i> Beli</a>
								<?php endif; ?>
								<a style="margin:0 3px;" class="btn btn-sm btn-primary" data-remote="false" data-toggle="modal" data-target="#map-modal" title="Lokasi" data-lat="<?= $pro->lat?>" data-lng="<?= $pro->lng?>" data-zoom="<?= $pro->zoom?>" data-title="Lokasi Pelapak (<?= $pro->pelapak?>)"><i class="fa fa fa-map"></i> Lokasi</a>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			
			<?php theme_view("commons/pagination"); ?>

			<div class='modal fade' id="map-modal" tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
				<div class='modal-dialog'>
					<div class='modal-content'>
						<div class='modal-header'>
							<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
							<h4 class='modal-title'></h4>
						</div>
						<div class="modal-body"></div>
					</div>
				</div>
			</div>
		<?php else: ?>
			<div class="box-def hoverstyle">
				<div class="emptydata c-flex">
					<div>
					<svg viewBox="0 0 24 24"><path d="M13 13H11V7H13M11 15H13V17H11M15.73 3H8.27L3 8.27V15.73L8.27 21H15.73L21 15.73V8.27L15.73 3Z" /></svg>
					<p>Mohon maaf, untuk saat ini data belum tersedia...!</p>
					</div>
				</div>
			</div>
		<?php endif ?>
	</div>
</div>

<script type="text/javascript">
	var map_key = "<?= $this->setting->mapbox_key; ?>";

	$(document).ready(function() {
		$(document).on('shown.bs.modal','#map-modal', function(event) {
			let link = $(event.relatedTarget);
			let title = link.data('title');
			let modal = $(this);
			modal.find('.modal-title').text(title);
			modal.find('.modal-body').html("<div id='map' style='width: 100%;'></div>");

			let posisi = [link.data('lat'), link.data('lng')];
			let zoom = link.data('zoom');
			let logo = L.icon({
				iconUrl: "<?= setting('icon_lapak_peta') ?>",
			});
			
			$("#lat").val(link.data('lat'));
			$("#lng").val(link.data('lng'));

			pelapak = L.map('map').setView(posisi, zoom);
			getBaseLayers(pelapak, map_key);
			pelapak.addLayer(new L.Marker(posisi, {icon:logo}));
		});
	});
</script>