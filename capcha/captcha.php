<?php
session_start();
$dir = "../fonts/"; // подключаем папку со шрифтом
$string = "";
$fonts = array_diff( scandir($dir,1), array('..', '.'));
for ($i = 0; $i < 6; $i++) // Здесь задается количество символов на картинке
$string .= chr(rand(97, 122)); // вывод случайных символов от a до z, по html коду
$_SESSION['rand_code'] = $string; // создаем сессию, в которой будут храниться отображаемые символы
$maxrand = count($fonts);
 
$image = imagecreatetruecolor(125, 46); // размер создаваемой картинки
 
 // Цвет символов на картинке
 
$bg = imagecolorallocate($image, 255, 255, 255); // фоновое изображение картинки
 
imagefilledrectangle($image,0,0,399,99,$bg); // рисует заполненный прямоугольник
$kap = str_split($string);
for ($n=0; $n<count($kap); $n++)
 {
	$randnum = rand(0, $maxrand-1);
	$randfont = $fonts[$randnum];
	$color = imagecolorallocate($image, rand(1, 100 ), rand(1, 100 ), rand(1, 100 ));
	imagettftext ($image, 16, rand(-20,20), $n*20+5, rand(25, 40), $color, $dir.$randfont, $kap[$n]); 
	 
 }


header("Content-type: image/png"); // объявляем тип страницы
 
imagepng($image);
?>