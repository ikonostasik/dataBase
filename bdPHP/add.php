
<?php
header( 'Content-Type: text/html; charset=utf-8' );
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

$FIO = $_GET["FIO"];
$Url = $_GET["Url"];
echo $FIO;
echo $Url;

$sql = "INSERT INTO `u533224130_stas`.`Users` (`FIO`, `url_to_blog`) VALUES ('{$FIO}','{$Url}');";
echo $sql;
$result = $conn -> query($sql)or die("ERROR: ".mysql_error());
?>
