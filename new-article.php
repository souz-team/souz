<?php require 'config.php';?>
<?php require_once 'blocks/header.php';
if (isset($_POST['do_create_article']))
{
	
	require "create-article.php";

}
$idPodRazdel = $_GET['idPodRazdel'];


?>

	<section class="section section_content">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title">Создание статьи</p>
				
				<div style="color: red; text-align:center;"><br><?=$all?></div>
				<div class="new-material__form">
					<!--<form action="create-article.php" method="post" class="form-new-material" ENCTYPE="multipart/form-data"> -->
					<form action="new-article.php" method="post" class="form-new-material" ENCTYPE="multipart/form-data">
						<label class="form-new-material__row">
							<p class="form-new-material__label">Название</p>
							<input type="text" name="articleName" class="form-new-material__textfield">
						</label>

						<div class="form-new-material__row form-new-material__row_selects">
							<div class="form-new-material__wrap-select">
								<p class="form-new-material__label">Подраздел</p>
								<select class='form-new-material__select' name="id_Podrazdel">
								<?
									$optionList = "";
									$lastParentId = "THIS_PARAM_MUST_BE_INTEGER";
									$razdel_query = mysql_query ("SELECT a.id as parentId, a.Name as parentName, b.id as childId, b.Name as childName FROM Razdel a, Razdel b WHERE b.P_id=a.id and a.P_id=0 ORDER BY a.Name, a.id");
									while ($row = mysql_fetch_assoc($razdel_query)) {
										$parentId   = $row['parentId'];
										$parentName = $row['parentName'];
										$childId    = $row['childId'];
										$childName  = $row['childName'];
										if( $lastParentId != $parentId ) {
											$lastParentId = $parentId;
											$optionList .= "<option disabled>$parentName</option>";
										}
										$isSelected = ($childId ==$idPodRazdel  )?'selected':'';
										$optionList .= "<option $isSelected value=\"$childId\">&nbsp;&nbsp;&nbsp;&nbsp;$childName</option>";
									}
									echo $optionList;
								?>
								</select>
							</div>
						</div>
						
						<label class="form-new-material__row">
							<p class="form-new-material__label">Текст статьи</p>
							<textarea class="form-new-material__textarea"name= "articleText"></textarea>
						</label>
						
						<br>
						
							Выберите файл для загрузки: 
							<div style="color: red; text-align:center;"><br><?=$$err_f?></div>
							<input type="file" name="userfile">
						<div class="form-new-material__row form-new-material__row_buttons">
							<a href="/manage-sections.php"><div class="button button_cancel">Назад</div>
							</a>
							<button class="button button_default" name="do_create_article">Создать</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>

<?php require_once 'blocks/footer.php'; ?>