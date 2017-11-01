<?php
$cur_url = $_SERVER['REQUEST_URI'];
$urls = explode('/', $cur_url);
 
$crumbs = array();
 
if (!empty($urls) && $cur_url != '/') {
    foreach ($urls as $key => $value) {
        $prev_urls = array();
        for ($i = 0; $i <= $key; $i++) {
            $prev_urls[] = $urls[$i];
        }
        if ($key == count($urls) - 1)
            $crumbs[$key]['url'] = '';
        elseif (!empty($prev_urls))
            $crumbs[$key]['url'] = count($prev_urls) > 1 ? implode('/', $prev_urls) : '/';
 
        switch ($value) {
            case 'feedback.php' : $crumbs[$key]['text'] = 'Обратная связь';
                break;
            case 'contact.php' : $crumbs[$key]['text'] = 'Контакты';
                break;
            case 'forum.php' : $crumbs[$key]['text'] = 'Форум';
                break;
            default : $crumbs[$key]['text'] = 'Главная страница';
                break;
        }
    }
}
?>