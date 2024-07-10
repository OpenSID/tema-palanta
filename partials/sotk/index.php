<link rel="stylesheet" href="<?= asset('css/bagan.css') ?>">
<div class="box-def">
    <div class="box-def-inner">
        <div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
            <h1>Struktur Organisasi dan Tata Kerja <?= setting('sebutan_pemerintah_desa') ?></h1>
        </div>
        <center>
        <figure class="highcharts-figure" style="max-width: 100%;">
        <div id="container"></div>
            <p class="highcharts-description"></p>
        </figure>
        </center>
    </div>
</div>
<?php include APPPATH . 'views/bagan/chart_bagan.php'; ?>