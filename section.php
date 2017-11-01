<?php require 'config.php';?>
<?php require_once 'blocks/header.php';?>

<?php 
if (isset($_GET['id']))
{
	$sectionid = $_GET['id'];
	$zagolovok = "Создание раздела";
}	
	else {
		$zagolovok = "Изменение раздела";
	}
?>




	<section class="section">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title"><?php echo $zagolovok?></p>
					
				<div class="new-material__form">
					<form action="" class="form-new-material">
						
						<label class="form-new-material__row">
							<p class="form-new-material__label">Название</p>
							<input type="text" class="form-new-material__textfield">
						</label>


						<div class="form-new-material__row form-new-material__row_selects">
							<div class="form-new-material__wrap-select">
								<p class="form-new-material__label">Родитель</p>
								<select class='form-new-material__select'>
									<option value="">[Корневой]</option>
									<option value="">Раздел 1</option>
									<option value="">Раздел 2</option>
									<option value="">Раздел 3</option>
									<option value="">Раздел 4</option>
									<option value="">Раздел 5</option>
								</select>
							</div>
						</div>

						<div class="form-new-material__row form-new-material__row_buttons">
							<button class="button button_cancel">Отмена</button>
							<button class="button button_default">Создать</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>


	
<?php require_once 'blocks/footer.php'; ?>
