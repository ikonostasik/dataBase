<html>
<head>
	<meta charset="utf-8">
</head>
<body>

<?php
session_start();
$dbloc ="mysql.hostinger.ru";
$dbuser ="u533224130_user";
$dbpass ="password";
if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
$dbloc ="localhost";
$dbuser ="root";
$dbpass ="";
};

$UserName ="Ikonostasik";
$Password ="431485stas";
$dsn = "mysql:host={$dbloc}";
$conn = new PDO($dsn, $dbuser, $dbpass);
$conn-> exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM `u533224130_stas`.`User`";

$result = $conn -> query($sql);
while ($row = $result->fetch(PDO::FETCH_ASSOC)){
	if (($row[Password]== $Password) and ($row[UserName] == $UserName)){
		header("Location: ../ajaxPR/ajax.php");
		echo 1;	
	}
}
?>
</body>
</html>