<?php
session_start();
require('../Classes/connect.php');
header('Content-Type: text/html; charset= utf-8');
$UserName = $_POST["name"];
$Password1 = $_POST["password1"];
$Password2 = $_POST["password2"];
$Email = $_POST["mail"];
$dbh = Connection::getInstance()->connect();
	$sql = "SELECT * FROM `u533224130_stas`.`User`";			
				$result = $dbh->query($sql);
				
				// 'u533224130_stas'.
				

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	if ($row[UserName] == $UserName){
		//$_SESSION['logged_user'] = $UserName;
		header("location: reg.php");
	}
}
		if($Password1 == $Password2){
			$sql = "INSERT INTO `u533224130_stas`.`User` (`UserName`,`Password`,`Email`) VALUES ('{$UserName}','{$Password1}','{$Email}');";
			$_SESSION['logged_user'] = $UserName;
			$result = $dbh->query($sql);
			header("location:../ajaxPR/ajax.php");
		}
		else{header("location: reg.php");}
			
			
		
		
	
?>	