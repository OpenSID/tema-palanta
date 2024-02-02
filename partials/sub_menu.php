<?php if(count($data['childrens']) > 0): ?>
    <li class="with-submenu">
        <a href="<?= $data['link']?>"><?= $data['nama'];
            if(count($data['childrens'] ?? []) > 0): ?>
                <span class='caret'></span>
            <?php endif; ?>
        </a>
        <ul class="submenu">
            <?php foreach($data['childrens'] as $submenu): ?>
                <?php $this->load->view("$folder_themes/partials/sub_menu", ['data' => $submenu]); ?>
            <?php endforeach; ?>
        </ul>
    </li>
<?php else: ?>
    <li><a href="<?= $data['link']?>"><?= $data['nama']?></a></li>
<?php endif; ?>