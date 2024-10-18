<div style="padding-left: 15px; padding-right: 15px; display: flex; flex-wrap: wrap; gap: 25px; justify-content: space-evenly;">
    <?php foreach ($widgets as $item): ?>
        <div class="row" style="padding: 15px; background-color: <?= $item['bg-color'] ?>;">
            <div class="col-xs-2 text-center" style="font-size: 40px;">
                <i class="ion <?= $item['icon'] ?>"></i>
            </div>
            <div class="col-xs-10">
                <p class="text-muted"><?= $item['title'] ?></p>
                <p style="font-size: 30px;"><?= $item['total'] ?></p>
            </div>
        </div>
    <?php endforeach ?>
</div>