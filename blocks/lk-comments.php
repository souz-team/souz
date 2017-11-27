<?php
require '/action/get_user_info.php';
require '/action/get-section-by-user-id.php';
?>
<div class="lk-comments">
  <?php //for($i=1; $i<5; $i++) { ?>
  <?php foreach ($section_id as $section) { ?>
  <?php $section_name = Show_Podrazdel($link, $section['section_id']) ?>
	 <div class="lk-comments__item"> 
    <a href='#' class="lk-comments__topic-name"><?=$section_name['Name']?></a>
   <!-- <p class="lk-comments__comment">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde earum placeat mollitia maiores ratione, accusantium corrupti eos. Impedit, consectetur doloremque!</p>
    <p class="lk-comments__date">19.10.2010</p> -->
  </div>
  <?php } ?>
</div>