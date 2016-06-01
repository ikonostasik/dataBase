<?
 session_start();
 header ("Content-type: image/jpeg");  
    $im = ImageCreate (200, 50)  
            or die ("Ошибка при создании изображения");          
    $couleur_fond = ImageColorAllocate ($im, 255, 0, 0);  
	$textcolor = imagecolorallocate($im, 0, 0, 255);
	$font = "ashley/ashleycapitalisofia.ttf";
	$text = '';
	$x = 24;
	$fullTxt ='';
	for($i = 0;$i<=4;$i++){
		$choice = rand(1,2);
		if ($choice == 1) {
			$text = chr(rand(48,57));
			imagettftext($im, 22, rand(-45,45), $x, 35, $textcolor, $font, ($text));
			$x = $x + 30;
			$fullTxt = $fullTxt . $text;
			
		}
		else {
			$text = chr(rand(64,90));
			imagettftext($im, 22, rand(-30,45), $x, 35, $textcolor, $font, ($text));
			$x = $x + 30;
			$fullTxt = $fullTxt . $text;
		}
	}
    Imagejpeg ($im);  
	$_SESSION['Sikretik'] = $fullTxt;
	echo $fullTxt;

?>
