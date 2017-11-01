<li class='list-sections__item'>
    <a href="view.php?id=<?=$menu['id']?>"><?=$menu['Name']?></a>
    <?php if($menu['childs']):?>
    <ul class='list-sections__subsections'>
        <?php echo menu_to_string($menu['childs']); ?>
    </ul>
    <?php endif; ?>
</li>