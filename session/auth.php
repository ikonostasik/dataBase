<?php
session_start();
require('../Classes/connect.php');
header('Content-Type: text/html; charset= utf-8');
$UserName = $_POST["name"];
$Password = $_POST["password"];
$Captch = $_POST["captcha"];
$dbh = Connection::getInstance()->connect();
	$sql = "SELECT * FROM `u533224130_stas`.`User`";			
				$result = $dbh->query($sql);
				
				// 'u533224130_stas'.
				

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	if ( ($row[Password] == $Password) and ($row[UserName] == $UserName)){
		$_SESSION['logged_user'] = $UserName;
		//header("Location: ../ajaxPR/ajax.php");
		$sql = "INSERT INTO `u533224130_stas`.`Message` (`text`,`User`) VALUES ('Пользователь {$UserName} Вошел в Систему','Систему');";
		$msg = "OK";
		echo $msg;
		exit;	
	}			
}		
		
			
	
	
		//header("location: enter.php");
		
	
?>	