<form id='search' method='post'>
    <input class= "table-input-info__textfield table-input-info__textfield_cusearch" type='search' name='search' placeholder='Поиск по базе' value = <?=htmlentities(mysql_real_escape_string($_POST['search']), ENT_QUOTES, 'UTF-8')?>>
	
    <button class = "button button_cu-search" type='submit'> Найти </button> 
</form>