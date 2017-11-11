<form id='search' method='post'>
    <input type='search' name='search' placeholder='Поиск по базе' value = <?=htmlentities(mysql_real_escape_string($_POST['search']), ENT_QUOTES, 'UTF-8')?>>
	
    <button type='submit'> Найти </button> 
</form>