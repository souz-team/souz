<?php require 'config.php';?>
<?php require_once 'blocks/header.php';?>

<?php 
if (($_SESSION['userlevel']==1) || ($_SESSION['userlevel']==2)) {
if (isset($_GET['id']) && $_GET['id'] != 0)
{
	$sectionid = $_GET['id'];
	$zagolovok = "Изменение раздела";
}	
?>

	<section class="section section_content">
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
                                    <?php
                                    $section = Show_Podrazdel($link, $sectionid);
                                    ?>
								<div class="table-input-info__wrap-textfield">
									<input class="table-input-info__textfield" type="text" name = "name" value = "<?=$section['Name']?>">
                                    <input class="table-input-info__textfield" type="hidden" name = "id" value = "<?=$section['id']?>">
                                    <input class="table-input-info__textfield" type="hidden" name = "P_id" value = "<?=$section['P_id']?>">
								</div>

							</label>
						</div>

				
						<div class="table-input-info__row">
							<label class="table-input-info__label">

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Администратор</span>
								</div>
                                <div class="table-input-info__wrap-textfield">
                                        <?php $admin = Show_Admin($link);?>
                                        
									<select class='table-input-info__select'>
                                    <?php for ($i = 0; $i < count($admin); $i++) { ?>
										<option value="<?=$admin[$i]['id']?>"><?=$admin[$i]['login']?></option>
                                         <?php  }?>
									</select>
                                   
								</div>

							</label>
						</div>

						<div class="table-input-info__buttons">
					<button class="button button_article" name="change">Изменить</button>
					<a href='/manage-sections.php' ><div class="button button_cancel">Отмена</div></a>
						</div>

					</form>
				</div>

			</div>
		</div>
	</section>


<?php } 
else 
    echo "<br>"."You don't have rights to be here."; ?>	
<?php require_once 'blocks/footer.php'; ?>
