<div class="box-def">
    <div class="box-def-inner">
        <div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
            <h1>Data <?= $judul ?></h1>
        </div>
        
        <div class="table-responsive">
            <table id="inventaris" class="table table-bordered dataTable table-hover">
                <thead class="bg-gray">
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Barang</th>
                        <th class="text-center">Kode Barang / Nomor Registrasi</th>
                        <th class="text-center">Luas (M<sup>2</sup>)</th>
                        <th class="text-center">Tahun Pengadaan</th>
                        <th class="text-center">Letak/Alamat</th>
                        <th class="text-center">Nomor Sertifikat</th>
                        <th class="text-center">Asal Usul</th>
                        <th class="text-center">Harga (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($main as $data) : ?>
                        <tr>
                            <td></td>
                            <td><?= $data->nama_barang; ?></td>
                            <td><?= $data->kode_barang; ?><br><?= $data->register; ?></td>
                            <td><?= $data->luas; ?></td>
                            <td><?= $data->tahun_pengadaan; ?></td>
                            <td><?= $data->letak; ?></td>
                            <td><?= $data->no_sertifikat; ?></td>
                            <td><?= $data->asal; ?></td>
                            <td><?= number_format($data->harga, 0, '.', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (count($main) > 0) : ?>
                    <tfoot>
                        <tr>
                            <th colspan="8" class="text-right">Total:</th>
                            <th class="text-right"><?= number_format($total, 0, '.', '.'); ?></th>
                        </tr>
                    </tfoot>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
<?php theme_view("partials/inventaris/script") ?>