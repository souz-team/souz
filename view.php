<?php
header('Content-Type: text/html; charset=utf-8');
require('config.php');
//require '/func/db.php';
?>
<?php
	require_once 'blocks/header.php'; ?>
	<section class="section section_1 section_content">
		<div class="section__wrap">
			<div class="section-1">
				<div class="section-1__menu">
					<?php
						$id = $_GET['id'];	
						$_SESSION['idfont']=$id;
						require_once "menu.php";						
					?>
				</div>
				<div class="section-1__list-link">
					<ul class="lu-link">
						<?php
						//переменная, задающая количество сообщений, выводимых на странице
						$per_page = 5;
						//вычисляем номер страницы
						if (isset($_GET['page'])) {
							$page = $_GET['page'] -1;
						} else {
							$page = 0;
						}
						//вычисляем значение переменной, с которой начнется считывание с бд
						$start = abs($page*$per_page);	
						$n=$start;
						//$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link));
						$result = Show_Articles ($link, $id, $start, $per_page);
						//print_r($result);
						if ($result==0){
							echo "В этом подразделе нет статей!";
							//echo $id;
							//echo $result;
						} else {
							for ($i=0; $i<count($result); $i++) {
								++$n;
								echo "<li class='li-link'>$n. <a  class='form-auth__link-signup' href='article.php?id={$result[$i]['id']}'>".$result[$i]['Name']."</a></li>";
							}
						}							
						$total_rows = Count_Articles($link, $id);
						$num_pages = ceil($total_rows/$per_page); // получится страниц
						
					?>
					</ul>
					 <div class='pagination'> 
						<?php for($i=1; $i<=$num_pages; $i++) { ?>
							<?php if ($i-1 == $page) { ?>
								<?= $i ?>
							<?php } else { ?>
							<a href='<?= $_SERVER[PHP_SELF] ?>?id=<?= $id ?>&page=<?= $i ?>'>[<?= $i?>]</a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>			
			</div>
		</div>
	</section>		
<?php require_once 'blocks/footer.php'; ?>