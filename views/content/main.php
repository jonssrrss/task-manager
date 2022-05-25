<div class="content">
    <p class="info">
        <span>Список задач:</span>
        <a href="/new">Новая задача</a>
    </p>

    <? require_once(ROOT.'/views/content/filter.php'); ?>
    
    <?=$pagination;?>

    <?=$taskListHtml;?>

    <?=$pagination;?>

</div>