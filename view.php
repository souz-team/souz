<?php
header('Content-Type: text/html; charset=utf-8');
require('config.php');
//require '/func/db.php';
?>
		<?php
			
		require_once 'blocks/header.php'; ?>
      	<section class="section section_1">
			<div class="section__wrap">
				<div class="section-1">
						<?php
						$id = $_GET['id'];	
						$_SESSION['idfont']=$id;
						require_once "menu.php"; ?>
					<div class="section-1__list-link">
						<ul class="lu-link">
							<?php
							$id = $_GET['id'];
							
							$n=0;
							$link = mysqli_connect($host, $login, $pswrd, $db_name) or die("Ошибка " . mysqli_error($link));
							$result = Show_Articles ($link, $id);
									if ($result==0)
										{
											echo "В этом подразделе нет статей!";
											//echo $id;
											//echo $result;
										}
										else
										{
											
											for ($i=0; $i<count($result); $i++)
											{
												$n=$i+1;
												echo "<li class='li-link'>$n. <a  class='form-auth__link-signup' href='article.php?id={$result[$i]['id']}'>".$result[$i]['Name']."</a></li>";
											}
										}	
								mysql_close();
						?>
						</ul>
					</div>
				</div>
			</div>
		</section>		
		<?php require_once 'blocks/footer.php'; ?>