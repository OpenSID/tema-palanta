<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<!-- ?php
    if (!is_null($transparansi)) {
        $this->load->view("$folder_themes/partials/apbdesa-tema", $transparansi);
    }
?> -->

<div class="footer_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInRight">
                    <h2><?= ucwords($this->setting->sebutan_desa." ")?> <?= ucwords($desa['nama_desa'])?></h2>
                    <p><?= $desa['alamat_kantor']?><br><?= ucwords($this->setting->sebutan_kecamatan." ".$desa['nama_kecamatan'])?> <?= ucwords($this->setting->sebutan_kabupaten." ".$desa['nama_kabupaten'])?> Provinsi <?= $desa['nama_propinsi']?> Kode Pos <?= $desa['kode_pos']?></p>
                    <p><?php if (!empty($desa['email_desa'])): ?>Email: <?= $desa['email_desa']?><?php endif; ?><br /><?php if (!empty($desa['telepon'])): ?>Telp: <?= $desa['telepon']?><?php endif; ?></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInDown">
                    <h2>Kategori</h2>
                    <ul class="labels_nav">
                    <?php foreach ($menu_kiri as $data): ?>
                        <li><li><a href="<?= site_url("artikel/kategori/$data[slug]"); ?>"><?= $data['kategori']; ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="single_footer_top wow fadeInRight">
                    <?php if (setting('tte')): ?>
                        <img src="<?= asset('assets/images/bsre.png?v', false); ?>" alt="Bsre" class="img-responsive" style="width: 185px;" />
                    <?php endif ?>
                    <?php foreach ($sosmed as $data): ?>
                        <?php if (! empty($data["link"])): ?>
                            <a href="<?= $data['link']?>" rel="noopener noreferrer" target="_blank">
                                <img src="<?= $data['icon'] ?>" alt="<?= $data['nama'] ?>" style="width:50px;height:50px;"/>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
