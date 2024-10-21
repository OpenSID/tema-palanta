<style>
.submenu {
    height: max-content;
    width: max-content;
}
.submenu-link{
    display: inline-flex;
}
.subsub-link>a{
    padding: 8px;
}
.subsub-link {
    display: none;
}

</style>
<?php if(count($data['childrens'] ?? []) > 0): ?>
    <li class="with-submenu">
        <a href="<?= $data['link_url']?>"><?= $data['nama'];
            if(count($data['childrens'] ?? []) > 0): ?>
                <i class="fa fa-caret-down"></i>
            <?php endif; ?>
        </a>
        <ul class="submenu">
            <?php foreach($data['childrens'] as $submenu): ?>
                <?php if(count($submenu['childrens'] ?? []) > 0): ?>
                    <li class="submenu-link">
                        <a href="<?= $submenu['link_url']?>"><?= $submenu['nama'];
                        if(count($submenu['childrens'] ?? []) > 0): ?>
                            <i class="fa fa-caret-down"></i>
                        <?php endif; ?>
                        </a>
                        <ul class="">
                            <?php foreach($submenu['childrens'] as $submenub): ?>
                                <?php if(count($submenub['childrens'] ?? []) > 0): ?>
                                    <li class="with-submenu subsub-link">
                                        <a href="<?= $submenub['link_url']?>"><?= $submenub['nama'];
                                        if(count($submenub['childrens'] ?? []) > 0): ?>
                                            <i class="fa fa-caret-down"></i>
                                        <?php endif; ?>
                                        </a>
                                        <ul class="">
                                            <?php foreach($submenub['childrens'] as $submenubb): ?>
                                                <li class="subsub-link"><a href="<?= $submenubb['link_url']?>"><?= $submenubb['nama']?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                <?php else: ?>
                                    <li class="subsub-link"><a href="<?= $submenub['link_url']?>"><?= $submenub['nama']?></a></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="submenu-link"><a href="<?= $submenu['link_url']?>"><?= $submenu['nama']?></a></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </li>
<?php else: ?>
    <li><a href="<?= $data['link_url']?>"><?= $data['nama']?></a></li>
<?php endif; ?>
<script>
$(document).ready(function() {
    $(".submenu-link").hover(function() {
        $(".subsub-link").css("display", "grid");
    }, function() {
        $(".subsub-link").css("display", "none");
    });
});
</script>