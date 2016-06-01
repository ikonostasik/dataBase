	<!DOCTYPE html> 
<html>
<head>
<meta charset="utf-8">
<style>
</style>	
</head>
<body>

	
<?php
mb_internal_encoding("UTF-8");
$dbloc ="mysql.hostinger.ru";
$dbuser ="u533224130_user";
$dbpass ="password";
if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
$dbloc ="localhost";
$dbuser ="root";
$dbpass ="";
};

//$conn = @mysql_connect($dbloc, $dbuser, $dbpass);

$dsn = "mysql:host={$dbloc}";
$conn = new PDO($dsn, $dbuser, $dbpass);
$conn-> exec("SET CHARACTER SET utf8");

$u = $_POST["del"];
//$g = $_POST["option3"];
//echo $u;
$ask =$_POST["ask"];
if($u=="id"){
		$ask = $ask +0;
		
		$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$ask}";
		$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
		Echo "<h1>ID {$ask} has been successfully deleted!!!</h1>";
}
elseif($u== "fio"){
		$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `FIO` = '{$ask}'";
		$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
		echo "<h1>FIO {$ask} has been successfully deleted!!!</h1>";
}

elseif($u=="blog"){
		$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `url_to_blog` = '{$ask}'";
		$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
		echo "<h1>Url {$ask} has been successfully deleted!!!</h1>";
}
else{
	
}
//$sql = "INSERT INTO `u533224130_stas`.`Users` (`FIO`, `url_to_blog`) VALUES (". $unk . $FIO . $unk . ",". $unk . $Url. $unk .");";
//$result = mysql_query($sql,$conn) or die("ERROR: ".mysql_error());
//if($result == true){
//Безопастность БД.
//};

?>
</body>
</html>