<?php require 'config.php';?>
<?php require_once 'blocks/header.php';?>

<?php 
if (isset($_GET['id']) && $_GET['id'] != 0)
{
	$sectionid = $_GET['id'];
	$zagolovok = "Изменение раздела";
}	
else if ($_GET['sectionParent'] != 0) {
    $sectionid = $_GET['sectionParent'];
	$zagolovok = "Создание подраздела в разделе ".Name_Podrazdel($link, $sectionid);}
else {
    $sectionid = 0;
	$zagolovok = "Создание раздела";}
?>

	<section class="section section-content">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title"><?php echo $zagolovok?></p>
					
				<div class="new-material__form">
					<form action="manage_action_section.php" method = "post" class="table-input-info">
						
						<div class="table-input-info__row">
							<label class="table-input-info__label">

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Название</span>
								</div>

								<div class="table-input-info__wrap-textfield">
									<input type="text" name = "name" class="table-input-info__textfield">
                                    <input type="hidden" name = "id" value = "<?php echo $sectionid ?>" class="table-input-info__textfield">
								</div>

							</label>
						</div>

				
						<div class="table-input-info__row">
							<label class="table-input-info__label">

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Администратор</span>
								</div>

								<div class="table-input-info__wrap-textfield">
									<select class='table-input-info__select'>
										<option value="">[Волк]</option>
										<option value="">Анка</option>
										<option value="">Саша</option>
										<option value="">Дмитрий</option>
										<option value="">Анна</option>
										<option value="">Мария</option>
									</select>
								</div>

							</label>
						</div>

						<div class="table-input-info__buttons">
					<button class="button button_article" name="create">Создать</button>
					<a href='/manage-sections.php' ><div class="button button_cancel">Отмена</div></a>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>


	
<?php require_once 'blocks/footer.php'; ?>
