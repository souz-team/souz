<p style="color: red; text-align: center; vertical-align: middle;">
	Спасибо за обращение в нашу службу технической поддержки. 
	<br>
	Номер вашего обращения: #<?=$result[1]?>.
	<br>
	<?=$name?>, мы обязательно свяжемся с Вами в этом году!
</p>

<?php
if($send_email==1){
	$message_2="Номер вашего обращения: #".$result[1].".\nДата вашего обращения: ".$date."";
	$message="".$name.", вы обратились в службу технической поддержки нашей компании.\nТема обращения: ".$subject."\nТекст сообщения: ".$topic."\nМы с Вами обязательно свяжемся!";
	$message_3="From: 15istv1@mail.ru\r\n";
	mail($email, 'Заявка в службу ТП. ТО "СОЮЗ"', $message, $message_2, $message_3);
}
?>

<a href='/'><div class="button button_cancel">Вернуться на главную</div></a>