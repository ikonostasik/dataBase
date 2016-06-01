<?php
session_start();
header('Content-Type: text/html; charset= utf-8');
$dbloc ="mysql.hostinger.ru";
$dbuser ="u533224130_user";
$dbpass ="password";
if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
$dbloc ="localhost";
$dbuser ="root";
$dbpass ="";
};

$Captch = $_POST['captcha'];
$UserName = $_POST['name'];
$Password = $_POST['Password'];
$dsn = "mysql:host={$dbloc}";
$conn = new PDO($dsn, $dbuser, $dbpass);
$conn-> exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM `u533224130_stas`.`User`";

$result = $conn -> query($sql);

while ($row = $result->fetch(PDO::FETCH_ASSOC)){
printf("{$row[UserName]}<br>");
printf("{$UserName}<br>");
printf("{$row[Password]}<br>");	
printf("{$Password}<br>");
	if ( ($row[Password] == $Password) and ($row[UserName] == $UserName) and ($Captch == $_SESSION['Sikretik']) ){
		$_SESSION['logged_user'] = $UserName;
		header("Location: ../ajaxPR/ajax.php");
		$sql = "INSERT INTO `u533224130_stas`.`Message` (`text`,`User`) VALUES ('Пользователь {$UserName} Вошел в Систему','Систему');";
		
		exit;	
	}
	
}		
		header("location: enter.php");
		
	
?>	