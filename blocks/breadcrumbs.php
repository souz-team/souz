<?php
//require_once 'config.php';
//require_once '/func/db.php';
?>
<section class="section section_breadcrumbs">
	<div class="section__wrap">
		<div class="section-breadcrumbs">
			<ul class="breadcrumbs">
				<!--<li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">Раздел 1</a></li>-->
                

<?php       
$menu = get_menu();
$menu_tree = map_tree($menu);
$menu_razdel = menu_to_string($menu_tree);
// ID подразделов
$ids = podrazdel_id($menu, $id);
$ids = !$ids ? $id : rtrim($ids, ","); 
       
$articles = get_articles($ids);


if (isset($_GET['id'])){
    $id = (int)$_GET['id'];
    //хлебные крошки
    $breadcrumbs_array = breadcrumbs($menu,$id);
    
}

if ($breadcrumbs_array){
    $breadcrumbs = "<a href='index.php'>Главная страница</a> / ";
    foreach($breadcrumbs_array as $id => $Name){
    $breadcrumbs .= "<a href = '?id=$id'>$Name</a> / ";
    }
    $breadcrumbs = rtrim($breadcrumbs, ' / ');
    $breadcrumbs = preg_replace("#(.+)?<a.+>(.+)</a>$#", "$1$2", $breadcrumbs);
} else {
    $breadcrumbs = "<a href='index.php'>Главная страница</a> ";
}

?>

<p><?=$breadcrumbs;?></p>
</li>
				<!--<li class="breadcrumbs__item"><a href="#" class="breadcrumbs__link">Подраздел 1</a></li>
                <li class="breadcrumbs__item">Статья</li>-->
			</ul>
		</div>
	</div>
</section>
