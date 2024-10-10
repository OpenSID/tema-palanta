<div class="box-def">
    <div class="box-def-inner">
        <div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
            <h1><?= $title ?></h1>
        </div>
        <form class="form form-horizontal" action="" method="get">
            <div class="row mb-10" style="margin: 0 30px;">
                <div style="display: flex; flex-wrap: wrap; justify-content: flex-end;">
                    <div class="form-group" style="flex: 1;">
                        <select name="kuartal" id="kuartal" required class="form-control input-sm" style="width: 70%; height: 33px;" title="Pilih salah satu">
                            <?php foreach (kuartal2() as $item): ?>
                                <option value="<?= $item['ke'] ?>" <?= $item['ke'] == $kuartal ? 'selected' : '' ?>>
                                    Kuartal ke <?= $item['ke'] ?>
                                    (<?= $item['bulan'] ?>)
                                </option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group" style="flex: 1;">
                        <select name="tahun" id="tahun" class="form-control input-sm" style="width: 70%; height: 33px;" title="Pilih salah satu">
                            <?php foreach ($dataTahun as $item): ?>
                                <option value="<?= $item->tahun ?>"><?= $item->tahun ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="form-group" style="flex: 1;">
                        <select name="id_posyandu" class="form-control input-sm" style="width: 70%; height: 33px;" title="Pilih salah satu">
                            <option value="">Semua</option>
                            <?php foreach ($posyandu as $item): ?>
                                <option value="<?= $item->id ?>" <?= $item->id == $idPosyandu ? 'selected' : '' ?>>
                                    <?= $item->nama ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-info btn-sm" id="cari">
                            <i class="fa fa-search"></i> Cari
                        </button>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <div class="box-body text-sm py-2 space-y-4">
        <?php $this->load->view($folder_themes . '/partials/kesehatan/widget'); ?>
        <hr>
        <?php $this->load->view($folder_themes . '/partials/kesehatan/chart_stunting_umur'); ?>
        <hr>
        <?php $this->load->view($folder_themes . '/partials/kesehatan/chart_stunting_posyandu'); ?>
        <hr>
        <?php $this->load->view($folder_themes . '/partials/kesehatan/scorecard', $scorecard); ?>
    </div>
</div>