<div class="box-def">
    <div class="box-def-inner">
        <div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
            <h1>Data <?= $judul ?></h1>
        </div>
        
        <div class="table-responsive">
            <table id="inventaris" class="table table-bordered dataTable table-hover">
                <thead class="bg-gray">
                    <tr>
                        <th class="text-center" rowspan="2">No</th>
                        <th class="text-center" rowspan="2">Nama Barang</th>
                        <th class="text-center" rowspan="2">Kode Barang / Nomor Registrasi</th>
                        <th class="text-center" rowspan="2">Merk/Type</th>
                        <th class="text-center" rowspan="2">Tahun Pembelian</th>
                        <th class="text-center" colspan="2">Nomor</th>
                        <th class="text-center" rowspan="2">Asal Usul</th>
                        <th class="text-center" rowspan="2">Harga (Rp)</th>
                    </tr>
                    <tr>
                        <th class="text-center" rowspan="1">Polisi</th>
                        <th class="text-center" rowspan="1">BPKB</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($main as $data) : ?>
                        <tr>
                            <td></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->kode_barang; ?><br><?= $data->register; ?></td>
                            <td><?= $data->merk; ?></td>
                            <td><?= $data->tahun_pengadaan; ?></td>
                            <td><?= (empty($data->no_polisi)) ? '-' : $data->no_polisi ?></td>
                            <td><?= (empty($data->no_bpkb)) ? '-' : $data->no_bpkb ?></td>
                            <td><?= $data->asal; ?></td>
                            <td><?= number_format($data->harga, 0, '.', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (count($main) > 0) : ?>
                    <tfoot>
                        <tr>
                            <th colspan="8" class="text-right">Total:</th>
                            <th><?= number_format($total, 0, '.', '.'); ?></th>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?php theme_view("partials/inventaris/script") ?>