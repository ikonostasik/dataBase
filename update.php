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

$ids = $_GET['ids'];
$id = $_GET['id'];
$FIO = $_GET['FIO'];
$url = $_GET['url'];
		if(!empty($id)){
									//UPDATE "group" SET group_name = "Unicornsss", date_of_creation = "2014-02-01" WHERE  "id" = 1
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$FIO}', `url_to_blog` = '{$url}' WHERE `Users`.`id`={$id}";
							echo $sql;
							sleep(3);
							$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
						}
		
		else{
						$arrId = explode(",", $ids);
						$arrFio = explode(",", $FIO);
						$arrUrl = explode(",", $url);
						
						for($i = 0;$i<count($arrId);$i++){
							$sql = "UPDATE `u533224130_stas`.`Users` SET `FIO` = '{$arrFio[$i]}', `url_to_blog` = '{$arrUrl[$i]}' WHERE `Users`.`id`={$arrId[$i]}";
							$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
						}
		}
		
?>