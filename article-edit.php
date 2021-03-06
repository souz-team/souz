<?php require 'config.php';
if ($_SESSION['userlevel']!=1 AND $_SESSION['userlevel']!=2)
{
	header('Location: /');
	exit;
}
?>
<?php
if (isset($_POST['do_edit_article']))
{
	require "articleEdit.php";
}
require_once 'blocks/header.php';

?>
<section class="section section_content">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title">Редактирование статьи</p>
				<div style="color: red; text-align:center;"><br><?=$all?></div>
				
				<?php
				
				if (isset($_GET['artId'])){
					$artId = $_GET['artId'];
				}
				if (isset($_GET['podrazdelId'])){
				$podrazdelId = $_GET['podrazdelId'];
				}
				
				$queryArticle =mysql_query("SELECT id, id_Podrazdel, Name, Image_url, Text FROM Articles WHERE id = '$artId'");
				$row = mysql_fetch_assoc($queryArticle);
				$previousImageUrl = $row['Image_url'];
				?>
				
				<div class="new-material__form">
					<form action="#" method="post" class="form-new-material" ENCTYPE="multipart/form-data">
					
					<input type="hidden" name = "id" value="<?=$artId?>">
					<input type="hidden" name = "previousimageurl" value="<?=$previousImageUrl?>">
						<label class="form-new-material__row">
							<p class="form-new-material__label">Название</p>
							<input type="text" name="articleName" value="<?echo $row['Name']?>" class="form-new-material__textfield">
						</label>

						<div class="form-new-material__row form-new-material__row_selects">
							<div class="form-new-material__wrap-select">
								<p class="form-new-material__label">Подраздел</p>
								<select class='form-new-material__select' name="id_Podrazdel"> 
								<?
									$optionList = "";
									$lastParentId = "THIS_PARAM_MUST_BE_INTEGER";
									$razdel_query = mysql_query ("SELECT a.id as parentId, a.Name as parentName, b.id as childId, b.Name as childName FROM Razdel a, Razdel b WHERE b.P_id=a.id and a.P_id=0 ORDER BY a.Name, a.id");
									while ($row2 = mysql_fetch_assoc($razdel_query)) {
										$parentId   = $row2['parentId'];
										$parentName = $row2['parentName'];
										$childId    = $row2['childId'];
										$childName  = $row2['childName'];
										if( $lastParentId != $parentId ) {
											$lastParentId = $parentId;
											$optionList .= "<option disabled>$parentName</option>";
										}
										$isSelected = ($childId == $row['id_Podrazdel'])?'selected':'';
										$optionList .= "<option $isSelected value=\"$childId\">&nbsp;&nbsp;&nbsp;&nbsp;$childName</option>";
									}
									echo $optionList;
									
								?>
								</select>
							</div>
						</div>
						
						<label class="form-new-material__row">
							<p class="form-new-material__label">Текст статьи</p>
							<textarea name="articleText" class="form-new-material__textarea"><?echo $row['Text']?></textarea>
						</label><br>
						
						 Выберите файл для загрузки размером не меньше 315х230 формат:jpeg/png/gif
						 <div style="color: red; text-align:center;"><br><?=$err_f?></div>
							<input type="file" name="userfile" /><br><br>
						
						<?php
							if ($row['Image_url'] !='' && file_exists($row['Image_url'])){
								echo "Оставьте текущее изображение или";
						?>
						
							<br>
							<a href="/image-delete.php?deleteImage=<?= $row['id']?>" ><div class="button button_cancel">Удалите изображение</div></a>
							<br><br>
							
						<?}?>
						<img src="<?= $row['Image_url'] ?>" width='100'/>
						<div class="form-new-material__row form-new-material__row_buttons">
							<a href="/manage-articles.php?id=<?=$podrazdelId?>&artID=<?=$artId?>">
								<button class="button button_cancel">Отмена
								</button>
							</a>
							<button class="button button_default" name="do_edit_article">Изменить</button>
							
						</div>
									

					</form>
				</div>
								
					
			</div>
		</div>
	</section>
	
<?php 
require_once 'blocks/footer.php'; 
?>