<?php require 'config.php';?>
<?php require_once 'blocks/header.php';?>

<?php 
if (isset($_GET['id']) && $_GET['id'] != 0)
{
	$sectionid = $_GET['id'];
	$zagolovok = "Изменение раздела";
}	
else if ($_GET['sectionParent'] != 0) {
	$zagolovok = "Создание подраздела";}
else {
	$zagolovok = "Создание раздела";}
?>




	<section class="section section-content">
		<div class="section__wrap">
			<div class="new-material">
				<p class="new-material__title"><?php echo $zagolovok?></p>
					
				<div class="new-material__form">
					<form action="" class="table-input-info">
						
						<div class="table-input-info__row">
							<label class="table-input-info__label">

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Название</span>
								</div>

								<div class="table-input-info__wrap-textfield">
									<input type="text" class="table-input-info__textfield">
								</div>

							</label>
						</div>

						<div class="table-input-info__row">
							<label class="table-input-info__label">

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Родительский раздел</span>
								</div>

								<div class="table-input-info__wrap-textfield">
									<select class='table-input-info__select'>
										<option value="">[Корневой]</option>
										<option value="">Раздел 1</option>
										<option value="">Раздел 2</option>
										<option value="">Раздел 3</option>
										<option value="">Раздел 4</option>
										<option value="">Раздел 5</option>
									</select>
								</div>

							</label>
						</div>

						<div class="table-input-info__buttons">
							<button class="button button_cancel">Отмена</button>
							<button class="button button_default">Создать</button>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>


	
<?php require_once 'blocks/footer.php'; ?>
