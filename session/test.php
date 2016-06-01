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

$sql ='';
$id = $_GET['id'];
$ids = $_GET['ids'];
		if (!empty($id)){
		$sql = "DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$id}";
		
		$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
		}
		else {
			$arr = explode(",", $ids);
			for($i = 0;$i<count($arr);$i++){
					$sql =  " DELETE FROM `u533224130_stas`.`Users` WHERE `id` = {$arr[$i]}";
					$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
		
		}
		
			}
		
		
?>