<?php require 'config.php';
if ($_SESSION['userlevel']!=1 AND $_SESSION['userlevel']!=2)
{
	header('Location: /');
	exit;
}
?>
<?php require_once 'blocks/header.php';?>
<?php	

if (isset($_GET['id']) && $_GET['id'] == 0) {
    $sectionid = 0;
	$zagolovok = "Создание раздела";
}   
elseif (isset($_GET['id']) && $_GET['id'] != 0) {
    $sectionid = $_GET['id'];
	$zagolovok = "Создание подраздела в разделе ".Name_Podrazdel($link, $sectionid);
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

								<div class="table-input-info__wrap-textfield">
									<input type="text" name = "name" class="table-input-info__textfield">
                                    <input class="table-input-info__textfield" type="hidden" name = "id" value = "<?=$sectionid ?>">
								</div>

							</label>
						</div>

				
						<div class="table-input-info__row">
							<label class="table-input-info__label">
                            	<?php if($_SESSION['userlevel']==1 && ($zagolovok === "Создание раздела" || $zagolovok === "Изменение раздела")) {?>

								<div class="table-input-info__wrap-text">
									<span class="table-input-info__text">Администратор</span>
								</div>
                                <div class="table-input-info__wrap-textfield">
                                        <?php $admin = Show_Admin($link);?>
                                        
									<select class='table-input-info__select' name = 'selected_admin'>
                                    <?php for ($i = 0; $i < count($admin); $i++) { ?>
										<option value="<?=$admin[$i]['id']?>"><?=$admin[$i]['login']?></option>
                                         <?php  }?>
									</select>
                                   
								</div>

                                
                                <?php } else { 

                                    $admin = show_section_admin($link, $sectionid); ?>
                                    <input class="table-input-info__textfield" type="hidden" name = "selected_admin" value = "<?=$admin[$i]['login']?>">
									
                                <?php } ?>
							</label>
						</div>
						<?php if($_SESSION['userlevel']<=2) {?>
						<div class="table-input-info__buttons">
					<button class="button button_article" name="create">Создать</button>
					<a href='/manage-sections.php' ><div class="button button_cancel">Отмена</div></a>
						</div>
						<?php }?>
					</form>
				</div>

			</div>
		</div>
	</section>

<?php require_once 'blocks/footer.php'; ?>