<div class="box-def">
    <div class="box-def-inner">
        <div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
            <h1>Data <?= $judul ?></h1>
        </div>
        
        <div class="table-responsive">
            <table id="inventaris" class="table table-bordered table-hover">
                <thead class="bg-gray">
                    <tr>
                        <th class="text-center" rowspan="2">No</th>
                        <th class="text-center" rowspan="2">Nama Barang</th>
                        <th class="text-center" rowspan="2">Fisik Bangunan (P, SP, D)</th>
                        <th class="text-center" rowspan="2">Luas (M<sup>2</sup>)</th>
                        <th class="text-center" colspan="2">Dokumen</th>
                        <th class="text-center" rowspan="2">Tgl,bln,thn Mulai</th>
                        <th class="text-center" rowspan="2">Status Tanah</th>
                        <th class="text-center" rowspan="2">Asal Usul Biaya</th>
                        <th class="text-center" rowspan="2">Nilai Kontrak (Rp)</th>
                    </tr>
                    <tr>
                        <th class="text-center" rowspan="1">Tanggal</th>
                        <th class="text-center" rowspan="1">Nomor</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($main as $data) : ?>
                        <tr>
                            <td></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->kondisi_bangunan; ?></td>
                            <td><?= (empty($data->luas_bangunan)) ? '-' : $data->luas_bangunan ?></td>
                            <td><?= (date('d M Y', strtotime($data->tanggal_dokument)) === '') ? '-' : date('d M Y', strtotime($data->tanggal_dokument)) ?></td>
                            <td><?= (empty($data->no_dokument)) ? '-' : $data->no_dokument ?></td>
                            <td nowrap><?= (date('d M Y', strtotime($data->tanggal)) === '') ? '-' : date('d M Y', strtotime($data->tanggal)) ?></td>
                            <td><?= (empty($data->status_tanah)) ? '-' : $data->status_tanah ?></td>
                            <td><?= $data->asal; ?></td>
                            <td class="text-right"><?= number_format($data->harga, 0, '.', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (count($main) > 0) : ?>
                    <tfoot>
                        <tr>
                            <th colspan="9" class="text-right">Total:</th>
                            <th class="text-right"><?= number_format($total, 0, '.', '.'); ?></th>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?php theme_view("partials/inventaris/script") ?>