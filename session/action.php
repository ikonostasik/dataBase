<?
session_start();
$dbloc ="mysql.hostinger.ru";
$dbuser ="u533224130_user";
$dbpass ="password";
if ($_SERVER["SERVER_ADDR"] == "127.0.0.1") {
$dbloc ="localhost";
$dbuser ="root";
$dbpass ="";
};

$dsn = "mysql:host={$dbloc}";
$conn = new PDO($dsn, $dbuser, $dbpass);

$text = $_POST["text"];
$user = $_SESSION['logged_user'];

$sql = "INSERT INTO `u533224130_stas`.`Message` (`text`,`User`) VALUES ('{$text}','{$user}');";
$result = $conn -> query($sql)or die("ERROR: ".mysql_error());

?>		