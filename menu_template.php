<li class='list-sections__item'>

	<?php
		// Класс зависит от уровня вложенности.
		// Если раздел корневой, то list-sections__item-title
		// Если имеет родителя, то list-sections__subitem-title
		// Разные классы необходимы для дизайна
		$classes = $menu['P_id'] == "0" ? 'list-sections__item-title' : 'list-sections__subitem-title';
	?>

    <a href="view.php?id=<?= $menu['id'] ?>" class='<?= $classes ?>'><?= $menu['Name'] ?></a>
    <?php if($menu['childs']): ?>
        <ul class='list-sections__subsections'>
            <?= menu_to_string($menu['childs']) ?>
        </ul>
    <?php endif; ?>
</li>